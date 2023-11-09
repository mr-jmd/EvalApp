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
        Schema::create('area_value', function (Blueprint $table) {
            $table->decimal('value', 10, 2);
            $table->decimal('area', 10, 2);

            $table->bigInteger('id_appraisal')->unsigned();
            $table->foreign('id_appraisal')->references('id')->on('apparaisal');

            $table->bigInteger('id_areatype')->unsigned();
            $table->foreign('id_areatype')->references('id')->on('area_type');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('area_value');
    }
};
