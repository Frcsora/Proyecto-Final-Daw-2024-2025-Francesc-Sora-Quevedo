<?php

return [

    'defaults' => [
        'auth' => 'oauth',
        'format' => 'json',
    ],
    'connections' => [
        'oauth' => [
            'consumer_key'    => env('TWITTER_CONSUMER_KEY'),
            'consumer_secret' => env('TWITTER_CONSUMER_SECRET'),
            'access_token'    => env('TWITTER_ACCESS_TOKEN'),
            'access_secret'   => env('TWITTER_ACCESS_TOKEN_SECRET'),
        ],

    ],

];
