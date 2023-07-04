<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    protected $fillable = [
        'kendaraan_id',
        'tanggal',
        'detail',
        'status',
    ];

    public function kendaraan(){
        return $this->belongsTo(Kendaraan::class);
    }
}
