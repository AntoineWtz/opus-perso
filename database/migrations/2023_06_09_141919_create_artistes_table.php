<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArtistesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::disableForeignKeyConstraints();

        Schema::create('artistes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('media_id')->nullable()->constrained();
            $table->string('nom');
            $table->text('descriptif');
            $table->string('lien_facebook')->nullable();
            $table->string('lien_youtube')->nullable();
            $table->string('lien_twiiter')->nullable();
            $table->string('lien_instagram')->nullable();
            $table->timestamps();
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
        Schema::dropIfExists('artistes');
    }
}
