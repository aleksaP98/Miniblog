<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;

class RolesModel {
    public  function getRoles(){
      return DB::table('roles')
            ->get();
    }
    public function updateRole($idRole,$idUser){
        return DB::table('users')
            ->where('id',$idUser)
            ->update(['role_id'=>$idRole]);
    }
}
