<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pemesanan extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'kendaraan_id',
        'destinasi_id',
        'status',
        'tanggal',
        'bbm',
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function kendaraan(){
        return $this->belongsTo(Kendaraan::class);
    }

    public function destinasi(){
        return $this->belongsTo(Destinasi::class);
    }
}
