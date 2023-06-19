<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Admin\LogController;
use App\Models\Device;
use App\Models\Sensor;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use PDF;

class DeviceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    // public function __construct()
    // {
    //     $this->middleware('sadmin')->except(['sensor']);
    // }

    public function index(Request $request)
    {
        $devices = Device::latest()->filter(
            $request->only('search'))->paginate(5)->withQueryString();
        return view('dashboard.device.index', [
            'devices' => $devices
        ]);
    }

    public function sensor(Request $request){
        $data_sensor = Sensor::latest()->filter($request->only(['startDate', 'endDate']));
        $data_sensor_clone = clone $data_sensor;

        $sensors = $data_sensor->paginate(10)->withQueryString();
        $data_rekap = [
            'data_tertinggi' => $data_sensor_clone->min('data'),
            'data_terendah' => $data_sensor_clone->max('data'),
            'data_rata_rata' => $data_sensor_clone->avg('data'),
        ];

        return view('dashboard.device.sensor', [
            'sensors' => $sensors,
            'data_rekap' => $data_rekap,
        ]);
    }

    // untuk cetak pdf data sensor
    public function cetak_pdf(Request $request){
        // deklarasi variabel tanggal
        $tanggal = '';

        // ambil data pada model menggunakan filter dateBetween
        $data_sensor = Sensor::latest()->filter($request->only(['startDate', 'endDate']));

        if(isset($request->startDate)){
            $tanggal .= \Carbon\Carbon::createFromFormat('m/d/Y', $request->startDate)->format('d/m/Y');
        }

        if(isset($request->endDate)){
            $tanggal .=  ' - ' . \Carbon\Carbon::createFromFormat('m/d/Y', $request->endDate)->format('d/m/Y');
        }

        $data_rekap = [
            'data_rata_rata' => $data_sensor->avg('data'),
            'data_tertinggi' => $data_sensor->min('data'),
            'created_at_tertinggi' => $data_sensor->where('data', $data_sensor->max('data'))->value('created_at'),
            'data_terendah' => $data_sensor->max('data'),
            'created_at_terendah' => $data_sensor->where('data', $data_sensor->min('data'))->value('created_at'),
        ];

        $pdf = PDF::loadview('dashboard.print.data_sensor',[
            'tanggal' => $tanggal,
            'data_rekap' => $data_rekap,
        ]);

    	return $pdf->download('laporan-data-sensor-pdf.pdf');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.device.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            'name' => ['required', 'max:255'],
            'description' => ['required', 'max:255'],
            'status' => 'required'
        ]);

        try {
            $device = Device::create($validate);
            app('App\Http\Controllers\Admin\LogController')->create_log(auth()->user()->name, $device->name, $validate['status'], 'create');
            return redirect(route('dashboard.device.index'))->with('success', 'Device Berhasil ditambahkan');
        } catch (QueryException $e) {
            return redirect()->back()->with('danger', $e->errorInfo);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('dashboard.device.show', [
            'device' => Device::where('id', $id)->get()
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('dashboard.device.edit', [
            'device' => Device::where('id', $id)->get()[0]
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validate = $request->validate([
            'name' => ['required', 'max:255'],
            'description' => ['required', 'max:255'],
            'status' => 'required'
        ]);

        try {
            Device::where('id', $id)->update($validate);
            app('App\Http\Controllers\Admin\LogController')->create_log(auth()->user()->name, $validate['name'], $validate['status'], 'update');
            return redirect(route('dashboard.device.index'))->with('success', 'Device Berhasil diedit');
        } catch (QueryException $e) {
            return redirect()->back()->with('danger', $e->errorInfo);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $device = Device::where('id', $id);
            $deviceName = $device->get()[0]->name;
            $device->delete();
            app('App\Http\Controllers\Admin\LogController')->create_log(auth()->user()->name, $deviceName, 'deactive', 'delete');
            return redirect(route('dashboard.device.index'))->with('success', 'Device Berhasil dihapus');
        } catch (QueryException $e) {
            return redirect()->back()->with('danger', $e->errorInfo);
        }
    }
}
