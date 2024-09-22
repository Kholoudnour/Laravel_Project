<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Testimonial;
use App\Models\topic;
use App\Models\Messages;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Category::factory(5)->create();
        // topic::factory(5)->create();
        // Testimonial::factory(5)->create();
        Messages::factory(5)->create();

    }
}
