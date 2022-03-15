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

        $viewPostsPermission = Permission::create(['name' => 'View posts', 'display_name' => 'Ver pubicaciones']);
        $createPostsPermission = Permission::create(['name' => 'Create posts', 'display_name' => 'Crear pubicaciones']);
        $updatePostsPermission = Permission::create(['name' => 'Update posts', 'display_name' => 'Actualizar pubicaciones']);
        $deletePostsPermission = Permission::create(['name' => 'Delete posts', 'display_name' => 'Eliminar pubicaciones']);

        $viewUsersPermission = Permission::create(['name' => 'View users', 'display_name' => 'Ver usuarios']);
        $createUsersPermission = Permission::create(['name' => 'Create users', 'display_name' => 'Crear usuarios']);
        $updateUsersPermission = Permission::create(['name' => 'Update users', 'display_name' => 'Actualizar usuarios']);
        $deleteUsersPermission = Permission::create(['name' => 'Delete users', 'display_name' => 'Eliminar usuarios']);

        $viewRolesPermission = Permission::create(['name' => 'View roles', 'display_name' => 'Ver roles']);
        $createRolesPermission = Permission::create(['name' => 'Create roles', 'display_name' => 'Crear roles']);
        $updateRolesPermission = Permission::create(['name' => 'Update roles', 'display_name' => 'Actualizar roles']);
        $deleteRolesPermission = Permission::create(['name' => 'Delete roles', 'display_name' => 'Eliminar roles']);

        $viewPermissionsPermission = Permission::create(['name' => 'View permissions', 'display_name' => 'Ver permisos']);
        $updatePermissionsPermission = Permission::create(['name' => 'Update permissions', 'display_name' => 'Actualizar permisos']);

        $roleAdmin = Role::create(['name' => 'Admin', 'display_name' => 'Administrador']);
        $roleWriter = Role::create(['name' => 'Writer', 'display_name' => 'Escritor']);

        $admin = User::factory()->create([
            'name' => 'admin',
            'email' => 'admin@admin.com',
            'password' => '123123',
        ]);
        $admin->assignRole($roleAdmin);

        $writer = User::factory()->create([
            'name' => 'writer',
            'email' => 'writer@writer.com',
            'password' => '123123',
        ]);
        $writer->assignRole($roleWriter);

        Category::factory()->count(3)->create();
        Post::factory()->count(5)->create();
        Tag::factory()->count(4)->create();
    }
}
