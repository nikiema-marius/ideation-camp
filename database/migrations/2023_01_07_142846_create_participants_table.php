<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('participants', function (Blueprint $table) {
            $table->id();
            $table->string("nom");
            $table->string("prenom");
            $table->string("email");
            $table->string("sex");
            $table->string("universite");
            $table->string("niveau_etude");
            $table->string("annee_passe_univ");
            $table->string("annee_depart_univ");
            $table->boolean("experience_entrep");
            $table->boolean("projet_incub");
            $table->boolean("projet_numerique");
            $table->boolean("projet_inter_diciplinaire");
            $table->text("motivation");
            $table->text("photo")->nullable();
            $table->integer("id_groupe")->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('participants');
    }
};
