<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Destinasi extends Model
{
    use HasFactory;

    protected $fillable = [
        'destinasi',
        'alamat',
        'deskripsi',
    ];

    public function scopeFilter($query, array $searchTerm)
    {
        $query->when($searchTerm['search'] ?? false, function ($query, $searchTerm) {
            $query->where(function ($query) use ($searchTerm) {
                $query->where('destinasi', 'like', '%' . $searchTerm . '%')
                    ->orWhere('alamat', 'like', '%' . $searchTerm . '%');
            });
        });
    }
}
