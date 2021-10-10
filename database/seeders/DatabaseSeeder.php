<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Artikel;
use App\Models\Pengumuman;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::factory(5)->create();
        Artikel::factory(20)->create();
        Pengumuman::factory(10)->create();
    }
}
