<?php

namespace App\Http\Controllers;

use App\Models\UsersModel;
use App\Services\CommentService;
use App\Services\ImageService;
use App\Services\PostService;
use App\Services\UserService;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    private $usersModel;
    private $imageService;
    private $postService;
    private $userService;
    private $commentService;

    public  function __construct()
    {
        $this->usersModel = new UsersModel();
        $this->imageService = new ImageService();
        $this->postService = new  PostService();
        $this->userService = new UserService();
        $this->commentService = new CommentService();

    }

    public  function  showOneUser(Request $request){
        if(session()->get('user')->id == $request->route('id'))
            $user = $this->usersModel->getOneUser(session()->get('user')->id);
        else
            $user = $this->usersModel->getOneUser($request->route('id'));
        if(!$user)
            abort(404);
        $userImages = $this->imageService->getUserImages($user->id);
        $posts = $this->postService->getPostsForUser($user->id);
        $comments = $this->commentService->getCommentsForPost($posts);
        return view('pages.profile',[
            'user' => $user,
            'userImages' => $userImages,
            'posts' => $posts,
            'comments'=>$comments
        ]);

    }
    public  function updateUser(Request $request){
            $message = $this->userService->updateInfo($request,session()->get('user')->id);

            return redirect()->route('profile',session()->get('user')->id)->with('message',$message);
    }
    public  function addComment(Request $request){
        $comments = $this->commentService->addComment($request);
        if($comments)
            return response()->json($comments);
        else
            return response('There was an error, please try again later',500);
    }
    public function addReply(Request $request){
        $comments = $this->commentService->addReply($request);
        if($comments)
            return response()->json($comments);
        else
            return response('There was an error, please try again later',500);
    }
    
    public function findUsersAjax(Request $request){
        return $this->userService->findUsersAjax($request);
    }
}
