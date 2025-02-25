<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Accesslevel;

class AccessLevelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        AccessLevel::create(['name' => 'admin']);
        AccessLevel::create(['name' => 'cliente']);
    }
}
