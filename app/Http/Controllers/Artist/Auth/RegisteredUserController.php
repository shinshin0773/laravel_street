<?php

namespace App\Http\Controllers\Artist\Auth;

use App\Http\Controllers\Controller;
use App\Models\Artist;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('artist.auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:artists',
            'userId' => 'required|string|max:255|unique:artists',
            'password' => 'required|string|confirmed|min:8',
        ]);

        Auth::guard('artists')->login($user = Artist::create([
            'name' => $request->name,
            'userId' => $request->userId,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]));

        event(new Registered($user));

        return view('artist.profile.create');
    }
}
