<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UserProfile;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Http\Request;

class SocialAuthController extends Controller
{
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback(Request $request)
    {
        try {
            $googleUser = Socialite::driver('google')->stateless()->user();

            $user = User::where('email', $googleUser->getEmail())->first();

            if (!$user) {
                $user = User::create([
                    'email' => $googleUser->getEmail(),
                    'password' => Hash::make(Str::random(16)),
                ]);

                UserProfile::create([
                    'user_id' => $user->id,
                    'nama_lengkap' => $googleUser->getName() ?? 'user_' . uniqid(),
                ]);

                $user->sendEmailVerificationNotification();
            }

            $user = $user->fresh(); // <-- Tambahkan ini!

            Auth::guard('user')->login($user);
            $request->session()->regenerate();

            // return redirect()->route('verification.notice');
            return redirect()->route('user.home');
        } catch (\Exception $e) {
            return redirect()->route('user.login.form')->with('error', 'Gagal login dengan Google.');
        }
    }
}
