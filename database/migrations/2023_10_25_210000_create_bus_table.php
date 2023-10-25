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
        Schema::create('bus', function (Blueprint $table) {
            $table->id();
            $table->unsignedBiginteger('school_id');
            $table->unsignedBiginteger('teacher_id')->nullable();
            $table->string('license_plate')->nullable();
            $table->time('start_time')->nullable();
            $table->time('end_time')->nullable();
            $table->decimal('lat', 12, 8)->nullable();
            $table->decimal('long', 12, 8)->nullable();
            $table->tinyInteger('status')->default(0);
            $table->timestamps();
            $table->softDeletes();
        });
        try {
            Schema::table('bus', function($table) {
                $table->foreign('school_id')->references('id')
                    ->on('schools');
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
        Schema::dropIfExists('bus');
    }
};
