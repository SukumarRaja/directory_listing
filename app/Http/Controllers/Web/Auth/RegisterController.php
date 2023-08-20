<?php

namespace App\Http\Controllers\Web\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\StoreRegisterRequest;
use App\Models\User;
use App\Providers\RouteServiceProvider;

class RegisterController extends Controller
{
    /**
     * Process the registration form submission.
     *
     * @param  \App\Http\Requests\Auth\StoreRegisterRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(StoreRegisterRequest $request): \Illuminate\Http\RedirectResponse
    {
        $user = User::create($request->validated());

        auth()->login($user);

        return redirect()->intended(RouteServiceProvider::HOME)->with(
            TOAST,
            [
                'status' => SUCCESS,
                'message' => __('Registration successful!'),
            ]
        );
    }
}
