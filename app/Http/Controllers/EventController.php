<?php

namespace App\Http\Controllers;

use App\Events\VisitYoutube;
use App\Models\Video;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function index()
    {
        $video = Video::first();
        // event(new VisitYoutube($video));
        $video->update(['view' => $video->view +  1]);
        return view('event.youtube', compact('video'));
    }
}
