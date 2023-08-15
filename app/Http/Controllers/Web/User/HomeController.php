<?php

namespace App\Http\Controllers\Web\User;

use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    /**
     * Display the user's home page.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('web.user.home.index');
    }
}
