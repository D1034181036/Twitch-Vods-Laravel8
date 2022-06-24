<?php

namespace App\Http\Controllers;

use App\Repositories\AccessLogRepository;

class StatusController extends Controller
{
    private $accessLogRepository;

    public function __construct(AccessLogRepository $accessLogRepository){
        $this->accessLogRepository = $accessLogRepository;
    }

    public function getStatus(){
        $this->accessLogRepository->createAccessLog();

        return json_encode([
            'status' => 200,
            'message' => 'The web server is alive!',
        ]);
    }
}