<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DestinasiLog extends Model
{
    use HasFactory;

    protected $fillable = [
        'action',
        'destinasi_id',
        'user_name',
        'alamat',
        'deskripsi',
    ];
    /*
        $table->string('action');
            $table->unsignedBigInteger('destinasi_id');
            $table->string('user_name');
            $table->string('destinasi');
            $table->string('alamat');
            $table->string('deskripsi');
    */
}
