<?php

namespace App\Livewire\Auth;

use App\Models\User;
use App\Notifications\OtpNotification;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class Login extends Component
{
    public $user;
    public $email;
    public $password;
    public $verify_otp = false;
    public $otp;
    public $otp_error;
    public $email_pass_error;


    public function authenticate()
    {
        $credentials = $this->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::validate($credentials)) {
            $this->verify_otp = true;
            $this->user = User::firstWhere('email', $this->email);

            // Generate OTP
            $otp = rand(1000, 9999);
            $this->user->otp = bcrypt($otp); // Encrypt OTP before storing
            $this->user->otp_created_at = now();
            $this->user->save();

            // Send OTP via email (you need a notification or Mailable)
            $this->user->notify(new OtpNotification($otp));
        }

        $this->email_pass_error = 'Invalid Credentials';
    }

    public function verifyOtp()
    {
        if (Hash::check($this->otp, $this->user->otp) && Carbon::parse($this->user->otp_created_at)->diffInMinutes(now()) < 5) {
            Auth::login($this->user);

            // Clear the OTP fields
            $this->user->otp = null;
            $this->user->otp_created_at = null;
            $this->user->save();

            return redirect()->intended('dashboard');
        }

        $this->otp_error = 'Invalid OTP. Please try again.';
    }

    public function resendOtp()
    {
        // Generate OTP
        $otp = rand(1000, 9999);
        $this->user->otp = bcrypt($otp); // Encrypt OTP before storing
        $this->user->otp_created_at = now();
        $this->user->save();

        // Send OTP via email (you need a notification or Mailable)
        $this->user->notify(new OtpNotification($otp));
    }

    public function render()
    {
        return view('livewire.auth.login');
    }
}
