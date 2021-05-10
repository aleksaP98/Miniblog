<?php


namespace App\Services;

use App\Models\ImagesModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use App\Services\LoggingService;


class ImageService {

    private $imagesModel;
    private $loggingService;

    public function __construct(){
        $this->imagesModel = new ImagesModel();
        $this->loggingService = new LoggingService();
    }

    public  function insertAndUpdateImage(Request $request,$idUser){
        
        $image = $this->upload($request,$idUser);
        if(is_array($image))
             return $image;
        
        DB::beginTransaction();
        try {
            $imageId = $this->imagesModel->insertImage('/images/users/user-'.$idUser.'/'.$image,'user image',$idUser);
            $this->imagesModel->updateProfileImage($imageId,$idUser);
            DB::commit();
            $this->loggingService->logAction($request,'Profile picture inserted and  updated');
            return ['successMessage'=> 'Successfully updated profile image'];
        }
        catch(\Exception $ex) {
            DB::rollback();
            $this->loggingService->logError($request,'DATABASE ERROR - COULD NOT UPDATE PROFILE IMAGE - '.$ex->getMessage());
            return ['errorMessage'=>'An error has accured, please try again later'];
        }
    }
    public  function insertAndUpdateImagePost(Request $request){
        $idUser = $request->input('userId');
        $idPost = $request->input('postId');
        $image = $this->upload($request,$idUser);
        if(is_array($image))
             return $image;
        DB::beginTransaction();
        try {
            $imageId = $this->imagesModel->insertImage('/images/posts/user-'.$idUser.'/'.$image,'post image',$idUser);
            $this->imagesModel->updatePostImage($imageId,$idPost);
            DB::commit();
            $this->loggingService->logAction($request,'Post picture update');
            return ['successMessage'=> 'Successfully updated post image'];
        }
        catch(\Exception $ex) {
            DB::rollback();
            $this->loggingService->logError($request,'DATABASE ERROR - COULD NOT UPDATE POST IMAGE - '.$ex->getMessage());
            return ['errorMessage'=>'An error has accured, please try again later'];
        }
    }
    public function profileImageUpdate(Request $request,$idUser){
        DB::beginTransaction();
        try{
            $image = $this->imagesModel->updateProfileImage($request->input('idImage'),$idUser);
            DB::commit();
            $this->loggingService->logAction($request,'Profile picture updated');
            return $image;
        }
        catch(\Exception $ex) {
            DB::rollback();
            $this->loggingService->logError($request,'DATABASE ERROR - COULD NOT UPDATE PROFILE IMAGE - '.$ex->getMessage());
            return 'An error has accured, please try again later';
        }
    }   
    public function getAll(){
        return $this->imagesModel->getAll();
    }
    
    public function setDefaultImage($userId){
        return $this->imagesModel->setDefaultImage($userId);
    }
    public function getUserImages($idUser){
        return $this->imagesModel->getUserImages($idUser);
    }
    public function getAllProfileImages(){
        return $this->imagesModel->getProfileImageAll();
    }
    public function uploadImage(Request $request,$idUser){
        $image = $this->upload($request,$idUser);
        return  $this->imagesModel->insertImagePost('/images/posts/user-'.$idUser.'/'.$image,'post image');
    }
    private function upload(Request $request,$idUser){
        $validator = Validator::make($request->all(), [
            'imageUpload' => 'required|image|max:2000000'
        ])->validateWithBag('error');

        $image = $request->file("imageUpload");

        if($request->has('title'))
            $path  = "/assets/images/posts/user-".$idUser.'/';
        else
            $path = "/assets/images/users/user-".$idUser.'/';

        return UploadService::upload($image,$path);
    }



}
