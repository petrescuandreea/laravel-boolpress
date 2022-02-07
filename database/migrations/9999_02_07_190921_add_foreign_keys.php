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
    }
}
