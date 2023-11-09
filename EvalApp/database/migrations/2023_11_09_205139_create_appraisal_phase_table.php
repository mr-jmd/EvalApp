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
        Schema::create('appraisal_phase', function (Blueprint $table) {
            $table->decimal('executionPercentage', 5, 2);
            $table->date('startDate');
            $table->date('endDate');

            $table->bigInteger('id_phase')->unsigned();
            $table->foreign('id_phase')->references('id')->on('phase');

            $table->bigInteger('id_appraisal')->unsigned();
            $table->foreign('id_appraisal')->references('id')->on('apparaisal');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('appraisal_phase');
    }
};
