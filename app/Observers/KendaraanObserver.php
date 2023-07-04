<?php

namespace App\Observers;

use App\Models\Kendaraan;
use App\Models\KendaraanLog;

class KendaraanObserver
{
    /**
     * Handle the Kendaraan "created" event.
     *
     * @param  \App\Models\Kendaraan  $kendaraan
     * @return void
     */
    public function created(Kendaraan $kendaraan)
    {
        // Pencatatan perubahan saat data Kendaraan dibuat
        $this->logChanges('created', $kendaraan);
    }

    /**
     * Handle the Kendaraan "updated" event.
     *
     * @param  \App\Models\Kendaraan  $kendaraan
     * @return void
     */
    public function updated(Kendaraan $kendaraan)
    {
        // Pencatatan perubahan saat data Kendaraan diperbarui
        $this->logChanges('updated', $kendaraan);
    }

    /**
     * Handle the Kendaraan "deleted" event.
     *
     * @param  \App\Models\Kendaraan  $kendaraan
     * @return void
     */
    public function deleted(Kendaraan $kendaraan)
    {
        // Pencatatan perubahan saat data Kendaraan dihapus
        $this->logChanges('deleted', $kendaraan);
    }

    /**
     * Log the changes made to the Kendaraan.
     *
     * @param  string  $action
     * @param  \App\Models\Kendaraan  $kendaraan
     * @return void
     */
    private function logChanges($action, Kendaraan $kendaraan)
    {
        // Lakukan pencatatan perubahan ke log atau tempat penyimpanan lainnya
        // Anda dapat mengakses atribut-atribut Kendaraan seperti $kendaraan->plat, $kendaraan->merk, $kendaraan->status, dll.
        // Misalnya, simpan perubahan ke log file:

        $log = new KendaraanLog();
        $log->action = $action;
        $log->kendaraan_id = $kendaraan->id;
        $log->user_name = auth()->user()->name ?? 'Tinker';
        $log->kendaraan_id = $kendaraan->id;
        $log->plat = $kendaraan->plat;
        $log->merk = $kendaraan->merk;
        $log->status = $kendaraan->status;
        $log->save();

        $logMessage = "Data Kendaraan {$kendaraan->plat} {$action}";
        file_put_contents(storage_path('logs/kendaraan.log'), $logMessage . PHP_EOL, FILE_APPEND);
    }
}
