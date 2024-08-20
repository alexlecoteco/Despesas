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
        Schema::create('budgets', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique()->nullable(false);
            $table->string('description')->nullable();
            $table->integer('amount')->nullable(false);
            $table->date('due_date')->nullable();
            $table->unsignedBigInteger('associated_budget_id')->nullable();
            $table->foreign('associated_budget_id')->references('id')->on('budgets');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('budgets');
    }
};
