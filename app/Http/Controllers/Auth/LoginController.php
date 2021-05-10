<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\UsersModel;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use App\Services\LoggingService;

class LoginController extends Controller
{
    
    private $usersModel;
    private $loggingService;

    public function __construct()
    {
        $this->usersModel = new UsersModel();
        $this->loggingService = new LoggingService();
    }

    public function index(){
        if(session()->has('user'))
            return redirect()->route('home');
        else
            return view('pages.login');
    }

    public  function  login(Request $request){

        if(session()->has('user'))
            return redirect()->route('home');

        $email = $request->input('emailLogin');
        $password = md5($request->input('passwordLogin'));


        $user = $this->usersModel->checkUserCredentials($email,$password);
        if($user):
            $request->session()->put('user',$user);
            $this->loggingService->logAction($request,'User login!');
            return \redirect()->route('home');
        else:
            $this->loggingService->logError($request,'Failed login attempt');
            return \redirect()->route('login')->with('loginMessage','Username or password did not match');
        endif;

    }
    public  function logout(Request $request)
    {
        $this->loggingService->logAction($request,'User logout!');
        $request->session()->forget('user');
        $request->session()->flush();
        return redirect()->route('login');

    }
}
