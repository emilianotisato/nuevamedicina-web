<?php

use App\ArticleCategory;
use Illuminate\Database\Seeder;

class ArticleCategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ArticleCategory::create(['name'  =>  'Tecnología Médica', 'order' => 10]);
        ArticleCategory::create(['name'  =>  'Terapias complementarias', 'order' => 20]);
        ArticleCategory::create(['name'  =>  'Plantas y Suplementos', 'order' => 30]);
        ArticleCategory::create(['name'  =>  'Lideres de la Medicina', 'order' => 40]);
    }
}
