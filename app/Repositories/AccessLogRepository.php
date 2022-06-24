<?php

namespace App\Repositories;

use App\Models\AccessLog;

class AccessLogRepository
{
    private $model;

    public function __construct(AccessLog $model){
        $this->model = $model;
    }

    public function createAccessLog(){
        return $this->model
            ->create([
                'host' => data_get($_SERVER, 'HTTP_HOST', null),
                'request_uri' => data_get($_SERVER, 'REQUEST_URI', null),
                'ip' => data_get($_SERVER, 'REMOTE_ADDR', null),
            ]);
    }
}