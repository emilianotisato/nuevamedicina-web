<?php

use App\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        app()['cache']->forget('spatie.permission.cache');

        // Create roles
        $admin = Role::create(['name' => 'admin']);
        $manager = Role::create(['name' => 'manager']);
        $blog_editor = Role::create(['name' => 'blog_editor']);
        $marketing = Role::create(['name' => 'marketing']);

        // Create permissions
        $crudUsers = Permission::create(['name' => 'crudUsers']);
        $accessReports = Permission::create(['name' => 'accessReports']);
        $crudArticles = Permission::create(['name' => 'crudArticles']);
        $crudSliders = Permission::create(['name' => 'crudSliders']);
        $crudAds = Permission::create(['name' => 'crudAds']);
        $crudnewsletters = Permission::create(['name' => 'crudnewsletters']);


        // Attach permissions to roles
        $admin->givePermissionTo([$crudUsers, $accessReports, $crudArticles, $crudSliders, $crudAds, $crudnewsletters]);
        $manager->givePermissionTo([$accessReports,  $crudArticles, $crudSliders, $crudAds, $crudnewsletters]);
        $blog_editor->givePermissionTo([$crudArticles]);
        $marketing->givePermissionTo([$crudAds, $crudnewsletters]);

        $administrator = User::create([
            'name'  =>  'Emiliano',
            'email' =>  'emiliano@thormaweb.com',
            'password'  =>  Hash::make('pass'),
        ]);
        $administrator->assignRole($admin);
    }
}
