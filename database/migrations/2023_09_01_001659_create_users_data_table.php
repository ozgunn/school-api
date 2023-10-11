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
        Schema::create('users_data', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('first_name', 50);
            $table->string('last_name', 50);
            $table->unsignedInteger('country')->nullable();
            $table->unsignedInteger('city')->nullable();
            $table->unsignedInteger('town')->nullable();
            $table->text('address')->nullable();
            $table->timestamps();
            $table->softDeletes();


        });
        try {
            Schema::table('users_data', function($table) {
                $table->foreign('country')->references('id')->on('def_countries')->onDelete('set null');
                $table->foreign('city')->references('id')->on('def_cities')->onDelete('set null');
                $table->foreign('town')->references('id')->on('def_towns')->onDelete('set null');
            });
        } catch (Exception $exception) {

        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users_data');
    }
};
