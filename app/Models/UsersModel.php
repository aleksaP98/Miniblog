<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use mysql_xdevapi\Exception;

class UsersModel{
    public  function getAll(){
        return DB::table('users')
            ->get();
    }
    public  function getOneUser($id){
        return DB::table('users')
            ->where('id',$id)
            ->first();
    }
    public function insertUser($firstName,$lastName,$nickname,$email,$password,$roleId){
            return DB::table('users')
                ->insertGetId([
                    'firstName' => $firstName,
                    'lastName' => $lastName,
                    'nickname' => $nickname,
                    'email' => $email,
                    'password' => md5($password),
                    'role_id' => $roleId
                ]);
    }
    public  function checkUserCredentials($email,$password){
        try{
            return DB::table('users AS u')
                ->select('u.*')
                ->where([
                    ['email','=',$email],
                    ['password','=',$password]
                ])->first();
        }
        catch (Exception $exception){
            return 'There was an error '.$exception->getMessage() ;
        }

    }
    public  function updateUser($idUser,$firstName,$lastName,$email,$nickname,$roleId){
        return DB::table('users')
            ->where('id',$idUser)
            ->update([
                'firstName'=>$firstName,
                'lastName' =>$lastName,
                'email'=>$email,
                'nickname'=>$nickname,
                'role_id' => $roleId
            ]);
    }
    public function updatePassword($idUser,$password){
        return DB::table('users')
            ->where('id',$idUser)
            ->update([
                'password' => $password
            ]);
    }
    public function deleteUser($idUser){
        DB::table('users')
            ->where('id',$idUser)
            ->delete();
    }
    public function findUsers($firstName,$lastName){
        return DB::table('users')
            ->join('users_images AS ui','ui.user_id','users.id')
            ->join('images','images.id','ui.image_id')
            ->select('users.firstName','users.lastName','users.nickname','users.email','users.id','images.src','images.alt')
            ->where([
                ['users.firstName','like',$firstName.'%'],
                ['users.lastName','like',$lastName.'%'],
                ['ui.profileImage','=',1]
            ])
            ->orWhere([
                ['users.firstName','like',$lastName.'%'],
                ['users.lastName','like',$firstName.'%'],
                ['ui.profileImage','=',1]
            ])
            ->paginate(6)
            ->appends([
                'firstName' => $firstName,
                'lastName' => $lastName
            ]);
    }
}
