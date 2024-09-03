<?php

namespace App\Listeners;

use App\Events\VisitYoutube;
use App\Models\Video;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class IncreaseViews
{
    /**
     * Create the event listener.
     */
    public $video;
    public function __construct(VisitYoutube $visitYoutube)
    {
        $this->video = $visitYoutube->video;
    }

    /**
     * Handle the event.
     */
    public function handle(VisitYoutube $visitYoutube)
    {
        $this->increaseView($visitYoutube->video);
    }
    protected function increaseView(Video $video)
    {
        $video->update(['view' => ($video->view +  1 )]);
    }
}
