<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePublicationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::disableForeignKeyConstraints();

        Schema::create('publications', function (Blueprint $table) {
            $table->id();
            $table->foreignId('type_publication_id')->constrained();
            $table->foreignId('user_id')->constrained();
            $table->foreignId('lieux_id')->constrained();
            $table->string('titre');
            $table->longText('descriptif');
            $table->enum('toulousain', ["oui","non"]);
            $table->text('resume_rs');
            $table->enum('statut', ["Brouillon","Relecture","Valide"]);
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
        Schema::dropIfExists('publications');
    }
}
