<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class TwitterController extends Controller
{
    public function redirectToTwitter()
    {
        $clientId = env('CLIENT_ID');
        $redirectUri = urlencode(env('TWITTER_REDIRECT_URI'));
        $scopes = urlencode('tweet.read tweet.write users.read offline.access');

        $state = bin2hex(random_bytes(16));
        session(['twitter_oauth_state' => $state]);

        $codeVerifier = bin2hex(random_bytes(32));
        session(['twitter_code_verifier' => $codeVerifier]);

        $authorizationUrl = "https://twitter.com/i/oauth2/authorize" .
            "?response_type=code" .
            "&client_id={$clientId}" .
            "&redirect_uri={$redirectUri}" .
            "&scope={$scopes}" .
            "&state={$state}" .
            "&code_challenge={$codeVerifier}" .
            "&code_challenge_method=plain";

        return redirect($authorizationUrl);
    }
    public function handleTwitterCallback(Request $request)
    {
        $state = $request->input('state');
        $code = $request->input('code');

        if ($state !== session('twitter_oauth_state')) {
            abort(403, 'Estado inválido');
        }

        $codeVerifier = session('twitter_code_verifier');

        $response = Http::asForm()->post('https://api.twitter.com/2/oauth2/token', [
            'client_id' => env('CLIENT_ID'),
            'grant_type' => 'authorization_code',
            'code' => $code,
            'redirect_uri' => env('TWITTER_REDIRECT_URI'),
            'code_verifier' => $codeVerifier,
        ]);
        if ($response->successful()) {
            $data = $response->json();
            session([
                'twitter_access_token' => $data['access_token'],
                'twitter_refresh_token' => $data['refresh_token'],
            ]);

            $text = session('tweetText');

            $accessToken = session('twitter_access_token');

            if (!$accessToken) {
                return redirect()->route('twitter.redirect');
            }
            $response = Http::withToken($accessToken)
                ->post('https://api.twitter.com/2/tweets', [
                    'text' => $text,
                ]);
             @dd($response);
            if ($response->successful()) {
                return redirect() -> route('news.index');
            } else {
                return redirect() -> route('news.create');
            }
        } else {
            return redirect()->route('teams.index')->with('error', 'Error al obtener token');
        }
    }
    public function postTweet(Request $request)
    {

        $text = $request->input('text');

        $accessToken = session('twitter_access_token');

        if (!$accessToken) {
            return redirect()->route('twitter.redirect');
        }
        $response = Http::withToken($accessToken)
            ->post('https://api.twitter.com/2/tweets', [
                'text' => $text,
            ]);

        if ($response->successful()) {
            return route('news.index')->with('success', 'Tweet publicado correctamente!');
        } else {
            return route('news.create')->with('error', 'Error al publicar el tweet.');
        }
    }
}
