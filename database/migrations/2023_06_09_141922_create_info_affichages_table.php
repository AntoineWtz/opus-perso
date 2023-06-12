<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInfoAffichagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::disableForeignKeyConstraints();

        Schema::create('info_affichages', function (Blueprint $table) {
            $table->id();
            $table->foreignId('media_id')->constrained('media');
            $table->string('titre');
            $table->longText('descriptif');
            $table->enum('zone', ["1","2"]);
            $table->enum('visibilite', ["Actif","Inactif"]);
            $table->integer('ordre')->unique()->nullable();
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
        Schema::dropIfExists('info_affichages');
    }
}
