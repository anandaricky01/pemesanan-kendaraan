<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Sensor;
// use App\Models\Visitor;

class DashboardController extends Controller
{
    public function index(){
        $dataSensor = Sensor::orderByDesc('created_at')->take(10)->get();
        $sensorTabel = Sensor::orderByDesc('created_at')->take(30)->get();
        $data_rekap = [
            'data_tertinggi' => Sensor::min('data'), // terendah min karena sensor membaca jarak lebih dekat
            'data_terendah' => Sensor::max('data'), // terendah max karena sensor membaca jarak lebih jauh
            'data_rata_rata' => Sensor::avg('data'),
        ];
        return view('dashboard.index', [
            'sensor' => $dataSensor,
            'sensor_tabel' => $sensorTabel,
            'data_rekap' => $data_rekap,
        ]);
    }
}
