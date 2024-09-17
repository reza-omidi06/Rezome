<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EmailVerificationController extends Controller
{
    public function showVerificationForm()
    {
        return view('auth.email_verification');
    }

    public function sendVerificationEmail(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'license_code' => 'required',
        ]);

        // اینجا لایسنس صحیح را بررسی کنید
        $correctLicense = '1234';
        if ($request->license_code !== $correctLicense) {
            return back()->withErrors(['license_code' => 'کد لایسنس اشتباه است.'])->withInput();
        }

        // ارسال ایمیل تأیید به کاربر
        $token = sha1($request->email . time()); // ایجاد یک توکن برای تأیید ایمیل
        session(['email_verification_token' => $token, 'email' => $request->email]);

        Mail::to($request->email)->send(new VerificationMail($token));

        return redirect()->route('email.sent');
    }

    public function verifyEmail($token)
    {
        if (session('email_verification_token') === $token) {
            session(['email_verified' => true]);
            return redirect()->route('login');
        }

        return redirect()->route('email.license.form')->withErrors(['error' => 'توکن تأیید نامعتبر است.']);
    }
}
