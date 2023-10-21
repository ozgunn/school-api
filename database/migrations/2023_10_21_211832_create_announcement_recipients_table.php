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
        Schema::create('announcement_recipients', function (Blueprint $table) {
            $table->id();
            $table->unsignedBiginteger('announcement_id');
            $table->unsignedBiginteger('student_id')->nullable();
            $table->unsignedBiginteger('teacher_id')->nullable();
            $table->timestamp('read_at')->nullable();
            $table->timestamps();
        });
        try {
            Schema::table('announcement_recipients', function($table) {
                $table->foreign('announcement_id')->references('id')
                    ->on('announcements');
                $table->foreign('student_id')->references('id')
                    ->on('students');
                $table->foreign('teacher_id')->references('id')
                    ->on('users');
            });
        } catch (Exception $exception) {

        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('announcement_recipients');
    }
};
