<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Provider extends Model
{
    protected $fillable = [
        'ruc',
        'telefono',
        'provincia',
        'direccion',
        'sitio_web',
        'industria',
        'observaciones',
        'razon_social',
        'celular',
        'ciudad',
        'geolocalizacion',
        'email_retenciones',
        'nombre_comercial',
        'certificado_ruc',
        'check_politica_tratamiento_datos'
    ];
}
