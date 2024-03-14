<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ElementoIndustrial extends Model
{
    use HasFactory;

    protected $fillable = ['nombre', 'subcategoria_id'];

    public function subcategoria()
    {
        return $this->belongsTo(SubcategoriaIndustrial::class, 'subcategoria_id');
    }
}