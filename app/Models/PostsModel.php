<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;

class PostsModel {

    public  function getPostsForUser($userId){
        return DB::table('posts')
            ->leftJoin('images','images.id','=','posts.image_id')
            ->where('posts.user_id',$userId)
            ->select('posts.title','posts.description','posts.createdAt','posts.updatedAt','posts.user_id','posts.id','images.src','images.alt')
            ->get();
    }
    public function getAll(){
        return DB::table('posts')
            ->leftJoin('images','images.id','=','posts.image_id')
            ->select('posts.title','posts.description','posts.createdAt','posts.updatedAt','posts.user_id','posts.id','images.src','images.alt')
            ->orderBy('createdAt')
            ->get();
    }
    public function deletePost($idPost){
        DB::table('posts')
        ->where('id',$idPost)
        ->delete();
    }
    public function deleteAllUserPosts($idUser){
        $userPosts  = DB::table('posts')
            ->where('user_id',$idUser)
            ->get();
        foreach ($userPosts as $post){
            DB::table('posts_comments')
                ->where('id',$post->idPost)
                ->delete();
        }
        return DB::table('posts')
            ->where('user_id',$idUser)
            ->delete();
    }
    public function addPost($title,$description,$createdAt,$idUser,$idImage=null){
        return DB::table('posts')
            ->insert([
                'title' => $title,
                'description' =>$description,
                'createdAt' => $createdAt,
                'user_id' => $idUser,
                'image_id' => $idImage
            ]);
    }
    public  function updatePost($title,$description,$updatedAt,$idPost){
        return DB::table('posts')
            ->where('id',$idPost)
            ->update([
                'title'=>$title,
                'description' =>$description,
                'updatedAt'=>$updatedAt
            ]);
    }
    public  function updatePostImage($idImage,$idPost){
        return DB::table('posts')
            ->where('id',$idPost)
            ->update([
                'image_id' =>$idImage
            ]);
    }
}

