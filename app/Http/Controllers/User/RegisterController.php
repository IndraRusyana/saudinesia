<?php

namespace App\Http\Controllers\User;

use App\Models\User;
use App\Models\UserProfile;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    public function index()
    {
        return view('auth.user.register');
    }

    public function register(Request $request)
    {
        $name = 'user_' . uniqid();
        $request->validate([
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $user = User::create([
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        UserProfile::create([
            'user_id' => $user->id,
            'nama_lengkap' => $name,
        ]);

        Auth::guard('user')->login($user); // Langsung login setelah register
        $request->session()->regenerate();

        return redirect()->route('user.home');
    }
}
