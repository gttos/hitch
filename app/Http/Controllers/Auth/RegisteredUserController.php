<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Carbon\Carbon;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\Rules;
use Illuminate\View\View;
use Laravel\Socialite\Facades\Socialite;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'username' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = User::create([
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'last_login' => Carbon::now()->toDateTimeString()
        ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::GUEST_HOME);
    }

    public function googleStore(): RedirectResponse
    {
        $googleUser = Socialite::driver('google')->stateless()->user();

        $user = User::updateOrCreate([
            'google_id' => $googleUser->id,
        ], [
            'firstname' => explode(' ', $googleUser->name)[0],
            'lastname' =>explode(' ', $googleUser->name)[1],
            'username' => $googleUser->nickname,
            'email' => $googleUser->email,
            'last_login' => Carbon::now()->toDateTimeString()
        ]);


        event(new Registered($user));

        Auth::login($user);

        if ($user->is_admin){
            return redirect(RouteServiceProvider::AUTH_HOME);
        }

        return redirect(RouteServiceProvider::GUEST_HOME);
    }
}
