<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

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

        $viewPostsPermission = Permission::create(['name' => 'View posts']);
        $createPostsPermission = Permission::create(['name' => 'Create posts']);
        $updatePostsPermission = Permission::create(['name' => 'Update posts']);
        $deletePostsPermission = Permission::create(['name' => 'Delete posts']);

        $roleAdmin = Role::create(['name' => 'Admin']);
        $roleWriter = Role::create(['name' => 'Writer']);

        $admin = User::factory()->create([
            'name' => 'admin',
            'email' => 'admin@admin.com',
            'password' => bcrypt('123123'),
        ]);
        $admin->assignRole($roleAdmin);

        $writer = User::factory()->create([
            'name' => 'writer',
            'email' => 'writer@writer.com',
            'password' => bcrypt('123123'),
        ]);
        $writer->assignRole($roleWriter);

        Category::factory()->count(3)->create();
        Post::factory()->count(5)->create();
        Tag::factory()->count(4)->create();
    }
}
