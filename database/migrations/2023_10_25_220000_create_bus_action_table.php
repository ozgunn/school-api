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
        Schema::create('bus_action', function (Blueprint $table) {
            $table->id();
            $table->unsignedBiginteger('bus_id');
            $table->unsignedBiginteger('user_id')->nullable();
            $table->tinyInteger('status')->default(0);
            $table->timestamps();
        });
        try {
            Schema::table('bus_action', function($table) {
                $table->foreign('bus_id')->references('id')
                    ->on('bus');
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
        Schema::dropIfExists('bus_action');
    }
};
