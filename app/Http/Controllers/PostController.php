<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\Contracts\RepositoryContract;
use App\Repositories\PostRepository;

class PostController extends Controller
{

    protected $post;

    /**
     * PostController constructor.
     *
     * @param PostRepository $post
     */
    public function __construct(PostRepository $post)
    {
        $this->post = $post;
    }

    /**
     * List all posts.
     *
     * @return mixed
     */
    public function index()
    {
        $data = [
            'posts' => $this->post->all()
        ];
        return $data;
        //return view('templates.posts', $data);
    }

    /**
     * Fetch post by its Id
     * 
     * @return Post
     */
    public function fetchPost($post_id) {
        $data = $this->post->get($post_id);
        return $data;
        //return view('postDetails', $data);
    }

    /**
     * Update post by its Id
     * 
     * @return update result
     */
    public function updatePost($post_id, Request $request) {
        $result = $this->post->update($post_id, $request->input());
        return $result;
        //return view('postDetails', $result);
    }

    /**
     * Update post by its Id
     * 
     * @return delete result
     */
    public function deletePost($post_id) {
        $result = $this->post->delete($post_id);
        return $result;
        //return view('deleteDetails', $result);
    }

}