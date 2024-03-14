<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bank extends Model
{
    protected $fillable = [
        'name', 'code',
    ];

    // Relación uno a muchos inversa con UserBankRecord
    public function userBankRecords()
    {
        return $this->hasMany(UserBankRecord::class);
    }
}
