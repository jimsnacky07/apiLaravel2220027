<?php

namespace App\Http\Controllers;

use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        $data = [
            'totalUsers' => User::count(),
            'activeUsers' => User::where('email_verified_at', '!=', null)->count(),
        ];

        return view('dashboard', $data);
    }
}
