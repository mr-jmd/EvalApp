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
        Schema::create('reconsiderations', function (Blueprint $table) {
            $table->id();

            $table->string('name');
            $table->date('receptionDate');
            $table->date('responseDate')->nullable();
            
            $table->bigInteger('id_status')->unsigned();
            $table->foreign('id_status')->references('id')->on('status');

            $table->bigInteger('id_reconsiderationType')->unsigned();
            $table->foreign('id_reconsiderationType')->references('id')->on('reconsiderationType');
            
            $table->bigInteger('id_appraisal')->unsigned();
            $table->foreign('id_appraisal')->references('id')->on('appraisal');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reconsiderations');
    }
};
