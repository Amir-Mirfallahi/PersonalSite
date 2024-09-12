<?php

namespace Database\Seeders;

use App\Models\AboutImage;
use App\Models\AvailableAt;
use App\Models\Category;
use App\Models\Post;
use App\Models\Project;
use App\Models\Testimonial;
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
//        User::factory(10)->create();
//
//        User::factory()->create([
//            'name' => 'Amir Mirfallahi',
//            'email' => 'mirfallahi2009@gmail.com',
//            'password' => "Amir1388"
//        ]);

        Category::factory()->count(10)->create();
        Post::factory()->count(5)->create();
        Testimonial::factory()->count(15)->create();
        Project::factory()->count(10)->create();
        AvailableAt::factory()->count(1)->create();
    }
}
