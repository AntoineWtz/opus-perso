<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEvenementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::disableForeignKeyConstraints();

        Schema::create('evenements', function (Blueprint $table) {
            $table->id();
            $table->foreignId('type_evenement_id')->constrained();
            $table->foreignId('lieux_id')->nullable()->constrained();
            $table->foreignId('media_id')->nullable()->constrained();
            $table->string('titre');
            $table->date('date_event');
            $table->string('billeterie')->nullable();
            $table->enum('mise_en_avant', ["oui","non"]);
            $table->enum('visibilite', ["Actif","Inactif"]);
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
        Schema::dropIfExists('evenements');
    }
}
