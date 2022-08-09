<?php

namespace App\Repositories;

use App\Models\Videos;

class VideoRepository
{
    private $model;

    public function __construct(Videos $model){
        $this->model = $model;
    }

    public function getIndexVideos(){
        return $this->model
            ->with(['user'])
            ->where('viewable', 1)
            ->where('active', 1)
            ->orderBy('published_at', 'desc')
            ->paginate(12);
    }

    public function updateOrCreateFromTwitch($video){
        return $this->model
            ->updateOrCreate(
                [
                    'video_id' => $video->id,
                ],
                [
                    'user_id' => $video->user_id,
                    'type' => $video->type,
                    'title' => $video->title,
                    'description' => $video->description,
                    'url' => $video->url,
                    'thumbnail_url' => $video->thumbnail_url,
                    'viewable' => $video->viewable == 'public' ? 1 : 0,
                    'duration' => $this->durationFormatter($video->duration),
                    'view_count' => $video->view_count,
                    'published_at' => date("Y-m-d H:i:s", strtotime($video->published_at)),
                ]
            );
    }

    public function softDeleteOtherVideos($videoIds){
        return $this->model
            ->where('active', '1')
            ->whereNotIn('video_id', $videoIds)
            ->update(['active' => 0]);
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