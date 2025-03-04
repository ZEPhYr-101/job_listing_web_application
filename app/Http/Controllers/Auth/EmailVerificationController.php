<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;
use Inertia\Inertia;

class EmailVerificationController extends Controller
{
    public function notice()
    {
        return Inertia::render('VerifyEmail');
    }

    public function handler(EmailVerificationRequest $request)
    {
        $request->fulfill();
        return Inertia::render('Dashboard')->with('success', 'Your Email Has Been Verified!');
    }

    public function resend(Request $request)
    {
        $request->user()->sendEmailVerificationNotification();

        return back()->with('success', 'Verification link Was Sent!');
    }
}
