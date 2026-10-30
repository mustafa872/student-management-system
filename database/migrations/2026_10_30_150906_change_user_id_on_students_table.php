<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // Remove the old foreign key constraint
        Schema::table('students', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
        });

        // Add the new foreign key with nullOnDelete
        Schema::table('students', function (Blueprint $table) {
            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->nullOnDelete();
        });
    }

    public function down(): void
    {
        // Remove the new foreign key constraint
        Schema::table('students', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
        });

        // Restore the original cascadeOnDelete behavior
        Schema::table('students', function (Blueprint $table) {
            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->cascadeOnDelete();
        });
    }
};
