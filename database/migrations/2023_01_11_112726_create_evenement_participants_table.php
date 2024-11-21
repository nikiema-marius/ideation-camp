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
        Schema::create('evenement_participants', function (Blueprint $table) {
            $table->id();
            $table->integer("id_participant")->unsigned();
            $table->foreign('id_participant')->references('id')->on('participants'); 
            $table->integer("id_evenement")->unsigned();
            $table->foreign('id_evenement')->references('id')->on('evenements');
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
        Schema::dropIfExists('evenement_participants');
    }
};
