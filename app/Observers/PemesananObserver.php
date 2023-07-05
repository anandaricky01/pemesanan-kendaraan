<?php

namespace App\Observers;

use App\Models\Pemesanan;
use App\Models\Kendaraan;
use App\Models\User;
use App\Models\Destinasi;
use App\Models\RiwayatPemesanan;

class PemesananObserver
{
    /**
     * Handle the Pemesanan "created" event.
     *
     * @param  \App\Models\Pemesanan  $pemesanan
     * @return void
     */
    public function created(Pemesanan $pemesanan)
    {
        //
    }

    /**
     * Handle the Pemesanan "updated" event.
     *
     * @param  \App\Models\Pemesanan  $pemesanan
     * @return void
     */
    public function updated(Pemesanan $pemesanan)
    {
        if($pemesanan->status == 'accept'){
            $riwayatPemesanan = new RiwayatPemesanan();
            $riwayatPemesanan->user_name = User::where('id', $pemesanan->user_id)->get()[0]->name;
            $riwayatPemesanan->kendaraan = Kendaraan::where('id', $pemesanan->kendaraan_id)->get()[0]->plat;
            $riwayatPemesanan->destinasi = Destinasi::where('id', $pemesanan->destinasi_id)->get()[0]->destinasi;
            $riwayatPemesanan->bbm = $pemesanan->bbm;
            $riwayatPemesanan->tanggal = $pemesanan->tanggal;
            $riwayatPemesanan->save();
        }
    }

    /**
     * Handle the Pemesanan "deleted" event.
     *
     * @param  \App\Models\Pemesanan  $pemesanan
     * @return void
     */
    public function deleted(Pemesanan $pemesanan)
    {
        //
    }

    /**
     * Handle the Pemesanan "restored" event.
     *
     * @param  \App\Models\Pemesanan  $pemesanan
     * @return void
     */
    public function restored(Pemesanan $pemesanan)
    {
        //
    }

    /**
     * Handle the Pemesanan "force deleted" event.
     *
     * @param  \App\Models\Pemesanan  $pemesanan
     * @return void
     */
    public function forceDeleted(Pemesanan $pemesanan)
    {
        //
    }
}
