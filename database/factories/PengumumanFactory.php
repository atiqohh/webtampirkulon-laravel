<?php

namespace Database\Factories;

use App\Models\Pengumuman;
use Illuminate\Database\Eloquent\Factories\Factory;

class PengumumanFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Pengumuman::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'judul' => $this->faker->sentence(mt_rand(5, 10)),
            'slug' => $this->faker->slug(),
            'excerpt' => $this->faker->paragraph(),
            'body' => $this->faker->paragraph(mt_rand(5, 10)),
        ];
    }
}
