<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Video;

class VideosController extends Controller
{
    function index(Request $request)
    {
        view()->share('channelIds', Video::select('channelId')->groupBy('channelId')->get()->map(function($video) { return $video->channelId; }));
        view()->share('videos', Video::orderBy('id', 'desc')->get());
    }

    function vCollect(Request $request)
    {
        view()->share('controller_videos', "active");
        return view('videos.vCollect');
    }
}
