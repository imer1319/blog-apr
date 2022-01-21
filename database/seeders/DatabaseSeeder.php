<?php

namespace Database\Seeders;

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
         \App\Models\User::factory()->create([
             'name' => 'Imer Mamani',
             'email' => 'imer@imer.com',
             'password' => bcrypt('123123'),
         ]);
         \App\Models\Category::factory()->count(7)->create();
         \App\Models\Post::factory()->count(30)->create();
         \App\Models\Tag::factory()->count(10)->create();
    }
}
