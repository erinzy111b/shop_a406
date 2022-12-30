<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Article;
use App\Models\ArticleTag;

class ArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ArticleTag::truncate();
        Article::truncate();
        Article::factory()->count(10)->create();
    }
}
