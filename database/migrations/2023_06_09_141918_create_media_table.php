<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMediaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::disableForeignKeyConstraints();

        Schema::create('media', function (Blueprint $table) {
            $table->id();
            $table->foreignId('type_media_id')->constrained();
            $table->foreignId('user_id')->constrained();
            $table->foreignId('lieux_id')->constrained();
            $table->string('chemin');
            $table->string('titre');
            $table->string('balise_alt');
            $table->string('modifieur')->nullable();
            $table->string('photographe')->nullable();
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
        Schema::dropIfExists('media');
    }
}
