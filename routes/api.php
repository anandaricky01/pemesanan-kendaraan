<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\BMKGController;
use App\Http\Controllers\Api\DataSensorController;
use App\Http\Controllers\Api\SensorApiController;
use App\Models\Sensor;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/cuaca', [BMKGController::class, 'index']);

// Route::group(['prefix' => 'v1'], function(){
//     Route::get('/device/{id}/data/{data}', [DataSensorController::class, 'get_data']);
// });

Route::post('/data', function(Request $request){
    try {
        Sensor::create([
            'device_id' => $request->device_id,
            'data' => $request->data
        ]);
    } catch (\Throwable $th) {
        Sensor::create([
            'device_id' => $request->device_id,
            'data' => '0'
        ]);
    }
    return $request;
});

Route::get('/data', [SensorApiController::class, 'data_sensor'])->name('data_sensor');
