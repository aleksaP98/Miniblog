<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;

class CommentsModel {
    public  function getCommentsForPost($posts){
        $comments = [];
        foreach ($posts as $post) {
            $comments[$post->id] = DB::table('comments')
                ->join('users','users.id','=','comments.user_id')
                ->join('users_images AS ui','ui.user_id','=','users.id')
                ->join('images' ,'images.id','=','ui.image_id')
                ->where([
                    ['comments.post_id',$post->id],
                    ['ui.profileImage',1]
                ])
                ->select('comments.description','comments.createdAt','comments.post_id','comments.id','comments.user_id','comments.parent_id','images.src','images.alt','users.firstName','users.lastName')
                ->orderBy('comments.createdAt')
                ->get();
        }
        return $comments;
    }
    public  function  addComment($idUser,$idPost,$comment){
        DB::table('comments')
            ->insertGetId([
                'description' => $comment,
                'user_id' => $idUser,
                'post_id' => $idPost
            ]);
        return DB::table('comments')
        ->join('users','users.id','=','comments.user_id')
        ->join('users_images AS ui','ui.user_id','=','users.id')
        ->join('images' ,'images.id','=','ui.image_id')
        ->where([
            ['comments.post_id',$idPost],
            ['ui.profileImage',1]
        ])
        ->select('comments.description','comments.createdAt','comments.post_id','comments.id','comments.user_id','comments.parent_id','images.src','images.alt','users.firstName','users.lastName')
        ->orderBy('comments.createdAt')
        ->get();
    }
    public function addReply($idUser,$idPost,$comment,$idComment){
        DB::table('comments')
            ->insertGetId([
                'description' => $comment,
                'user_id' => $idUser,
                'parent_id' => $idComment,
                'post_id' => $idPost
            ]);
        return DB::table('comments')
            ->join('users','users.id','=','comments.user_id')
            ->join('users_images AS ui','ui.user_id','=','users.id')
            ->join('images' ,'images.id','=','ui.image_id')
            ->where([
                ['comments.post_id',$idPost],
                ['ui.profileImage',1]
            ])
            ->select('comments.description','comments.createdAt','comments.post_id','comments.id','comments.user_id','comments.parent_id','images.src','images.alt','users.firstName','users.lastName')
            ->orderBy('comments.createdAt')
            ->get();
    }
    public function deleteAllUserComments($idUser){
        $userComments = DB::table('comments')
            ->where('user_id',$idUser)
            ->whereNull('parent_id')
            ->get();
        if(count($userComments)){
            foreach ($userComments as $userComment) {
                DB::table('comments')
                    ->where('parent_id',$userComment->idComment)
                    ->delete();
            }
        }
        return DB::table('comments')
            ->where('user_id',$idUser)
            ->delete();
    }
}
