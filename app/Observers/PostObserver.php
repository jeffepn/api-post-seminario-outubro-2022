<?php

namespace App\Observers;

use App\Events\PostCreated;
use App\Models\Post;

class PostObserver
{
    public function created(Post $post)
    {
        PostCreated::dispatch($post->id);
    }

    public function updated(Post $post)
    {
    }

    public function deleted(Post $post)
    {
    }

    public function restored(Post $post)
    {
        //
    }

    public function forceDeleted(Post $post)
    {
        //
    }
}
