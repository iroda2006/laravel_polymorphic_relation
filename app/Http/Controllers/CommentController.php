<?php

namespace App\Http\Controllers;

use App\Http\Requests\CommentRequest;
use App\Models\Post;
use App\Models\Video;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function storePost(CommentRequest $request, Post $post)
{
    $comment = new Comment();
    $comment->name = $request->name;
    $comment->comment = $request->comment;
    $post->comments()->save($comment);
    return back();
}
public function storeVideo(CommentRequest $request, $videoId)
{
    $video = Video::findOrFail($videoId);

    $comment = new Comment();
    $comment->name = $request->name;  
    $comment->comment = $request->comment;  
    $comment->commentable_id = $video->id;  
    $comment->commentable_type = get_class($video);  
    $comment->save();

    // Video sahifasiga qaytish
    return back();
}
 

public function destroy(Comment $comment)
{
 
    $comment->delete();
    return back();

}
}