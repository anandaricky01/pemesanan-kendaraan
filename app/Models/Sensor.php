<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sensor extends Model
{
    protected $fillable = ['device_id', 'data'];

    use HasFactory;

    public function device(){
        return $this->belongsTo(Device::class);
    }
}
