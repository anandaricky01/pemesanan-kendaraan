<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Kendaraan;
use App\Models\RiwayatPemesanan;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class KendaraanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $kendaraan = Kendaraan::latest()->filter($request->only('search'))->paginate(7)->withQueryString();

        return view('dashboard.kendaraan.index', [
            'kendaraan' => $kendaraan,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.kendaraan.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'merk' => 'required',
            'plat' => ['required', 'unique:kendaraans,plat'],
        ]);

        $validated['status'] = 'active';

        try {
            $kendaraan = Kendaraan::create($validated);

            return redirect()->route('dashboard.kendaraan.index')->with('success', 'Kendaraan dengan plat nomor ' . $kendaraan->plat . ' sukses ditambahkan!');
        } catch (QueryException $e) {
            return redirect()->back()->with('danger', $e->errorInfo);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Kendaraan  $kendaraan
     * @return \Illuminate\Http\Response
     */
    public function show(Kendaraan $kendaraan)
    {
        $jumlah_bbm = RiwayatPemesanan::where('kendaraan', $kendaraan->plat);
        // dd($jumlah_bbm);
        return view('dashboard.kendaraan.show', [
            'kendaraan' => $kendaraan,
            'jumlah_bbm' => $jumlah_bbm,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Kendaraan  $kendaraan
     * @return \Illuminate\Http\Response
     */
    public function edit(Kendaraan $kendaraan)
    {
        return view('dashboard.kendaraan.edit', [
            'kendaraan' => $kendaraan,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Kendaraan  $kendaraan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Kendaraan $kendaraan)
    {
        $validated = $request->validate([
            'plat' => 'required',
            'merk' => 'required',
        ]);

        if($request->plat != $kendaraan->plat){
            if(Kendaraan::where('plat', $request->plat)->where('id', $kendaraan->id)->count() > 0){
                return redirect()->back()->with('danger', 'Plat sudah terdaftar pada kendaraan lain!');
            }
        }

        try {
            $kendaraan->update($validated);

            return redirect()->route('dashboard.kendaraan.index')->with('success', 'Kendaraan dengan nomor plat ' . $kendaraan->plat . ' berhasil diedit!');
        } catch (QueryException $e) {
            return redirect()->back()->with('danger', $e->errorInfo);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Kendaraan  $kendaraan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Kendaraan $kendaraan)
    {
        $data_lama = $kendaraan;
        try {
            $kendaraan->delete();
            return redirect(route('dashboard.kendaraan.index'))->with('success', 'Kendaraan dengan plat ' . $data_lama->plat . ' berhasil dihapus');
        } catch (QueryException $e) {
            return redirect()->back()->with('danger', $e->errorInfo);
        }
    }
}
