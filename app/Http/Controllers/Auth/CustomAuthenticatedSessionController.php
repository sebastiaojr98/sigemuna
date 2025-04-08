<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Support\SMS;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Laravel\Fortify\Fortify;

class CustomAuthenticatedSessionController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'phone' => 'required|string',
            'password' => 'required|string',
        ]);

        if (Auth::attempt($request->only(Fortify::username(), 'password'))) {
            $user = Auth::user();

            // Gerar e enviar OTP
            $otp = rand(100000, 999999);
            Cache::put('otp_' . $user->id, $otp, now()->addMinutes(5));
            SMS::send($user->phone, "A senha temporaria e: $otp");
            session(['otp_sent' => true]);

            return redirect('/verify-otp');
        }

        return back()->withErrors([
            Fortify::username() => 'As credenciais estão incorretas.',

        ]);
    }
}
