<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubcategoriaIndustrial extends Model
{
    use HasFactory;

    protected $fillable = ['nombre', 'categoria_id'];

    public function categoria()
    {
        return $this->belongsTo(CategoriaIndustrial::class, 'categoria_id');
    }

    public function elementos()
    {
        return $this->hasMany(ElementoIndustrial::class, 'subcategoria_id');
    }
}