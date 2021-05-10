<?php


namespace App\Services;

use App\Models\ImagesModel;
use App\Models\UsersModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use App\Services\LoggingService;

class UserService {

    private $imagesModel;
    private $usersModel;
    private $loggingService;

    public function __construct(){
        $this->imagesModel = new ImagesModel();
        $this->usersModel = new UsersModel();
        $this->loggingService = new LoggingService();
    }
    public function getAll(){
        return $this->usersModel->getAll();
    }
    public function insertUser(Request $request){

        $validator = Validator::make($request->all(), [
            'firstName' => 'required|string|max:255',
            'lastName' => 'required|string|max:255',
            'nickname' => 'max:255',
            'email' => 'required|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'imageUpload' => 'image|max:2000000'
        ])->validateWithBag('error');
        
        $firstName = $request->input('firstName');
        $lastName = $request->input('lastName');
        $nickname = $request->input('nickname');
        $email = $request->input('email');
        $password = $request->input('password');
        $roleId = $request->input('role');
        if($roleId == null)
            $roleId = 2;
        DB::beginTransaction();
        try{
            $userId = $this->usersModel->insertUser($firstName,$lastName,$nickname,$email,$password,$roleId);
            DB::commit();
            return $userId;
        }
        catch(Exception $error){
            DB::rollback();
            return ['errorMessage'=>'An error has accured, please try again later'];
        }
        
    }
    public function updateInfo(Request $request){

        $validator = Validator::make($request->all(),[
            'firstName' => 'required|max:255',
            'lastName' => 'required|max:255',
            'nickname' => 'max:255',
            'email' => 'required|email|unique:users,email,'.session('user')->id,
        ])->validateWithBag('updateUser');

        $userId = session('user')->id;
        $firstName = $request->input('firstName');
        $lastName = $request->input('lastName');
        $email = $request->input('email');
        $nickname = $request->input('nickname');
        $roleId = session('user')->role_id;
        try{
            $this->usersModel->updateUser($userId,$firstName,$lastName,$email,$nickname,$roleId);
            $this->loggingService->logAction($request,'Profile info update');
            return 'Successfully updated profile info';
        }
        catch (\Exception $exception){
            $this->loggingService->logError($request,'DATABASE ERROR - COULD NOT UPDATE PROFILE INFO - '.$ex->getMessage());
            return ['errorMessage'=>'An error has accured, please try again later'];
        }
    }
    public function updatePassword(Request $request,$userId){

        $validator = Validator::make($request->all(),[
            'password' => 'required|min:8|max:255|confirmed'
        ])->validateWithBag('updateUser');
        
        try{
            $this->usersModel->updatePassword($userId,md5($request->input('password')));
            $this->loggingService->logAction($request,'Password reset');
            return 'Successfully changed password';
        }
        catch (\Exception $exception){
            $this->loggingService->logError($request,'DATABASE ERROR - PASSWORD RESET - '.$exception->getMessage());
            return ['errorMessage' => 'An error has accured, please try again later'];
        }
    }
    public function updateUser(Request $request){
        $validator = Validator::make($request->all(),[
            'firstName' => 'required|max:255',
            'lastName' => 'required|max:255',
            'nickname' => 'max:255',
            'email' => 'email|unique:users,email,' . $request->input('id'),
            'role' => 'required',
            'imageUpload' => 'image|max:2000000'
        ])->validateWithBag('updateUser');
        $userId = $request->input('id');
        $firstName = $request->input('firstName');
        $lastName = $request->input('lastName');
        $email = $request->input('email');
        $nickname = $request->input('nickname');
        $roleId = $request->input('role');
        DB::beginTransaction();
        try{
            $this->usersModel->updateUser($userId,$firstName,$lastName,$email,$nickname,$roleId);
            DB::commit();
            $this->loggingService->logAction($request,'Updated user');
            return 'Successfully updated user #'.$userId;
        }
        catch (\Exception $exception){
            DB::rollback();
            $this->loggingService->logError($request,'DATABASE ERROR - UPDATE USER - '.$exception->getMessage());
            return 'An error has accured, please try again later';
        }
    }
    public function deleteUser(Request $request){
        DB::beginTransaction();
        try {
            $this->usersModel->deleteUser($request->input('id'));
            DB::commit();
            $this->loggingService->logAction($request,'Deleted user');
            return 'Successfully deleted user';
        }
        catch (\Exception $exception){
            DB::rollback();
            $this->loggingService->logError($request,'DATABASE ERROR - DELETE USER - '.$exception->getMessage());
            return  'An error has accured, please try again later';
        }
    }
    public function findUsersAjax(Request $request){
        try {
            if($request->input('firstName'))
                return $this->usersModel->findUsers($request->input('firstName'),$request->input('lastName'));

        }
        catch (\Exception $exception){
            $this->loggingService->logError($request,'DATABASE ERROR - FIND USERS AJAX - '.$exception->getMessage());
            return 'An error has accured, please try again later';
        }
    }

}
