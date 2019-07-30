<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Repositories\Contracts\RepositoryContract;
use App\Respositories\ArticleRepository;

class ArticleController extends Controller
{

    protected $article;

    /**
     * ArticleController constructor.
     *
     * @param ArticleRepository $article
     */
    public function __construct(ArticleRepository $article)
    {
        $this->article = $article;
    }

    /**
     * List all articles.
     *
     * @return mixed
     */
    public function index()
    {
        $data = [
            'articles' => $this->article->all()
        ];
        return $data;
        //return view('templates.articles', $data);
    }

    /**
     * Fetch article by its Id
     * 
     * @return article
     */
    public function fetchArticle($article_id) {
        $data = $this->article->get($article_id);
        return $data;
        //return view('articleDetails', $data);
    }

    /**
     * Update article by its Id
     * 
     * @return update result
     */
    public function updateArticle($article_id, $article_data) {
        $result = $this->article->update($article_id, $article_data);
        return $result;
        //return view('articleDetails', $result);
    }

    /**
     * Update article by its Id
     * 
     * @return delete result
     */
    public function deleteArticle($article_id) {
        $result = $this->article->delete($article_id);
        return $result;
        //return view('deleteDetails', $result);
    }
}