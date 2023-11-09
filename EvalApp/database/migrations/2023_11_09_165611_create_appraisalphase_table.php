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
        Schema::create('appraisalphase', function (Blueprint $table) {
            $table->id();
            
            $table->bigInteger('id_phase')->unsigned();
            $table->foreign('id_phase')->references('id')->on('phase');

            $table->bigInteger('id_appraisal')->unsigned();
            $table->foreign('id_appraisal')->references('id')->on('appraisal');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('appraisalphase');
    }
};
