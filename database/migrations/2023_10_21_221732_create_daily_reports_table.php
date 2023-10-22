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
        Schema::create('daily_reports', function (Blueprint $table) {
            $table->id();
            $table->unsignedBiginteger('student_id');
            $table->unsignedBiginteger('school_id')->nullable();
            $table->unsignedBiginteger('class_id')->nullable();
            $table->unsignedBiginteger('user_id')->nullable();
            $table->string('selected_notes')->nullable();
            $table->string('note')->nullable();
            $table->timestamp('date')->nullable();
            $table->timestamp('read_at')->nullable();
            $table->timestamp('confirmed_at')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
        try {
            Schema::table('daily_reports', function($table) {
                $table->foreign('student_id')->references('id')
                    ->on('students');
                $table->foreign('class_id')->references('id')
                    ->on('classes');
                $table->foreign('school_id')->references('id')
                    ->on('schools');
                $table->foreign('user_id')->references('id')
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
        Schema::dropIfExists('daily_reports');
    }
};
