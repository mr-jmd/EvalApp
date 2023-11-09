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
        Schema::create('contract', function (Blueprint $table) {
            $table->id();
            $table->string('Contract_Number');
            $table->string('Proposal_Number');
            $table->date('Approval_Date');
            $table->date('Delivery_Date');
            $table->integer('Days_Due');
            $table->text('Scope');
            $table->decimal('Contract_Value', 10, 2);
            $table->string('Document_URL');
            $table->timestamps();

            $table->bigInteger('Business_Line_Id')->unsigned();;
            $table->foreign('Business_Line_Id')->references('id')->on('business_line');

            $table->bigInteger('Customer_Id')->unsigned();;
            $table->foreign('Customer_Id')->references('id')->on('customers');

            $table->bigInteger('State_Id')->unsigned();;
            $table->foreign('State_Id')->references('id')->on('state');            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contract');
    }
};
