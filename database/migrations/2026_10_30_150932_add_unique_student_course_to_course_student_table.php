<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('course_student', function (Blueprint $table) {
            $table->unique(
                ['student_id', 'course_id'],
                'course_student_unique_pair'
            );
        });
    }

    public function down(): void
    {
        Schema::table('course_student', function (Blueprint $table) {
            $table->dropUnique('course_student_unique_pair');
        });
    }
};
