<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class PemanduSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Pemandu::factory(20)->create();
    }
}
