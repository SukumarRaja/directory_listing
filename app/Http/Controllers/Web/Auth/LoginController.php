<?php

namespace App\Http\Controllers\Web\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\StoreLoginRequest;
use App\Providers\RouteServiceProvider;

class LoginController extends Controller
{
    /**
     * Attempt to authenticate a new session.
     *
     * @param  \App\Http\Requests\Auth\StoreLoginRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(StoreLoginRequest $request): \Illuminate\Http\RedirectResponse
    {
        $credentials = [
            'email' => $request->input('email'),
            'password' => $request->input('password'),
            'is_active' => 1,
        ];

        if (auth()->attempt($credentials, $request->filled('remember_me'))) {
            $request->session()->regenerate();

            return redirect()->intended(RouteServiceProvider::HOME)->with(
                TOAST,
                [
                    'status' => SUCCESS,
                    'message' => __('Login successful!'),
                ]
            );
        }

        return back()->withErrors(['password' => __('Invalid credentials')])->withInput($request->except('password'));
    }
}
