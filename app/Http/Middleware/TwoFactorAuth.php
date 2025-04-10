<?php

namespace App\Http\Middleware;

use App\Jobs\SendSMS;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Symfony\Component\HttpFoundation\Response;

class TwoFactorAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::check() && !session('otp_verified')) {
            
            
            $otp = rand(100000, 999999);
            Cache::put('otp_' . auth()->id(), $otp, now()->addMinutes(5));

            SendSMS::dispatch(auth()->user()->phone, "A senha temporaria e: $otp");

            return redirect()->route('verify-otp');
        }

        return $next($request);
    }
}
