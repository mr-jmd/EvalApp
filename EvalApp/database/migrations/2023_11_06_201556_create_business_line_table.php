<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;


return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('business_line', function (Blueprint $table) {
            $table->id();
            $table->string('name');
        });

        DB::table('business_line')->insert([
            ['name' => 'Residencial'],
            ['name' => 'Comercial'],
            ['name' => 'Industrial'],
            ['name' => 'Agrícola'],
            ['name' => 'Especiales'],
            ['name' => 'Gubernamentales'],
            ['name' => 'Desarrollo Inmobiliario'],
            ['name' => 'Renovaciones y Mejoras'],
            ['name' => 'Revaluación Hipotecaria']
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('business_line');
    }
};
