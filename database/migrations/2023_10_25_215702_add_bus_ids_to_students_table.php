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
        Schema::table('students', function (Blueprint $table) {
            $table->unsignedInteger('morning_bus_id')->nullable();
            $table->unsignedInteger('evening_bus_id')->nullable();
        });
        try {
            Schema::table('students', function($table) {
                $table->foreign('morning_bus_id')->references('id')
                    ->on('bus');
                $table->foreign('evening_bus_id')->references('id')
                    ->on('bus');
            });
        } catch (Exception $exception) {

        }

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('students', function (Blueprint $table) {
            $table->dropColumn('morning_bus_id');
            $table->dropColumn('evening_bus_id');
        });
    }
};
