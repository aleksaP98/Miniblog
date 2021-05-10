<?php

namespace App\Services;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\ActionsModel;
use App\Models\ErrorsModel;
use Carbon\Carbon;

class LoggingService {
    private $actionsModel;
    private $errorsModel;
    public function __construct(){
        $this->actionsModel = new ActionsModel();
        $this->errorsModel = new ErrorsModel();
    }
    public function getActions(){
        return $this->actionsModel->getActions();
    }
    public function getErrors(){
        return $this->errorsModel->getErrors();
    }
    public function logAction(Request $request,$action,$userId = null){
        $session = $request->session()->get('user');
        if( $session != null){
            $userId = $session->id;
            $firstName = $session->firstName;
            $lastName = $session->lastName;
            $email = $session->email;
        }
        else{
            $userId = $userId;
            $firstName = $request->input('firstName');
            $lastName = $request->input('lastName');
            $email = $request->input('email');
        }
        $ip = $request->ip();
        $dateTime = Carbon::now();
        DB::beginTransaction();
        try{
            $this->actionsModel->insertAction($userId,$firstName,$lastName,$email,$ip,$dateTime,$action);
            DB::commit();
        }
        catch(Exception $e){
            DB::rollback();
            $this->errorsModel->insertError($ip,$dateTime,'DATABASE ERROR - COULD NOT INSERT ACTION - '.$e->getMessage());
        }
        
    }
    public function logError(Request $request,$message){
        $ip = $request->ip();
        $dateTime = Carbon::now();
        DB::beginTransaction();
        try{
            $this->errorsModel->insertError($ip,$dateTime,$message);
            DB::commit();
        }
        catch(Exception $e){
            DB::rollback();
            $this->errorsModel->insertError($ip,$dateTime,'DATABASE ERROR - COULD NOT INSERT ACTION - '.$e->getMessage());
        }
        
    }

}

?>