<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ArtikelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Artikel::factory(15)->create();
    }
}
