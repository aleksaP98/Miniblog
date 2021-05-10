<?php

namespace App\Http\Controllers;

use App\Services\CommentService;
use App\Services\ImageService;
use App\Services\PostService;
use App\Services\UserService;
use Illuminate\Http\Request;
use App\Models\UsersModel;
use Illuminate\Support\Facades\DB;

class PagesController extends Controller
{
    private  $postService;
    private  $commentService;
    private  $userService;
    private  $imageService;
    public function __construct()
    {
        $this->postService = new PostService();
        $this->commentService = new CommentService();
        $this->userService = new UserService();
        $this->imageService = new ImageService();
    }

    public  function index(Request $request){
        $users = $this->userService->getAll();
        $posts = $this->postService->getAll();
        $comments = $this->commentService->getCommentsForPost($posts);
        $profileImages = $this->imageService->getAllProfileImages();
        return view('pages.home',[
            'users' => $users,
            'posts' => $posts,
            'comments' => $comments,
            'images' => $profileImages
        ]);
    }
    public function about(){
        return view('pages.about');
    }
    public function documentation(){
        $path = public_path().'/assets/documentation.pdf';
        return response()->file($path);
    }
    public function search(Request $request){
        $users = $this->userService->findUsersAjax($request);
        return view('pages.search',[
            'users' => $users
        ]);
    }
}
