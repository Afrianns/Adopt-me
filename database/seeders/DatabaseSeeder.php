<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Library;
use App\Models\User;
use GuzzleHttp\Promise\Create;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        User::factory(4)->create();

        Library::factory(20)->create();


        Category::create([
            "name" => "Cat",
            "slug" => "cat"
        ]);

        Category::create([
            "name" => "Dog",
            "slug" => "dog"
        ]);

        Category::create([
            "name" => "Bird",
            "slug" => "bird"
        ]);
    }
}
