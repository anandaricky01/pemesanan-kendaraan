<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Sensor;
use Illuminate\Http\Request;

class GetLatestData extends Controller
{
    public function getLatestData(Request $request) {
        $sensorTabel = Sensor::orderByDesc('created_at')->take(30)->get();

        // Kembalikan tampilan tabel data terbaru sebagai respons JSON
        return response()->json(view('dashboard.latest_data', compact('sensor_tabel'))->render());
    }
}
