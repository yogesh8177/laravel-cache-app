<?php

use Illuminate\Database\Seeder;
use App\Post;

class PostsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('posts')->delete();
        $json = File::get('database/seedData/posts.json');
        $data = json_decode($json);

        foreach ($data as $post) {
            Post::create(array(
                'id' => $post->id,
                'user_id' => $post->user_id,
                'text' => $post->text,
                'image' => $post->image,
                'created_at' => $post->created_at,
                'updated_at' => $post->updated_at,
            ));
        }
    }
}
