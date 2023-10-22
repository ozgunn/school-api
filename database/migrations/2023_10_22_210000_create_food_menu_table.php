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
        Schema::create('food_menu', function (Blueprint $table) {
            $table->id();
            $table->unsignedBiginteger('parent_id')->nullable();
            $table->unsignedBiginteger('school_id');
            $table->string('lang', 5)->nullable();
            $table->timestamp('date')->nullable();
            $table->string('first_meal')->nullable();
            $table->string('second_meal')->nullable();
            $table->string('third_meal')->nullable();
            $table->timestamps();
            $table->unsignedBiginteger('user_id')->nullable();
            $table->softDeletes();
        });
        try {
            Schema::table('food_menu', function($table) {
                $table->foreign('parent_id')->references('id')
                    ->on('food_menu');
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
        Schema::dropIfExists('food_menu');
    }
};
