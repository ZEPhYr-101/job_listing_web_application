<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Inertia\Inertia;

class RegisterController extends Controller
{
    public function index()
    {
        return Inertia::render('Register');
    }

    public function Register(Request $request)
    {
        //validate
        sleep(2);
        $credentials = $request->validate([
            'avatar' => ['file', 'nullable', 'max:300'],
            'name' => ['required', 'max:255'],
            'email' => ['required', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed'],

        ]);

        if ($request->hasFile('avatar')) {
            $credentials['avatar'] = Storage::disk('public')->put('avatars', $request->avatar);
        }
        //Register
        $user = User::create($credentials);

        event(new Registered($user));

        Auth::login($user);

        //Redirect
        return redirect()->route('dashboard')->with('success', 'Your are now registered! please Verify Your Email');
    }
}
