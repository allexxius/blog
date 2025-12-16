<?php

namespace App\Policies;

use App\Models\Comment;
use App\Models\User;

class CommentPolicy
{
    /**
     * Only the author can delete their comment.
     */
    public function delete(User $user, Comment $comment)
    {
        return $user->id === $comment->user_id;
    }
}
