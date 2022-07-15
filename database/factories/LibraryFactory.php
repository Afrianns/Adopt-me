<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class LibraryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $title = $this->faker->sentence(2);
        $slug = Str::slug($title);

        return [
            "title" => $title,
            "slug" => $slug,
            "description" => $this->faker->paragraph(mt_rand(2, 4)),
            "category_id" => mt_rand(1, 3),
            "user_id" => mt_rand(1, 4)
        ];
    }
}
