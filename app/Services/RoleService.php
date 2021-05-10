<?php

namespace App\Services;

use App\Models\RolesModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Services\LoggingService;

class RoleService{
    private $rolesModel;
    private $loggingService;

    public function __construct()
    {
        $this->rolesModel = new RolesModel();
        $this->loggingService = new LoggingService();
    }

    public function getRoles(){
        try {
            return $this->rolesModel->getRoles();
        }
        catch (\Exception $exception){
            Log::error('DATABASE ERROR - UNABLE TO GET ROLES - '.$exception->getMessage());
            return false;
        }
    }
    public function updateUserRole(Request $request,$idUser){
        try {
            $this->rolesModel->updateRole($request->input('role'),$idUser);
            $this->loggingService->logAction($request,'Updated Role');
            return ['successMessage'=>'Successfully updated user role'];
        }
        catch (\Exception $exception){
            $this->loggingService->logError($request,'DATABASE ERROR - ROLE UPDATE - '.$exception->getMessage());
            return false;
        }
    }
}
