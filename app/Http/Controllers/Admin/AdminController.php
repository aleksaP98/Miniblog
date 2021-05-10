<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\CommentService;
use App\Services\ImageService;
use App\Services\PostService;
use App\Services\RoleService;
use App\Services\UserService;
use App\Services\LoggingService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\File;

class AdminController extends Controller
{
    private $userService;
    private $postService;
    private $commentService;
    private $imageService;
    private $roleService;
    private $loggingService;

    public function __construct()
    {
        $this->userService = new UserService();
        $this->postService = new  PostService();
        $this->commentService = new CommentService();
        $this->imageService = new ImageService();
        $this->roleService = new  RoleService();
        $this->loggingService = new  LoggingService();
    }

    public function index(){
        $actions = $this->loggingService->getActions();
        $errors = $this->loggingService->getErrors();
        
        return view('pages.admin.statistics',[
            'actions' => $actions,
            'errors' => $errors
        ]);
    }
    public function createUserForm(){
        $roles = $this->roleService->getRoles();
        return view('pages.admin.users.createUser',[
            'roles' => $roles
        ]);
    }
    public function createUser(Request $request){
        $userId = $this->userService->insertUser($request);
        if($request->file('imageUpload') != null){
            $this->imageService->insertAndUpdateImage($request,$userId);
        }
        else{
            $this->imageService->setDefaultImage($userId);
        }
        return redirect()->route('admin.createUserForm')->with('message','Successfully create user');
    }
    public function updateUserForm(){
        $users = $this->userService->getAll();
        $roles = $this->roleService->getRoles();
        $images = $this->imageService->getAll();
        return view('pages.admin.users.updateUsers',[
            'users' => $users,
            'images' => $images,
            'roles' => $roles,
        ]);
    }
    public function updateUser(Request $request){
        $message = $this->userService->updateUser($request);
        if($request->file('imageUpload')){
            
            $this->imageService->insertAndUpdateImage($request,$request->input('id'));
        }
        return redirect()->route('admin.updateUserForm')->with([
            'message'=> $message
        ]);
    }
    public function deleteUser(Request $request){
        $this->userService->deleteUser($request);
    }
    public function createPostForm(){
        $users = $this->userService->getAll();
        return view('pages.admin.posts.createPost',[
            'users' => $users
        ]);
    }
    public function createPost(Request $request){
   
        $imageId = $request->file('imageUpload') ? $this->imageService->uploadImage($request,$request->input('user')) : null;
        
        $this->postService->addPost($request,$imageId);

        return redirect()->route('admin.createPostForm')->with('message','Successfully created Post for user #'.$request->input('user'));
    }
    public function updatePostForm(){
        $posts = $this->postService->getAll();
        return view('pages.admin.posts.updatePosts',[
            'posts' => $posts
        ]);
    }
    public function updatePost(Request $request){
        $message = $this->postService->updatePost($request);
        if($request->file('imageUpload')){   
            $this->imageService->insertAndUpdateImagePost($request,$request->input('id'));
        }
        return redirect()->route('admin.updatePostForm')->with([
            'message'=> $message
        ]);
    }
    public function deletePost(Request $request){
        $this->postService->deletePost($request);
    }
}
