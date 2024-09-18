<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Testimonial;
use App\Models\topic;

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
        Category::factory(5)->create();
        topic::factory(10)->create();
        Testimonial::factory(10)->create();
       
    }
}
