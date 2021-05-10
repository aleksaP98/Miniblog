<?php

namespace App\Services;

use App\Models\PostsModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Services\LoggingService;

class PostService {

    private $postsModel;
    private $loggingService;
    public function __construct()
    {
        $this->postsModel = new PostsModel();
        $this->loggingService = new LoggingService();
    }

    public function getAll(){
       return $this->postsModel->getAll();
    }
    public function deleteUserPosts(Request $request){
        try {
            return $this->postsModel->deleteAllUserPosts($request->route('id'));
        }
        catch (\Exception $exception){
            Log::error('DATABASE ERROR - COULD NOT DELETE USER POSTS - '.$exception->getMessage());
            return false;
        }
    }
    public function getPostsForUser($idUser){
        return $this->postsModel->getPostsForUser($idUser);
    }
    public function addPost(Request $request,$idImage){

        $validator = Validator::make($request->all(),[
            'title' => 'required|max:255',
            'description' => 'required'
        ])->validateWithBag('errorMessage');
        
        $title = $request->input('title');
        $description = $request->input('description');
        $userId = $request->input('user') ? $request->input('user') : $request->route('id');
        $createdAt = Carbon::now();
        DB::beginTransaction();
        try{
            $post =  $this->postsModel->addPost($title,$description,$createdAt,$userId,$idImage);
            DB::commit();
            return $post;
        }
        catch(Exception $exception){
            DB::rollback();
            Log::error('DATABASE ERROR - UNABLE TO ADD POST - '.$exception->getMessage());
            return  'An error has accured, please try again later';
        }
        
    }
    public function updatePost(Request $request){
        $validator = Validator::make($request->all(),[
            'title' => 'required|max:255',
            'description' => 'required|max:255',
            'imageUpload' => 'image|max:2000000'
        ])->validateWithBag('updateUser');

        $postId = $request->input('postId');
        $title = $request->input('title');
        $description = $request->input('description');
        $updatedAt = Carbon::now();
        
        DB::beginTransaction();
        try{
            $this->postsModel->updatePost($title,$description,$updatedAt,$postId);
            DB::commit();
            return 'Successfully updated post #'.$postId;
        }
        catch (\Exception $exception){
            DB::rollback();
            Log::error('DATABASE ERROR - COULD NOT UPDATE POST - '. $exception->getMessage());
            return 'An error has accured, please try again later';
        }
    }
    public function deletePost(Request $request){
        DB::beginTransaction();
        try {
            $this->postsModel->deletePost($request->input('id'));
            DB::commit();
            return 'Successfully deleted post';
        }
        catch (\Exception $exception){
            DB::rollback();
            Log::error('DATABASE ERROR - UNABLE TO DELETE POST - '.$exception->getMessage());
            return  'An error has accured, please try again later';
        }
    }
}
