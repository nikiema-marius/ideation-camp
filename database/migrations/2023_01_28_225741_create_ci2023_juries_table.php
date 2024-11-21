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
        Schema::create('ci2023_juries', function (Blueprint $table) {
            $table->id();
            $table->enum('role',['president','jury']);
            $table->string('user');
            $table->string('password');
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
        Schema::dropIfExists('ci2023_juries');
    }
};
