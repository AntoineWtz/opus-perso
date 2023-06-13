<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGenreMusicauxPublicationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::disableForeignKeyConstraints();

        Schema::create('genre_musicaux_publication', function (Blueprint $table) {
        $table->unsignedBigInteger('genre_musicaux_id');
        $table->unsignedBigInteger('publication_id');

        $table->foreign('genre_musicaux_id')->references('id')->on('genre_musicauxes')->onDelete('cascade');
        $table->foreign('publication_id')->references('id')->on('publications')->onDelete('cascade');
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
        Schema::dropIfExists('genre_musicaux_publication');
    }
}
