<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class AuthOtpController extends Controller
{
    public function index()
    {
        return view('auth.verify-otp');
    }

    public function verify(Request $request)
    {
        $request->validate([
            'otp' => 'required|size:6',
        ]);
        
        $otp = Cache::get('otp_' . auth()->id());

        if ($request->otp == $otp) {

            session()->put('otp_verified', true);
            Cache::forget('otp_' . auth()->id());

            return redirect()->route('profile');
        }

        return back()->withErrors(['otp' => 'OTP inválido ou expirado']);
    }
}
