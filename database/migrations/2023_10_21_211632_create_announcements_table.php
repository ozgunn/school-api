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
        Schema::create('announcements', function (Blueprint $table) {
            $table->id();
            $table->unsignedBiginteger('sender_id');
            $table->unsignedBiginteger('school_id');
            $table->unsignedBiginteger('group_id')->nullable();
            $table->unsignedBiginteger('class_id')->nullable();
            $table->unsignedBiginteger('teacher_id')->nullable();
            $table->unsignedBiginteger('student_id')->nullable();
            $table->tinyInteger('target')->default(1);
            $table->timestamps();
            $table->softDeletes();
        });
        try {
            Schema::table('announcements', function($table) {
                $table->foreign('sender_id')->references('id')
                    ->on('users');
                $table->foreign('school_id')->references('id')
                    ->on('schools');
                $table->foreign('class_id')->references('id')
                    ->on('classes');
                $table->foreign('teacher_id')->references('id')
                    ->on('users');
                $table->foreign('student_id')->references('id')
                    ->on('students');
            });
        } catch (Exception $exception) {

        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('announcements');
    }
};
