<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;

class TwitterHelper
{
    public static function getTweets(int $count = 5)
    {
        $userName = env('TWITTER_USERNAME');
        return Cache::remember("tweets_{$userName}", now()->addHours(8), function () use ($userName, $count) {
            $bearerToken = env('TWITTER_BEARER_TOKEN');

            $userResponse = Http::withToken($bearerToken)
                ->get("https://api.twitter.com/2/users/by/username/{$userName}");

            if ($userResponse->failed()) {
                return [];
            }

            $userId = $userResponse->json('data.id');

            $tweetsResponse = Http::withToken($bearerToken)
                ->get("https://api.twitter.com/2/users/{$userId}/tweets", [
                    'max_results' => $count,
                    'tweet.fields' => 'created_at,text',
                    'exclude'=>'replies'
                ]);

            if ($tweetsResponse->failed()) {
                return [];
            }

            return $tweetsResponse->json('data');
        });

    }


}
