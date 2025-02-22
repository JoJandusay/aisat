<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Notifications\OtpNotification;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /**
     * Handle an authentication attempt.
     */
    public function authenticate(Request $request): RedirectResponse
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::validate($credentials)) {
            $user = User::where('email', $request->email)->first();

            // Generate OTP
            $otp = rand(1000, 9999);
            $user->otp = bcrypt($otp); // Encrypt OTP before storing
            $user->otp_created_at = now();
            $user->save();

            // Send OTP via email (you need a notification or Mailable)
            $user->notify(new OtpNotification($otp));

            return redirect()->route('otp.verify-form', ['email' => $user->email])
                ->with('status', 'OTP has been sent to your email.');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }
    public function index()
    {
        return view('auth.login');
    }

    public function logout(Request $request): RedirectResponse
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
