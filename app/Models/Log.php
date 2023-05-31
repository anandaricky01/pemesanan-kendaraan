<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Log extends Model
{
    protected $fillable = ['device', 'user', 'status', 'activity'];

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

    public function user(){
        return $this->belongsTo(User::class);
    }
}
