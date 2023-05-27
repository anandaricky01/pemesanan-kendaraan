<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Sensor;
use Illuminate\Http\Request;

class SensorApiController extends Controller
{
    public function data_sensor(){
        try {
            $data_sensor = Sensor::latest()->get();
            return response()->json([
                'message' => 'Data sent successfuly',
                'data' => $data_sensor,
            ]);
        } catch (\Throwable $th) {
            $data_sensor = null;
            return response()->json([
                'message' => 'Data send problem',
                'data' => $data_sensor,
            ]);
        }
    }
}
