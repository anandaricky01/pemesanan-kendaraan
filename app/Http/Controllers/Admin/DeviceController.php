<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Admin\LogController;
use App\Models\Device;
use App\Models\Sensor;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

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

    public function index()
    {
        $devices = Device::latest()->paginate(5)->withQueryString();
        return view('dashboard.device.index', [
            'devices' => $devices
        ]);
    }

    public function sensor(){
        $sensors = Sensor::latest()->paginate(10)->withQueryString();
        return view('dashboard.device.sensor', [
            'sensors' => $sensors
        ]);
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
