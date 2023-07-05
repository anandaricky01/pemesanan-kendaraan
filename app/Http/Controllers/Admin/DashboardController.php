<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Kendaraan;
use App\Models\Pemesanan;
use App\Models\RiwayatPemesanan;
use Illuminate\Http\Request;


class DashboardController extends Controller
{
    public function index()
    {
        $kendaraan = Kendaraan::latest()->get();
        $pemesanan = Pemesanan::latest()->get();
        $totalBBM_AT = RiwayatPemesanan::groupBy('kendaraan')
        ->selectRaw('kendaraan, SUM(bbm) as total_bbm')
        ->get();

        $currentMonth = \Carbon\Carbon::now()->month;
        $currentYear = \Carbon\Carbon::now()->year;

        $totalBBM_Month = RiwayatPemesanan::whereMonth('tanggal', $currentMonth)
            ->whereYear('tanggal', $currentYear)
            ->groupBy('kendaraan')
            ->selectRaw('kendaraan, SUM(bbm) as total_bbm')
            ->get();

        return view('dashboard.index', [
            'kendaraan' => $kendaraan,
            'pemesanan' => $pemesanan,
            'jumlahDataKendaraan' => $totalBBM_AT,
            'jumlahDataKendaraanMonth' => $totalBBM_Month,
        ]);
    }
}
