<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Destinasi;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class DestinasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $destinasi = Destinasi::latest()->filter($request->only('search'))->paginate(7)->withQueryString();

        return view('dashboard.destinasi.index', [
            'destinasi' => $destinasi,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.destinasi.create');
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
            'destinasi' => ['required', 'unique:destinasis,destinasi'],
            'alamat' => 'required',
            'deskripsi' => 'required',
        ]);

        try {
            $destinasi = Destinasi::create($validated);

            return redirect()->route('dashboard.destinasi.index')->with('success', 'Destinasi dengan nama ' . $destinasi->destinasi . ' telah dibuat!');
        } catch (QueryException $e) {
            return redirect()->back()->with('danger', $e->errorInfo);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Destinasi  $destinasi
     * @return \Illuminate\Http\Response
     */
    public function show(Destinasi $destinasi)
    {
        return view('dashboard.destinasi.show', [
            'destinasi' => $destinasi,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Destinasi  $destinasi
     * @return \Illuminate\Http\Response
     */
    public function edit(Destinasi $destinasi)
    {
        return view('dashboard.destinasi.edit', [
            'destinasi' => $destinasi,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Destinasi  $destinasi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Destinasi $destinasi)
    {
        $validated = $request->validate([
            'destinasi' => 'required',
            'alamat' => 'required',
            'deskripsi' => 'required',
        ]);

        if($request->destinasi != $destinasi->destinasi){
            if(Destinasi::where('destinasi', $request->destinasi)->where('id', '!=', $destinasi->id)->count() > 0){
                return redirect()->back()->with('danger', 'Nama destinasi sudah dipakai! Silahkan input nama destinasi lain!');
            }
        }

        try {
            $destinasi->update($validated);

            return redirect()->route('dashboard.destinasi.index')->with('success', 'Destinasi bernama ' . $destinasi->destinasi . ' berhasil diedit!');
        } catch (QueryException $e) {
            return redirect()->back()->with('danger', $e->errorInfo);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Destinasi  $destinasi
     * @return \Illuminate\Http\Response
     */
    public function destroy(Destinasi $destinasi)
    {
        $data_lama = $destinasi;
        try {
            $destinasi->delete();

            return redirect()->route('dashboard.destinasi.index')->with('success', 'Data destinasi bernama ' . $data_lama->destinasi . ' telah berhasil dihapus');
        } catch (QueryException $e) {
            return redirect()->back()->with('danger', $e->errorInfo);
        }
    }
}
