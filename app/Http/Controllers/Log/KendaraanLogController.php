<?php

namespace App\Http\Controllers\Log;

use App\Http\Controllers\Controller;
use App\Models\KendaraanLog;
use Illuminate\Http\Request;

class KendaraanLogController extends Controller
{
    public function index(){
        $kendaraan_logs = KendaraanLog::latest()->paginate(10)->withQueryString();
        return view('dashboard.logs.kendaraan.index', [
            'kendaraan_logs' => $kendaraan_logs,
        ]);
    }

    public function show($id){
        $kendaraan_log = KendaraanLog::where('id', $id)->get()[0];
        return view('dashboard.logs.kendaraan.show', [
            'kendaraan' => $kendaraan_log,
        ]);
    }
}
