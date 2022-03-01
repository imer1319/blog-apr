<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Storage::disk('public')->deleteDirectory('posts');
         \App\Models\User::factory()->create([
             'name' => 'Imer Mamani',
             'email' => 'imer@imer.com',
             'password' => bcrypt('123123'),
         ]);
         \App\Models\Category::factory()->count(3)->create();
         \App\Models\Post::factory()->count(5)->create();
         \App\Models\Tag::factory()->count(4)->create();
    }
}
