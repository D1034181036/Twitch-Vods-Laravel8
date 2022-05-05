<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\TwitchController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LogController;
use App\Models\Videos;
use App\Models\Users;

class VideoController extends Controller
{
    private $logController;

    public function __construct(LogController $logController){
        $this->logController = $logController;
    }

    public function index(){
        $this->logController->accessLog();

        $videos = Videos::with(['user'])
            ->where('viewable', 1)
            ->where('active', 1)
            ->orderBy('published_at', 'desc')
            ->paginate(12);

        return view('index', ['videos' => $videos]);
    }

    public function updateVideos(TwitchController $twitchController){
        $insertCount = 0;
        $updateCount = 0;
        $setActiveCount = 0;

        $videoIds = [];
        $users = Users::all();

        foreach($users as $user){
            $videos = $twitchController->getUserVideos($user->user_id);
            foreach($videos as $video){
                //Rule: duration must > 1 hour
                if(strpos($video->duration, 'h') !== false){
                    $videoIds[] = $video->id;

                    //Check if video exists in db or not
                    $videoExiest = Videos::where('video_id', $video->id)->count();

                    if($videoExiest){
                        $updateCount += $this->updateVideo($video) ? 1 : 0;
                    }else{
                        $insertCount += $this->insertVideo($video) ? 1 : 0;
                    }
                }
            }
        }

        // 將失效的影片設定為active = 0
        $setActiveCount = Videos::where('active', '1')->whereNotIn('video_id', $videoIds)->update(['active' => 0]);

        return $this->logController->updateVideos($insertCount, $updateCount, $setActiveCount);
    }

    private function insertVideo($video){
        $result = Videos::create([
            'user_id' => $video->user_id,
            'video_id' => $video->id,
            'type' => $video->type,
            'title' => $video->title,
            'description' => $video->description,
            'url' => $video->url,
            'thumbnail_url' => $video->thumbnail_url,
            'viewable' => $video->viewable == 'public' ? 1 : 0,
            'duration' => $this->durationFormatter($video->duration),
            'view_count' => $video->view_count,
            'published_at' => date("Y-m-d H:i:s", strtotime($video->published_at)),
        ]);

        return $result;
    }

    private function updateVideo($video){
        $result = Videos::where('video_id', $video->id)->update([
            'user_id' => $video->user_id,
            'video_id' => $video->id,
            'type' => $video->type,
            'title' => $video->title,
            'description' => $video->description,
            'url' => $video->url,
            'thumbnail_url' => $video->thumbnail_url,
            'viewable' => $video->viewable == 'public' ? 1 : 0,
            'duration' => $this->durationFormatter($video->duration),
            'view_count' => $video->view_count,
            'published_at' => date("Y-m-d H:i:s", strtotime($video->published_at)),
        ]);

        return $result;
    }

    private function durationFormatter($duration){
        preg_match_all('!\d+!', $duration, $matches);

        foreach($matches[0] as $i){
            $i = str_pad($i, 2, "0", STR_PAD_LEFT);
            $formatDuration = isset($formatDuration) ? "$formatDuration:$i" : $i;
        }

        return $formatDuration;
    }
}
