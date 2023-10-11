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
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->unsignedBiginteger('school_id');
            $table->unsignedBiginteger('class_id');
            $table->unsignedBiginteger('parent_id');
            $table->string('name');
            $table->date('birth_date')->nullable();
            $table->string('image')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
        try {
            Schema::table('students', function($table) {
                $table->foreign('school_id')->references('id')
                    ->on('schools');
                $table->foreign('class_id')->references('id')
                    ->on('classes');
                $table->foreign('parent_id')->references('id')
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
        Schema::dropIfExists('students');
    }
};
