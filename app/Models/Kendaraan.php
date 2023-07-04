<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kendaraan extends Model
{
    use HasFactory;

    protected $fillable = [
        'plat',
        'merk',
        'status',
    ];

    public function scopeFilter($query, array $searchTerm)
    {
        $query->when($searchTerm['search'] ?? false, function ($query, $searchTerm) {
            $query->where(function ($query) use ($searchTerm) {
                $query->where('plat', 'like', '%' . $searchTerm . '%')
                    ->orWhere('merk', 'like', '%' . $searchTerm . '%');
            });
        });
    }

    public function service(){
        return $this->hasOne(Service::class);
    }

    public function pemesanan(){
        return $this->hasOne(Pemesanan::class);
    }
}
