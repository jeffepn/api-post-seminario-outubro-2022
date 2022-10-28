<?php

namespace App\Listeners;

use App\Events\PostCreated;
use App\Models\Post;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Carbon;

class WhenCreatedPostUpdatePublishedAt
{
    public function __construct()
    {
        //
    }

    public function handle(PostCreated $event)
    {
        $post = Post::find($event->postId);
        
        $now = Carbon::now();
        $post->update(['available_at' => $now->addDays(2)]);        
    }
}
