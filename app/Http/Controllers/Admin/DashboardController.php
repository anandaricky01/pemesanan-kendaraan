<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Sensor;
use App\Models\Visitor;

class DashboardController extends Controller
{
    public function index(){
        $dataSensor = Sensor::orderByDesc('created_at')->take(30)->get();
        $sensorTabel = Sensor::orderByDesc('created_at')->take(30)->get();
        $visitors = Visitor::latest()->get();
        return view('dashboard.index', [
            'sensor' => $dataSensor,
            'sensor_tabel' => $sensorTabel,
            'visitors' => $visitors
        ]);
    }
}
