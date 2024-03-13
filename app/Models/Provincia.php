<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Provincia extends Model
{
    protected $fillable = ['nombre'];

    // Relación uno a muchos con Ciudades
    public function ciudades()
    {
        return $this->hasMany(Ciudad::class);
    }
}
