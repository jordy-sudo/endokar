<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Bank;

class BankSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $banks = [
            ['name' => 'Banco del Pacífico', 'code' => '10'],
            ['name' => 'Banco de Guayaquil', 'code' => '20'],
            ['name' => 'Banco Pichincha', 'code' => '28'],
            ['name' => 'Banco Internacional', 'code' => '30'],
            ['name' => 'Banco de Machala', 'code' => '32'],
            ['name' => 'Produbanco', 'code' => '34'],
            ['name' => 'Banco Bolivariano', 'code' => '36'],
            ['name' => 'Banco de Loja', 'code' => '40'],
            ['name' => 'Banco de Fomento', 'code' => '42'],
            ['name' => 'Banco del Austro', 'code' => '45'],
            ['name' => 'Banco General Rumiñahui', 'code' => '47'],
            ['name' => 'Banco Solidario', 'code' => '48'],
            ['name' => 'Banco de la Producción', 'code' => '60'],
            ['name' => 'Banco de la Amazonia', 'code' => '66'],
        ];

        foreach ($banks as $bank) {
            Bank::create($bank);
        }
    }
}
