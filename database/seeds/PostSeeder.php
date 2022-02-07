<?php

use Illuminate\Database\Seeder;
use App\Post;
use App\Category;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Post::class, 50) -> make() -> each(function($post){

            // prendo una categoria casuale
            $category = Category::inRandomOrder() -> limit(1) -> first();

            // creo la relazione 
            $post -> category() -> associate($category);
            
            // salvo la relazione
            $post -> save();
        });
    }
}
