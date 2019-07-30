<?php
namespace App\Repositories;

use App\Repositories\Contracts\RepositoryContract;
use App\Post;

class PostRepository implements RepositoryContract {
    /**
     * Fetches an post by it's ID
     *
     * @param int
     * @return collection
     */
    public function get($post_id)
    {
        return Post::find($post_id);
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
        Post::destroy($post_id);
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
    }
}