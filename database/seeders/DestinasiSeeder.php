<?php

namespace Database\Seeders;

use App\Models\Destinasi;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DestinasiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Destinasi::factory(10)->create();
    }
}
