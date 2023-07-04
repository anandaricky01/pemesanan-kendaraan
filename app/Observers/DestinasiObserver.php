<?php

namespace App\Observers;

use App\Models\Destinasi;
use App\Models\DestinasiLog;

class DestinasiObserver
{
    /**
     * Handle the Destinasi "created" event.
     *
     * @param  \App\Models\Destinasi  $destinasi
     * @return void
     */
    public function created(Destinasi $destinasi)
    {
        $this->logChanges('created', $destinasi);
    }

    /**
     * Handle the Destinasi "updated" event.
     *
     * @param  \App\Models\Destinasi  $destinasi
     * @return void
     */
    public function updated(Destinasi $destinasi)
    {
        $this->logChanges('update', $destinasi);
    }

    /**
     * Handle the Destinasi "deleted" event.
     *
     * @param  \App\Models\Destinasi  $destinasi
     * @return void
     */
    public function deleted(Destinasi $destinasi)
    {
        $this->logChanges('deleted', $destinasi);
    }

    /**
     * Handle the Destinasi "restored" event.
     *
     * @param  \App\Models\Destinasi  $destinasi
     * @return void
     */
    public function restored(Destinasi $destinasi)
    {
        //
    }

    /**
     * Handle the Destinasi "force deleted" event.
     *
     * @param  \App\Models\Destinasi  $destinasi
     * @return void
     */
    public function forceDeleted(Destinasi $destinasi)
    {
        //
    }

    private function logChanges($action, Destinasi $destinasi)
    {
        $log = new DestinasiLog();
        $log->action = $action;
        $log->user_name = auth()->user()->name ?? 'Tinker';
        $log->destinasi_id = $destinasi->id;
        $log->destinasi = $destinasi->destinasi;
        $log->alamat = $destinasi->alamat;
        $log->deskripsi = $destinasi->deskripsi;
        $log->save();

        $logMessage = "Data Destinasi {$destinasi->destinasi} {$action}";
        file_put_contents(storage_path('logs/destinasi.log'), $logMessage . PHP_EOL, FILE_APPEND);
    }
}
