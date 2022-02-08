<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeys extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('posts', function (Blueprint $table) {

            // modifico la tabella posts in funzione che la colonna category_id
            // vada a referenziare la colonna id della tabella categories
            // Relaziono i posts con le categories
             $table -> foreign('category_id', 'posts_category') 
                    -> references('id') 
                    -> on('categories');
        });

        Schema::table('post_tag', function (Blueprint $table) {

             $table -> foreign('post_id', 'posts_tags') 
                    -> references('id') 
                    -> on('posts');
                    
             $table -> foreign('tag_id', 'tags_posts') 
                    -> references('id') 
                    -> on('tags');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('posts', function (Blueprint $table) {

            $table -> dropForeign('posts_category');
        });

        Schema::table('post_tag', function (Blueprint $table) {

            $table -> dropForeign('posts_tags');
            $table -> dropForeign('tags_posts');
       });
    }
    
}
