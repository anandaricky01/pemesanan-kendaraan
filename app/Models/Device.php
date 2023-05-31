<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Device extends Model
{
    protected $fillable = ['name', 'description', 'status'];
    use HasFactory;

    public function scopeFilter($query, array $searchTerm)
    {
        $query->when($searchTerm['search'] ?? false, function ($query, $searchTerm) {
            $query->where(function ($query) use ($searchTerm) {
                $query->where('name', 'like', '%' . $searchTerm . '%');
            });
        });
    }

    public function sensor(){
        return $this->hasMany(Sensor::class);
    }

    public function log(){
        return $this->hasMany(Log::class);
    }
}
