<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Models\Images;
<<<<<<< HEAD
use App\Models\Socialmedia;
use App\Models\User;
=======
>>>>>>> parent of effacc4 (Revert "Primer commit del proyecto Laravel")
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
<<<<<<< HEAD
        $image = Images::where('type', 'logo')
            ->where('active', 'true')->first();
        $imageFondo = Images::where('type', 'fondo')
            ->where('active', 'true')->first();
        $socialmedias = Socialmedia::all();
        return view('auth.login', ["image" => $image->base64, "imageFondo" => $imageFondo->base64, "socialmedias" => $socialmedias]);
=======
        $image = Images::findOrFail(1);
        $imageFondo = Images::findOrFail(2);
        return view('auth.login', ["image" => $image->base64, "imageFondo" => $imageFondo->base64]);
>>>>>>> parent of effacc4 (Revert "Primer commit del proyecto Laravel")
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
<<<<<<< HEAD
        $user = User::where('email', $request->email)->first();
        if($user->active_user == 1){
            $request->authenticate();
            $request->session()->regenerate();
        }
=======
        $request->authenticate();

        $request->session()->regenerate();

>>>>>>> parent of effacc4 (Revert "Primer commit del proyecto Laravel")
        return redirect()->intended(route('login', absolute: false));
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect(route('login'));
    }
}
