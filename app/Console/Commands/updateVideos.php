<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Services\VideoService;

class updateVideos extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'updateVideos';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = '更新DB影片資訊';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle(VideoService $videoService)
    {
        $videoService->updateVideosFromTwitch();
    }
}
