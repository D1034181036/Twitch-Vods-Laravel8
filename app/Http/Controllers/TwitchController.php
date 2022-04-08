<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TwitchController extends Controller
{
    private $token;

    private function getAccessToken(){
        $url = 'https://id.twitch.tv/oauth2/token';

        $headers = [
            'Content-Type: application/x-www-form-urlencoded'
        ];

        $body = [
            'client_id' => config('common.twitch.client_id'),
            'client_secret' => config('common.twitch.client_secret'),
            'grant_type' => 'client_credentials',
        ];

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL , $url);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($body));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);

        $response = curl_exec($ch);
        curl_close($ch);

        return json_decode($response);        
    }

    public function getUser($username){
        $this->token = $this->token ?? $this->getAccessToken();

        $query = http_build_query([
            'login' => $username,
        ]);

        $url = 'https://api.twitch.tv/helix/users?' . $query;

        $headers = [
            'Content-Type: application/x-www-form-urlencoded',
            'Client-Id: ' . config('common.twitch.client_id'),
            'Authorization: ' . 'Bearer ' . $this->token->access_token,
        ];

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL , $url);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);

        $response = curl_exec($ch);
        curl_close($ch);
        
        return json_decode($response)->data[0] ?? false;
    }

    public function getUserVideos($userId){
        $this->token = $this->token ?? $this->getAccessToken();

        $query = http_build_query([
            'user_id' => $userId,
            'type' => 'archive',
        ]);

        $url = 'https://api.twitch.tv/helix/videos?' . $query;

        $headers = [
            'Content-Type: application/x-www-form-urlencoded',
            'Client-Id: ' . config('common.twitch.client_id'),
            'Authorization: ' . 'Bearer ' . $this->token->access_token,
        ];

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL , $url);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);

        $response = curl_exec($ch);
        curl_close($ch);

        return json_decode($response)->data;
    }
}
