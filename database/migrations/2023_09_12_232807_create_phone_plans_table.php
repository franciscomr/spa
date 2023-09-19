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
        Schema::create('phone_plans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('phone_company_id')->constrained();
            $table->string('name')->unique();
            $table->string('data');
            $table->date('startDate');
            $table->date('expirationDate');
            $table->string('createdBy');
            $table->string('updatedBy');
            $table->timestamp('createdAt')->useCurrent();
            $table->timestamp('updatedAt')->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('phone_plans');
    }
};
