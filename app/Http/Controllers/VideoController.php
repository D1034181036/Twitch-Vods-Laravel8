<?php

namespace App\Http\Controllers;

use App\Services\TwitchApiService;
use App\Repositories\VideoRepository;
use App\Models\Users;
use App\Models\UpdateLog;

class VideoController extends Controller
{
    private $videoRepository;
    private $twitchApiService;

    public function __construct(VideoRepository $videoRepository, TwitchApiService $twitchApiService){
        $this->videoRepository = $videoRepository;
        $this->twitchApiService = $twitchApiService;
    }

    public function index(){
        $videos = $this->videoRepository->getIndexVideos();

        return view('index', ['videos' => $videos]);
    }

    public function updateVideosFromTwitch(){
        $users = Users::all();
        $videoIds = [];
        $logs = [
            'insert_count' => 0,
            'update_count' => 0,
            'soft_delete_count' => 0,
        ];

        foreach($users as $user){
            $videos = $this->twitchApiService->getUserVideos($user->user_id);

            foreach($videos as $video){
                //Rule: duration must > 1 hour
                if(strpos($video->duration, 'h') !== false){
                    $videoIds[] = $video->id;
                    $result = $this->videoRepository->updateOrCreate($video);
                    $result->wasRecentlyCreated ? $logs['insert_count']++ : $logs['update_count']++;
                }
            }
        }
        $logs['soft_delete_count'] = $this->videoRepository->softDeleteOtherVideos($videoIds);

        return UpdateLog::create($logs);
    }
}