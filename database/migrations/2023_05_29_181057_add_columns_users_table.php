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
        Schema::table('users', function (Blueprint $table) {
            $table->foreignId('employee_id')->constrained()->after('id');
            $table->string('username')->after('name')->unique();
            $table->boolean('isActive')->after('email')->default(true);
            $table->string('createdBy');
            $table->string('updatedBy');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('employee_id', 'username', 'isActive', 'createdBy', 'updatedBy');
        });
    }
};
