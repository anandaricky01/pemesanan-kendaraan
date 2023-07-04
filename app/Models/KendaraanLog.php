<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KendaraanLog extends Model
{
    use HasFactory;

    protected $table = 'kendaraan_logs';

    protected $fillable = [
        'action',
        'kendaraan_id',
        'user_name',
        'plat',
        'merk',
        'status',
    ];

    /*
        $table->string('action');
            $table->unsignedBigInteger('kendaraan_id');
            $table->string('plat');
            $table->string('merk');
            $table->string('status');
    */
}
