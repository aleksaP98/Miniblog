<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\ImageService;
use App\Services\PostService;

class PostsController extends Controller
{
    private $imageService;
    private $postService;
    public function __construct(){
        $this->imageService = new ImageService();
        $this->postService = new PostService();
    }
    public function deletePost(Request $request){
        
        $message = $this->postService->deletePost($request);
        return redirect()->route('profile',session()->get('user')->id)->with('message',$message);
    }
    public function addPost(Request $request){

        if($request->has('imageUpload'))
           $idImage = $this->imageService->uploadImage($request,$request->route('id'));
        else
            $idImage = null;
        $this->postService->addPost($request,$idImage);
        return redirect()->route('profile',$request->route('id'));
    }
}
