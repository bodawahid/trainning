<?php

namespace App\Listeners;

use App\Events\VisitYoutube;
use App\Models\Video;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Auth;

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
        $user = Auth::user();
        $check = $user->videos->where('id', $video->id)->first();
        if (!$check) {
            $user->videos()->sync($video->id);
            $video->update(['view' => ($video->view +  1)]);
        }
    }
}
