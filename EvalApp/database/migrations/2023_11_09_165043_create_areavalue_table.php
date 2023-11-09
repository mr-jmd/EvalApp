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
        Schema::create('areavalue', function (Blueprint $table) {
            $table->id();
            $table->decimal('value', 10, 2);
            $table->decimal('area', 10, 2);

            $table->bigInteger('id_appraisal')->unsigned();
            $table->foreign('id_appraisal')->references('id')->on('appraisal');

            $table->bigInteger('id_areatype')->unsigned();
            $table->foreign('id_areatype')->references('id')->on('areatype');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('areavalue');
    }
};
