<?php

namespace App\Http\Controllers;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class OtpController extends Controller
{
    public function verifyForm(Request $request)
    {
        return view('auth.otp', [
            'email' => request('email')
        ]);
    }
    public function verify(Request $request)
    {
        $user = User::where('email', $request->email)->firstOrFail();
        if (Hash::check($request->otp, $user->otp) && Carbon::parse($user->otp_created_at)->diffInMinutes(now()) < 5) {
            // Step 6: Authenticate user
            Auth::login($user);

            // Clear the OTP fields
            $user->otp = null;
            $user->otp_created_at = null;
            $user->save();

            return redirect()->intended('dashboard');
        } else {
            return back()->withErrors(['otp' => 'The provided OTP is invalid or has expired.']);
        }
    }
}
