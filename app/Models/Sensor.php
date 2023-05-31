<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sensor extends Model
{
    protected $fillable = ['device_id', 'data'];

    use HasFactory;

    public function scopeFilter($query, array $searchTerm)
    {
        $query->when($searchTerm['startDate'] ?? false, function ($query, $startDate) {
            $query->whereDate('created_at', '>=', \Carbon\Carbon::createFromFormat('m/d/Y', $startDate)->format('Y-m-d'));
        })
        ->when($searchTerm['endDate'] ?? false, function ($query, $endDate) {
            $query->whereDate('created_at', '<=', \Carbon\Carbon::createFromFormat('m/d/Y', $endDate)->format('Y-m-d'));
        });
    }

    public function device(){
        return $this->belongsTo(Device::class);
    }
}
