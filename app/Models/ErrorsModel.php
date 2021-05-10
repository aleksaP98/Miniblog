<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;

class ErrorsModel {
    public function getErrors(){
        return DB::table('errors')->get();
    }
    public function insertError($ip,$time,$message){
        DB::table('errors')
            ->insert([
                'ip' => $ip,
                'dateTime' => $time,
                'message' => $message
            ]);
    }
}

?>