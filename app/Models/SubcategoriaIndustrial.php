<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubcategoriaIndustrial extends Model
{
    use HasFactory;

    protected $fillable = ['nombre'];

    public function categoria()
    {
        return $this->belongsTo(CategoriaIndustrial::class);
    }

    public function elementos()
    {
        return $this->hasMany(ElementoIndustrial::class);
    }
}