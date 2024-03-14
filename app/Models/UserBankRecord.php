<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserBankRecord extends Model
{
    protected $fillable = [
        'user_id', 'bank_id', 'account_number', 'account_type', 'document_path',
    ];

    // Relación uno a uno inversa con User
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relación uno a uno inversa con Bank
    public function bank()
    {
        return $this->belongsTo(Bank::class);
    }
}
