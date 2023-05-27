<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\Sensor;
use App\Models\Device;
use Illuminate\Database\QueryException;

class DataSensorController extends Controller
{
    public function get_data(Request $request, $id, $data, $api_key){
        try{
            if($api_key != env('API_KEY')){
                return response()->json([
                    'message' => 'API KEY is invalid!',
                    'status' => false
                    ]
                );
            }

            $device = Device::where('id', $id)->get()[0];

            if($device->status != 'active'){
                return response()->json([
                    'message' => 'Device is not activate',
                    'status' => false
                ]);
            }

            $data = [
                'device_id' => $id,
                'data' => $data
            ];

            $sensor_data = Sensor::create($data);

            return response()->json([
                'message' => 'data has been created!',
                'status' => true,
                'data' => $sensor_data
            ]);
        }
        catch(QueryException $e){
            return response()->json([
                'message' => $e->errorInfo,
                'status' => false
            ]);
        }
    }
}
