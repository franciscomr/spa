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
        Schema::create('assets', function (Blueprint $table) {
            $table->id();
            $table->foreignId('contract_id')->constrained();
            $table->foreignId('branch_id')->constrained();
            $table->foreignId('category_id')->constrained();
            $table->foreignId('equipment_model_id')->constrained();
            $table->string('serialNumber')->unique();
            $table->string('charger')->unique()->nullable();
            $table->boolean('isActive')->default(1);
            $table->foreignId('asset_condition_id')->default(1)->constrained();
            $table->foreignId('asset_disposal_reason_id')->default(1)->constrained();
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
        Schema::dropIfExists('assets');
    }
};
