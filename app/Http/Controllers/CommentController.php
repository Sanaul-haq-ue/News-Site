<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function newComment(Request $request){
        Comment::saveComment($request);
        return back();
    }

}
