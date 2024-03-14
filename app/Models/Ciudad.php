<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ciudad extends Model
{
    use HasFactory;
    protected $table = 'ciudad_table';
    protected $fillable = ['nombre'];

    // Relación muchos a uno con Provincia
    public function provincia()
    {
        return $this->belongsTo(Provincia::class);
    }
}