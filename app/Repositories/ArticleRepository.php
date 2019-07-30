<?php
namespace App\Repositories;

use App\Repositories\Contracts\RepositoryContract;
use App\Services\CacheService;
use App\Article;

class ArticleRepository implements RepositoryContract {

    protected $cache;

    /**
     * ArticleRepository constructor.
     *
     * @param CacheService $cache
     */
    public function __construct(CacheService $cache)
    {
        $this->cache = $cache;
    }
    /**
     * Fetches an article by it's ID
     *
     * @param int
     * @return collection
     */
    public function get($article_id)
    {
        $article = $this->cache->getEntity('article', $article_id);
        if (!$article) {
            $article = Article::find($article_id);
            $cacheSetResult = $this->cache->setEntity('article', $article_id, $article);
            $result['cache_hit'] = false;
            $result['article'] = $article;
            return $result;
        }
        else {
            $result['cache_hit'] = true;
            $result['article'] = json_decode($article);
            return $result;
        }
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
        return Article::destroy($article_id);
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
        $updatedPost = Article::find($article_id);
        $this->cache->setEntity('article', $article_id, $updatedPost);
        return $updatedPost;
    }
}