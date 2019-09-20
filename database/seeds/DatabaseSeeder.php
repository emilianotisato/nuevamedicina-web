<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersSeeder::class);
        $this->call(ArticleCategoriesTableSeeder::class);
        $this->call(ArticlesTableSeeder::class);
        $this->call(SlidesSeeder::class);

    }
}
