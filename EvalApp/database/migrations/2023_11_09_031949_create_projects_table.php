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
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->string('Name');
            $table->decimal('Percentage_Completion', 5, 2);
            $table->timestamps();

            $table->bigInteger('Contract_Id')->unsigned();
            $table->foreign('Contract_Id')->references('id')->on('contract');

            $table->bigInteger('State_Id')->unsigned();
            $table->foreign('State_Id')->references('id')->on('state');  
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};
