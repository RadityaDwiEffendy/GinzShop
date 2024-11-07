<?php

namespace App\Http\Controllers;

use App\Mail\VerificationMail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class VerificationController extends Controller
{
    /**
     * Resend the email verification link.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function resend(Request $request){
        $user = Auth::user();
        
        Mail::to($user->email)->send(new VerificationMail($user->verification_code));

        return back()->with('success', 'Verification email has been resent');
    }

    public function verify(Request $request)
    {
        $verificationCode = implode('', $request->input('verification_code'));

        $request->merge(['verification_code'=> $verificationCode]);
        $request->validate([
            'verification_code' => 'required|string|max:6',
        ]);


        $user = User::where('verification_code', $request->verification_code)->first();

        if (!$user) {
            return back()->withErrors(['verification_code' => 'Invalid verification code.']);
        }

        $user->email_verified_at = now();
        $user->verification_code = null;
        $user->save();


        Auth::login($user);


        return redirect()->route('auth.login')->with('success', 'Email successfully verified.');
    }
}
