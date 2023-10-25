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
        Schema::create('messages', function (Blueprint $table) {
            $table->id();
            $table->unsignedBiginteger('user_id');
            $table->unsignedBiginteger('teacher_id')->nullable();
            $table->unsignedBiginteger('school_id')->nullable();
            $table->unsignedBiginteger('student_id')->nullable();
            $table->tinyInteger('type')->default(0);
            $table->text('message');
            $table->string('ip')->nullable();
            $table->timestamp('read_at')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
        try {
            Schema::table('messages', function($table) {
                $table->foreign('user_id')->references('id')
                    ->on('users');
                $table->foreign('teacher_id')->references('id')
                    ->on('users');
                $table->foreign('school_id')->references('id')
                    ->on('schools');
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
        Schema::dropIfExists('messages');
    }
};
