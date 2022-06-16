<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class updateVideosTest extends TestCase
{
    protected $videoController;

    public function setUp(): void
    {
        parent::setUp();
        $this->videoController = $this->app->make('App\Http\Controllers\VideoController');
    }

    public function test_example()
    {
        $response = $this->videoController->updateVideosFromTwitch();
        $this->assertTrue(true);
    }
}
