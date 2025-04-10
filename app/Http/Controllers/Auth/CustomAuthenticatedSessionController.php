<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Jobs\SendSMS;
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

            $otp = rand(100000, 999999);
            Cache::put('otp_' . $user->id, $otp, now()->addMinutes(5));

            SendSMS::dispatch($user->phone, "A senha temporaria e: $otp");

            return redirect('/verify-otp');
        }

        return back()->withErrors([
            Fortify::username() => 'As credenciais estão incorretas.',

        ]);
    }
}
