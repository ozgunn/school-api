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
        Schema::create('school_user', function (Blueprint $table) {
            $table->id();
            $table->unsignedBiginteger('school_id');
            $table->unsignedBiginteger('user_id');
            $table->tinyInteger('role');


        });
        try {
            Schema::table('school_user', function($table) {
                $table->foreign('school_id')->references('id')
                    ->on('schools')->onDelete('cascade');
                $table->foreign('user_id')->references('id')
                    ->on('users')->onDelete('cascade');
                $table->timestamps();
            });
        } catch (Exception $exception) {

        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('school_user');
    }
};
