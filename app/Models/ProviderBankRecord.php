<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProviderBankRecord extends Model
{
    protected $fillable = [
        'provider_id',
        'banco',
        'tipo_cuenta',
        'numero_cuenta_bancaria',
        'certificado_bancario',
    ];

    // Relación con el modelo Provider
    public function provider()
    {
        return $this->belongsTo(Provider::class);
    }
}
