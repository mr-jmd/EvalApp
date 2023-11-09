<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('apparaisal', function (Blueprint $table) {
            $table->id();
            $table->string('consecutive');
            $table->string('address');

            $table->bigInteger('id_project')->unsigned();
            $table->foreign('id_project')->references('id')->on('projects');

            $table->bigInteger('id_contractor')->unsigned();
            $table->foreign('id_contractor')->references('id')->on('contractor');
            
            $table->bigInteger('id_city')->unsigned();
            $table->foreign('id_city')->references('id')->on('city');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('apparaisal');
    }
};
