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
        Schema::create('expenditure_budget', function (Blueprint $table) {
            $table->unsignedBigInteger('expenditure_id');
            $table->foreign('expenditure_id')->references('id')->on('expenses');
            $table->unsignedBigInteger('budget_id');
            $table->foreign('budget_id')->references('id')->on('budgets');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('expenditure_budget');
    }
};
