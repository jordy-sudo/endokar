<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProviderLaboral extends Model
{
    protected $fillable = [
        'vendedor',
        'vendedor_reemplazo',
        'email_ventas',
        'horario_atencion',
        'telefono_vendedor',
        'extension',
        'celular',
    ];

    // Relación con el proveedor
    public function provider()
    {
        return $this->belongsTo(Provider::class);
    }
}
