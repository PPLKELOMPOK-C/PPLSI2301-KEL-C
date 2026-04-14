<?php

namespace App\Http\Controllers\Calon;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CalonDashboardController extends Controller
{
    /**
     * Dashboard Calon Penghuni
     */
    public function index()
    {
        $user = Auth::user();

        // sementara dummy (nanti diganti dari database)
        $statusPengajuan = 'Belum Mengajukan';

        return view('dashboard.calon', [
            'user' => $user,
            'statusPengajuan' => $statusPengajuan,
        ]);
    }
}
