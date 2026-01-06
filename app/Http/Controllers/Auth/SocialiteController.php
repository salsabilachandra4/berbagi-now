<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite; // Pastikan library ini sudah diinstall
use Exception;
use Illuminate\Support\Str;

class SocialiteController extends Controller
{
    public function redirect($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    public function callback($provider)
    {
        try {
            // Ambil data user dari Google
            $socialUser = Socialite::driver($provider)->user();

            // PERBAIKAN DI SINI: Gunakan getId() dan getEmail()
            // 1. Cari user berdasarkan google_id atau email
            $user = User::where('google_id', $socialUser->getId())
                        ->orWhere('email', $socialUser->getEmail())
                        ->first();

            if ($user) {
                // Jika user ada tapi belum punya google_id
                if (!$user->google_id) {
                    $user->update([
                        // PERBAIKAN DI SINI: Gunakan getId()
                        'google_id' => $socialUser->getId(),
                        // Gunakan getAvatar() (sudah benar di kode lama, tapi pastikan konsisten)
                        'image' => $user->image ? $user->image : $socialUser->getAvatar()
                    ]);
                }
            } else {
                // 2. Jika user tidak ada, buat user baru
                $user = User::create([
                    'name'              => $socialUser->getName(),
                    'email'             => $socialUser->getEmail(),
                    'google_id'         => $socialUser->getId(),
                    'role'              => 'volunteer',
                    'image'             => $socialUser->getAvatar(),
                    'password'          => bcrypt(Str::random(16)),
                    'email_verified_at' => now(),
                ]);
            }

            // Login user
            Auth::login($user, true);

            return redirect()->route('dashboard');

        } catch (Exception $e) {
            return redirect('/login')->with('error', 'Login gagal: ' . $e->getMessage());
        }
    }
}
