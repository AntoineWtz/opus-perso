<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArtisteGenreMusicauxTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::disableForeignKeyConstraints();

        Schema::create('artiste_genre_musicaux', function (Blueprint $table) {
            $table->unsignedBigInteger('artiste_id');
            $table->unsignedBigInteger('genre_musicaux_id');

            $table->foreign('artiste_id')->references('id')->on('artistes')->onDelete('cascade');
            $table->foreign('genre_musicaux_id')->references('id')->on('genre_musicauxes')->onDelete('cascade');
        });

        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('artiste_genre_musicaux');
    }
}
