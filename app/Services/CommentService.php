<?php

namespace App\Services;

use App\Models\CommentsModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class CommentService {
    private $commentsModel;

    public function __construct()
    {
        $this->commentsModel = new CommentsModel();
    }
    public function addComment(Request $request){
        DB::beginTransaction();
        try{
            $comments =$this->commentsModel->addComment($request->input('idUser'),$request->input('idPost'),$request->input('comment'));
            DB::commit();
            return $comments;
        }
        catch (\Exception $exception){
            Log::error('DATABASE ERROR - COULD NOT INSERT COMMENT - '. $exception->getMessage());
            return false;
        }

    }
    public function addReply(Request $request){
        DB::beginTransaction();
        try{
            $comments =$this->commentsModel->addReply($request->input('idUser'),$request->input('idPost'),$request->input('comment'),$request->input('idComment'));
            DB::commit();
            return $comments;
        }
        catch (\Exception $exception){
            Log::error('DATABASE ERROR - COULD NOT INSERT REPLY - '. $exception->getMessage());
            return false;
        }
    }
    public function deleteUserComments(Request $request){
        try {
            return $this->commentsModel->deleteAllUserComments($request->route('id'));
        }
        catch (\Exception $exception){
            Log::error('DATABASE ERROR - COULD NOT DELETE USER COMMENTS - '.$exception->getMessage());
            return false;
        }

    }
    public function getCommentsForPost($posts){
        return $this->commentsModel->getCommentsForPost($posts);
    }
}
