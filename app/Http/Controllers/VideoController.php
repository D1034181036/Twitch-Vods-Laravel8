<?php

namespace App\Http\Controllers;

use App\Repositories\AccessLogRepository;
use App\Repositories\VideoRepository;
use App\Services\VideoService;

class VideoController extends Controller
{
    public function index(VideoRepository $videoRepository, AccessLogRepository $accessLogRepository){
        $accessLogRepository->createAccessLog();
        $videos = $videoRepository->getIndexVideos();

        return view('index', ['videos' => $videos]);
    }

    public function updateVideos(VideoService $videoService){
        return $videoService->updateVideosFromTwitch();
    }
}