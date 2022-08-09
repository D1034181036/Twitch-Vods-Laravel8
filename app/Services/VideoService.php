<?php

namespace App\Services;

use App\Services\TwitchApiService;
use App\Repositories\VideoRepository;
use App\Models\UpdateLog;
use App\Models\Users;

class VideoService
{
    public function __construct(TwitchApiService $twitchApiService, VideoRepository $videoRepository){
        $this->twitchApiService = $twitchApiService;
        $this->videoRepository = $videoRepository;
    }

    public function updateVideosFromTwitch(){

        $users = Users::all();
        $videoIdList = [];
        $insertCount = 0;
        $updateCount = 0;
        $softDeleteCount = 0;

        foreach($users as $user){
            $videos = $this->twitchApiService->getUserVideos($user->user_id);

            foreach($videos as $video){
                // Rule: duration must > 1 hour
                if(strpos($video->duration, 'h') !== false){
                    $videoIdList[] = $video->id;
                    $result = $this->videoRepository->updateOrCreateFromTwitch($video);
                    $result->wasRecentlyCreated ? $insertCount++ : $updateCount++;
                }
            }
        }

        $softDeleteCount = $this->videoRepository->softDeleteOtherVideos($videoIdList);

        UpdateLog::create([
            'insert_count' => $insertCount,
            'update_count' => $updateCount,
            'soft_delete_count' => $softDeleteCount,
        ]);

        return true;
    }
}
