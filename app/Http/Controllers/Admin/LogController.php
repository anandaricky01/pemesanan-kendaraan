<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Log;
use Illuminate\Http\Request;
use PDF;

class LogController extends Controller
{

    // public function __construct()
    // {
    //     $this->middleware('superadmin');
    // }

    public function index(Request $request){
        $logs = Log::latest()->filter($request->only(['startDate', 'endDate']))->paginate(10)->withQueryString();
        return view('dashboard.logs.index', [
            'logs' => $logs
        ]);
    }

    public function create_log($user, $device, String $status, String $activity){
        return Log::create(['device' => $device, 'user' => $user, 'status' => $status, 'activity' => $activity]);
    }

    public function cetak_pdf(Request $request){
        // deklarasi variabel tanggal
        $tanggal = '';

        // ambil data pada model menggunakan filter dateBetween
        $logs = Log::latest()->filter($request->only(['startDate', 'endDate']))->paginate(10)->withQueryString();

        if(isset($request->startDate)){
            $tanggal .= \Carbon\Carbon::createFromFormat('m/d/Y', $request->startDate)->format('d/m/Y');
        }

        if(isset($request->endDate)){
            $tanggal .=  ' - ' . \Carbon\Carbon::createFromFormat('m/d/Y', $request->endDate)->format('d/m/Y');
        }

        $pdf = PDF::loadview('dashboard.print.data_log',[
            'tanggal' => $tanggal,
            'logs' => $logs,
        ]);

    	return $pdf->download('laporan-data-log-pdf.pdf');
    }
}
