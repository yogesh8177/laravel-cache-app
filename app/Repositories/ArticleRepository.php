<?php
namespace App\Repositories;

use App\Repositories\Contracts\RepositoryContract;
use App\Article;

class ArticleRepository implements RepositoryContract {
    /**
     * Fetch an article by it's ID
     *
     * @param int
     * @return collection
     */
    public function get($article_id)
    {
        return Article::find($article_id);
    }

    /**
     * Fetches all articles.
     *
     * @return mixed
     */
    public function all()
    {
        return Article::all();
    }

    /**
     * Deletes an article.
     *
     * @param int
     */
    public function delete($article_id)
    {
        Article::destroy($article_id);
    }

    /**
     * Updates an article.
     *
     * @param int
     * @param array
     */
    public function update($article_id, array $article_data)
    {
        Article::find($article_id)->update($article_data);
    }
}