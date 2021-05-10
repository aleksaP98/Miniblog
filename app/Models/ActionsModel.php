<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;

class ActionsModel {
    public function getActions(){
        return DB::table('actions')->get();
    }
    public function insertAction($userId,$firstName,$lastName,$email,$ip,$time,$action){
        DB::table('actions')
            ->insert([
                'user_id' => $userId,
                'firstName' => $firstName,
                'lastName' => $lastName,
                'email' => $email,
                'ip' => $ip,
                'dateTime' => $time,
                'action' => $action
            ]);
    }
}

?>