<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use Exception;

class SocialiteController extends Controller
{
    public function redirect($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    public function callback($provider)
    {
        try {
            // Variabel ini menampung data dari Google
            $socialUser = Socialite::driver($provider)->user();

            // Cari user berdasarkan data dari Google ($socialUser)
            $user = User::where('google_id', $socialUser->id)
                        ->orWhere('email', $socialUser->email)
                        ->first();

            if ($user) {
                if (!$user->google_id) {
                    $user->update(['google_id' => $socialUser->id]);
                }
            } else {
                // Buat user baru menggunakan data dari $socialUser
                $user = User::create([
                    'name'              => $socialUser->name,
                    'email'             => $socialUser->email,
                    'google_id'         => $socialUser->id,
                    'role'              => 'volunteer',
                    'password'          => bcrypt('password-random-123'),
                    'email_verified_at' => now(),
                ]);
            }

            Auth::login($user, true);
            return redirect()->route('dashboard');

        } catch (Exception $e) {
            return redirect('/login')->with('error', 'Login gagal: ' . $e->getMessage());
        }
    }
}
