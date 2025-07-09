<?php

declare(strict_types=1);

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

final class SocialiteController extends Controller
{
    public function redirect(string $provider): RedirectResponse
    {
        return new RedirectResponse(Socialite::driver($provider)->redirect()->getTargetUrl());
    }

    public function callback(string $provider): RedirectResponse
    {
        $socialiteUser = Socialite::driver($provider)->user();

        $user = User::query()
            ->where('google_id', $socialiteUser->getId())
            ->orWhere('email', $socialiteUser->getEmail())
            ->first();

        if ($user) {
            if ($user->google_id) {
                Auth::login($user);

                return redirect()->route('home');
            }

            return redirect()->route('login')->withErrors(['email' => __('An account with this email already exists. Please log in with your password.')]);
        }

        $user = User::create([
            'name' => $socialiteUser->getName(),
            'email' => $socialiteUser->getEmail(),
            'google_id' => $socialiteUser->getId(),
            'email_verified_at' => now(),
        ]);

        Auth::login($user);

        return redirect()->route('home');
    }
}
