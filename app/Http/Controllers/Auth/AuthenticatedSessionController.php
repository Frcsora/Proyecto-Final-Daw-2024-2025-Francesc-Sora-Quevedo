<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Models\Images;
use App\Models\Socialmedia;
use App\Models\User;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        if(session()->has('image')){
            $image = session()->get('image');
        }else{
            $image = Images::where('type', 'logo')
                ->where('active', 'true')->first();
            session()->put('image', $image);
        }
        if(session()->has('socialmedia')){
            $socialmedias = session()->get('socialmedia');
        }else{
            $socialmedias = Socialmedia::with('medias')->get();
            $socialmedias = SanitizeSVG::sanitizeSVG($socialmedias);
            session()->put('socialmedias', $socialmedias);
        }
        if(session()->has('imageFondo')){
            $imageFondo = session()->get('imageFondo');
        }else{
            $imageFondo = Images::where('type', 'fondo')
                ->where('active', 'true')->first();
        }
        return view('auth.login', ["image" => $image->base64, "imageFondo" => $imageFondo->base64, "socialmedias" => $socialmedias]);

    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): View
    {
        $user = User::where('email', $request->email)->first();
        if($user->active_user == 1){
            $request->authenticate();
            $request->session()->regenerate();
        }

        return redirect()->intended(route('login', absolute: false));
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): View
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect(route('login'));
    }
}
