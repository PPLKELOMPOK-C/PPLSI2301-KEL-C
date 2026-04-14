<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    /**
     * Dashboard Admin
     */
    public function index()
    {
        $user = Auth::user();

        return view('dashboard.admin', [
            'user' => $user,
        ]);
    }
}
