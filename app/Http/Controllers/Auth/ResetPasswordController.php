<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Services\UserService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ResetPasswordController extends Controller
{
    private $userService;

    public function __construct()
    {
        $this->userService = new UserService();
    }

    public function changePassword(Request $request){

        $message = $this->userService->updatePassword($request,session()->get('user')->id);
        return redirect()->route('profile',session()->get('user')->id)->with('message',$message);
    }
}
