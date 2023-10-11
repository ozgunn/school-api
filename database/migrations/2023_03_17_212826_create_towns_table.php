<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('def_towns', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('city');
            $table->string('name');
            $table->timestamps();
            $table->softDeletes();
        });
        try {
            Schema::table('def_towns', function($table) {
                $table->foreign('city')->references('id')->on('def_cities')->onDelete('cascade');
            });
        } catch (Exception $exception) {

        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('def_towns');
    }
};
