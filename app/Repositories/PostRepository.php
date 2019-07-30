<?php
namespace App\Repositories;

use App\Repositories\Contracts\RepositoryContract;
use App\Services\CacheService;
use App\Post;

class PostRepository implements RepositoryContract {

    protected $cache;

    /**
     * PostRepository constructor.
     *
     * @param CacheService $cache
     */
    public function __construct(CacheService $cache)
    {
        $this->cache = $cache;
    }
    /**
     * Fetches an post by it's ID
     *
     * @param int
     * @return collection
     */
    public function get($post_id)
    {
        $post = $this->cache->getEntity('post', $post_id);
        if (!$post) {
            $post = Post::find($post_id);
            $cacheSetResult = $this->cache->setEntity('post', $post_id, $post);
            $result['cache_hit'] = false;
            $result['post'] = $post;
            return $result;
        }
        else {
            $result['cache_hit'] = true;
            $result['post'] = json_decode($post);
            return $result;
        }
    }

    /**
     * Fetches all posts.
     *
     * @return mixed
     */
    public function all()
    {
        return Post::all();
    }

    /**
     * Deletes a post.
     *
     * @param int
     */
    public function delete($post_id)
    {
        return Post::destroy($post_id);
    }

    /**
     * Updates a post.
     *
     * @param int
     * @param array
     */
    public function update($post_id, array $post_data)
    {
        Post::find($post_id)->update($post_data);
        $updatedPost = Post::find($post_id);
        $this->cache->setEntity('post', $post_id, $updatedPost);
        return $updatedPost;
    }
}