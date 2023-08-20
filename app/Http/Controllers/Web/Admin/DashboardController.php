<?php

namespace App\Http\Controllers\Web\Admin;

use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index()
    {
        return view('web.admin.dashboard.index');
    }
}
