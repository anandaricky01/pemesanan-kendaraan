<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Database\QueryException;
use App\Models\Pemesanan;
use App\Models\Kendaraan;
use App\Models\Destinasi;
use App\Models\User;
use Illuminate\Http\Request;

class PemesananController extends Controller
{
    public function index(){
        $pemesanan = Pemesanan::latest()->paginate(7)->withQueryString();
        return view('dashboard.pemesanan.index', [
            'pemesanan' => $pemesanan,
        ]);
    }

    // halaman pemesanan admin
    public function pemesanan(){
        $user = User::where('role', 'pengelola')->get();
        $kendaraan = Kendaraan::where('status', 'active')->get();
        $destinasi = Destinasi::all();

        return view('dashboard.pemesanan.pemesanan', [
            'user' => $user,
            'kendaraan' => $kendaraan,
            'destinasi' => $destinasi,
        ]);
    }

    // halaman pool pengelola
    public function persetujuan(){
        $pemesanan = Pemesanan::latest()->paginate()->withQueryString();

        return view('dashboard.pemesanan.persetujuan', [
            'pemesanan' => $pemesanan,
        ]);
    }

    public function detail_pemesanan($id){
        try {
            $pemesanan = Pemesanan::where('id', $id)->first();

            return view('dashboard.pemesanan.detail_pemesanan', [
                'pemesanan' => $pemesanan,
            ]);
        } catch (QueryException $e) {
            return redirect()->back()->with('danger', $e->errorInfo);
        }
    }

    public function detail_persetujuan($id){
        try {
            $pemesanan = Pemesanan::where('id', $id)->where('user_id', auth()->user()->id)->first();

            return view('dashboard.pemesanan.detail_persetujuan', [
                'pemesanan' => $pemesanan,
            ]);
        } catch (QueryException $e) {
            return redirect()->back()->with('danger', $e->errorInfo);
        }
    }

    public function pemesananPost(Request $request){
        $validated = $request->validate([
            'destinasi_id' => 'required',
            'user_id' => 'required',
            'kendaraan_id' => 'required',
            'bbm' => 'required',
            'tanggal' => 'required'
        ]);
        $validated['status'] = 'pending';

        try {
            Pemesanan::create($validated);

            return redirect()->route('dashboard.pemesanan.index')->with('success', 'Pemesanan telah berhasil dilakukan! Silahkan tunggu proses pengajuan');
        } catch (QueryException $e) {
            return redirect()->back()->with('danger', $e->errorInfo);
        }
    }

    public function setujui($id){
        $pemesanan = Pemesanan::where('id', $id)->first();
        $kendaraan = Kendaraan::where('id', $pemesanan->kendaraan_id)->first();
        $pemesanan->update(['status' => 'accept']);
        $kendaraan->update(['status' => 'expedition']);
        return redirect()->route('dashboard.pemesanan.persetujuan')->with('success', 'Pemesanan berhasil disetujui');
    }

    public function tolak($id){
        $pemesanan = Pemesanan::where('id', $id)->first();
        $pemesanan->update(['status' => 'decline']);
        return redirect()->route('dashboard.pemesanan.persetujuan')->with('success', 'Pemesanan berhasil ditolak');
    }

    public function kembali($id){
        $pemesanan = Pemesanan::where('id', $id)->first();
        $kendaraan = Kendaraan::where('id', $pemesanan->kendaraan_id)->first();
        $pemesanan->delete();
        $kendaraan->update(['status' => 'active']);
        return redirect()->route('dashboard.pemesanan.index')->with('success', 'Kendaraan Kembali');
    }

    public function delete($id){
        $pemesanan = Pemesanan::where('id', $id)->first();
        $pemesanan->delete();
        return redirect()->route('dashboard.pemesanan.index')->with('success', 'Kendaraan Kembali');
    }
}
