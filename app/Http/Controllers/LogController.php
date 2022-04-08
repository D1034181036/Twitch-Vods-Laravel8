<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AccessLog;
use App\Models\UpdateLog;

class LogController extends Controller
{
    public function updateVideos($logs){
        $result = UpdateLog::create([
            'insert_count' => $logs['insertCount'],
            'update_count' => $logs['updateCount'],
            'set_active_count' => $logs['setActiveCount'],
        ]);

        return $result;
    }

    public function accessLog(){
        $result = AccessLog::create([
            'page' => "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]",
            'ip' => $_SERVER['REMOTE_ADDR'],
        ]);

        return $result;
    }
}
