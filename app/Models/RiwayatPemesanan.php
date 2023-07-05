<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RiwayatPemesanan extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_name',
        'kendaraan',
        'destinasi',
        'tanggal',
        'bbm',
    ];

    /*
        $table->string('user_name');
            $table->string('kendaraan');
            $table->string('destinasi');
            $table->date('tanggal');
            $table->float('bbm');
    */
}
