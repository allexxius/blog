<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function store(Request $request, Post $post)
    {
        $request->validate([
            'body' => 'required|string|max:1000',
        ]);

        $post->comments()->create([
            'body' => $request->body,
            'user_id' => Auth::id(),
        ]);

        return redirect()->back()->with('success', 'Comment added!');
    }

    public function destroy(Comment $comment)
    {
        $this->authorize('delete', $comment);
        $comment->delete();

        return redirect()->back()->with('success', 'Comment deleted!');
    }
}
