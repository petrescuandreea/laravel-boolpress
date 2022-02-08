<?php

use Illuminate\Database\Seeder;

use App\Post;
use App\Tag;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Tag::class, 10) -> create() -> each(function($tag) {

            // post random 
            $posts = Post::inRandomOrder() -> limit(rand(0, 5)) -> get();

            // associo al tag i post 
            $tag -> posts() -> attach($posts);

            // salvo la relazione 
            $tag -> save();
        });
    }
}
