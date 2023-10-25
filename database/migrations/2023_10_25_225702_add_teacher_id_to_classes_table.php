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
        Schema::table('classes', function (Blueprint $table) {
            $table->unsignedInteger('teacher_id')->nullable();
        });
        try {
            Schema::table('classes', function($table) {
                $table->foreign('teacher_id')->references('id')
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
        Schema::table('classes', function (Blueprint $table) {
            $table->dropColumn('teacher_id');
        });
    }
};
