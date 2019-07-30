<?php

use Illuminate\Database\Seeder;
use App\Article;

class ArticlesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('articles')->delete();
        $json = File::get('database/seedData/articles.json');
        $data = json_decode($json);

        foreach ($data as $article) {
            Article::create(array(
                'id' => $article->id,
                'user_id' => $article->user_id,
                'article_title' => $article->article_title,
                'article_text' => $article->article_text,
                'article_image' => $article->article_image,
                'created_at' => $article->created_at,
                'updated_at' => $article->updated_at,
            ));
        }
    }
}
