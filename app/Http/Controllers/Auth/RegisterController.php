<?php

namespace App\Http\Controllers\Auth;


use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Services\UserService;
use App\Services\ImageService;
use App\Services\LoggingService;


class RegisterController extends Controller
{
    
    protected $redirectTo = RouteServiceProvider::HOME;

    private $userService;
    private $imageService;
    private $loggingService;
    
    public function __construct()
    {
        $this->middleware('guest');
        $this->userService = new UserService();
        $this->imageService = new ImageService();
        $this->loggingService = new LoggingService();
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    public function registerUser(Request $request){
        $userId = $this->userService->insertUser($request);
        $this->imageService->setDefaultImage($userId);
        $this->loggingService->logAction($request,'Registered user');
        return redirect()->route('login')->with('message','Successfully registered');
    }
}
