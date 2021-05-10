<?php

namespace App\Http\Controllers;

use App\Services\ImageService;
use Illuminate\Http\Request;

class ImagesController extends Controller
{
    private $imageService;

    public function __construct()
    {
        $this->imageService = new ImageService();
    }

    public function insertAndUpdateImage(Request $request){
        $message = $this->imageService->insertAndUpdateImage($request,session()->get('user')->id);
        return redirect()->route('profile',session()->get('user')->id)->with('message',$message);
    }
    public function updateProfileImage(Request $request){
        $message = $this->imageService->profileImageUpdate($request,session()->get('user')->id);
        return $message;
    }
}
