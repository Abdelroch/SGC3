<?php

namespace Database\Seeders;

use App\Models\Visitante;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class VisitanteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $visitantes = Visitante::create([
            'name' => 'Unknow',
        ]);
    }
}
