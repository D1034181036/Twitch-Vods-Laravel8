<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\TwitchApiService;

class TestController extends Controller
{
    public function index(){
        return "Test Successed.";
    }
}
