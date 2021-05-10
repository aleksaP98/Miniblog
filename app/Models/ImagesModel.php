<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;

class ImagesModel {
    public function getAll(){
        return DB::table('images')
            ->join('users_images AS ui','ui.image_id','=','images.id')
            ->select('ui.user_id','ui.image_id','images.src','images.alt','ui.profileImage')
            ->get();
    }
    public function setDefaultImage($userId){
        DB::table('users_images')
            ->insert([
                'user_id' => $userId,
                'image_id' => 12,
                'profileImage' => 1
            ]);
    }
    public function getUserImages($idUser){
        return DB::table('images')
            ->join('users_images AS ui','ui.image_id','=','images.id')
            ->select('images.src','images.alt','ui.profileImage','images.id')
            ->where('ui.user_id',$idUser)
            ->get();
    }
    public function getProfileImageAll(){
        return DB::table('images')
            ->join('users_images AS ui','ui.image_id','images.id')
            ->select('images.src','images.alt','ui.user_id')
            ->where('ui.profileImage',1)
            ->get();
    }
    public function insertImage($src,$alt,$idUser){
        $imageId = DB::table('images')
            ->insertGetId([
                'src'=> $src,
                'alt' => $alt
            ]);
            DB::table('users_images')
            ->insert([
                'user_id' => $idUser,
                'image_id' => $imageId,
            ]);
        return $imageId;
    }
    public function insertImagePost($src,$alt){
        return DB::table('images')
            ->insertGetId([
                'src'=> $src,
                'alt' => $alt
            ]);
    }
    public function updateProfileImage($imageId,$idUser){
            DB::table('users_images')
            ->where([
                ['user_id',$idUser],
                ['image_id',$imageId]
            ])
            ->update([
            'profileImage' => 1
            ]);
            DB::table('users_images')
             ->where([
                 ['user_id',$idUser],
                 ['image_id','<>',$imageId]
             ])
             ->update([
                'profileImage' => 0
             ]);
            
            return DB::table('images')
                ->where('id',$imageId)
                ->get();
    }
    public function updatePostImage($imageId,$postId){
        DB::table('posts')
            ->where([
                ['id',$postId]
            ])
            ->update([
            'image_id' => $imageId
            ]);
            
    }
    public function deleteUserImages($idUser){
        return DB::table('users_images')
            ->where('user_id',$idUser)
            ->delete();
    }
}
