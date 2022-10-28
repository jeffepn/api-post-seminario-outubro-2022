<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class WhenCreatedPostSendMailUsers implements ShouldQueue
{
    public $tries = 3;
    
    public function __construct()
    {
        //
    }

    public function handle($event)
    {
        
    }
}
