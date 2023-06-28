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
            $table->foreignId('lieux_id')->nullable()->constrained();
            $table->foreignId('image_aperçu')->constrained('media');
            $table->foreignId('video_aperçu')->nullable()->constrained('media');
            $table->string('titre');
            $table->longText('descriptif')->nullable();
            $table->dateTime('date_parution')->nullable();
            $table->enum('toulousain', ["oui","non"]);
            $table->text('resume_rs')->nullable();
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
