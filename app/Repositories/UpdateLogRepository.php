<?php

namespace App\Repositories;

use App\Models\UpdateLog;

class UpdateLogRepository
{
    private $model;

    public function __construct(UpdateLog $model){
        $this->model = $model;
    }

    public function updateVideos($logs){
        return $this->model->create($logs);
    }
}