<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Kendaraan;
use App\Models\Pemesanan;
use Illuminate\Http\Request;


class DashboardController extends Controller
{
    public function index()
    {
        $kendaraan = Kendaraan::latest()->get();
        $pemesanan = Pemesanan::latest()->get();
        return view('dashboard.index', [
            'kendaraan' => $kendaraan,
            'pemesanan' => $pemesanan,
        ]);
    }
}
