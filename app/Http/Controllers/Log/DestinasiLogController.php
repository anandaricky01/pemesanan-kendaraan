<?php

namespace App\Http\Controllers\Log;

use App\Http\Controllers\Controller;
use App\Models\DestinasiLog;
use Illuminate\Http\Request;

class DestinasiLogController extends Controller
{
    public function index(){
        $destinasi_logs = DestinasiLog::latest()->paginate(10)->withQueryString();
        return view('dashboard.logs.destinasi.index', [
            'destinasi_logs' => $destinasi_logs,
        ]);
    }

    public function show($id){
        $destinasi_log = DestinasiLog::where('id', $id)->get()[0];
        return view('dashboard.logs.destinasi.show', [
            'destinasi' => $destinasi_log,
        ]);
    }
}
