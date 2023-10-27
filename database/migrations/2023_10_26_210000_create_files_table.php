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
        Schema::create('files', function (Blueprint $table) {
            $table->id();
            $table->unsignedBiginteger('user_from')->nullable();
            $table->unsignedBiginteger('user_to')->nullable();
            $table->unsignedBiginteger('school_id')->nullable();
            $table->unsignedBiginteger('group_id')->nullable();
            $table->unsignedBiginteger('class_id')->nullable();
            $table->unsignedBiginteger('student_id')->nullable();
            $table->smallInteger('publish_year')->nullable();
            $table->tinyInteger('publish_month')->nullable();
            $table->tinyInteger('type')->default(0);
            $table->string('file');
            $table->string('lang', 10)->nullable();
            $table->string('description')->nullable();
            $table->boolean('is_url')->default(false);
            $table->string('ip')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
        try {
            Schema::table('files', function($table) {
                $table->foreign('user_from')->references('id')
                    ->on('users');
                $table->foreign('user_to')->references('id')
                    ->on('users');
                $table->foreign('school_id')->references('id')
                    ->on('schools');
                $table->foreign('group_id')->references('id')
                    ->on('groups');
                $table->foreign('class_id')->references('id')
                    ->on('classes');
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
        Schema::dropIfExists('files');
    }
};
