<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\RiwayatPemesanan;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\RiwayatPemesananExport;

class RiwayatPemesananController extends Controller
{
    public function index(){
        $pemesanan = RiwayatPemesanan::latest()->paginate(7)->withQueryString();

        return view('dashboard.riwayat.pemesanan.index', [
            'pemesanan' => $pemesanan,
        ]);
    }

    public function detail($id){
        $pemesanan = RiwayatPemesanan::where('id', $id)->first();

        return view('dashboard.riwayat.pemesanan.show', [
            'pemesanan' => $pemesanan,
        ]);
    }

    public function exportToExcel()
    {
        return Excel::download(new RiwayatPemesananExport, 'riwayat_pemesanan.xlsx');
    }
}
