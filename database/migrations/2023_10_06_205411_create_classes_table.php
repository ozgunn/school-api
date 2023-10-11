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
        Schema::create('classes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBiginteger('school_id');
            $table->unsignedBiginteger('group_id');
            $table->string('name');
            $table->timestamps();
            $table->softDeletes();
        });
        try {
            Schema::table('classes', function($table) {
                $table->foreign('school_id')->references('id')
                    ->on('schools')->onDelete('cascade');
                $table->foreign('group_id')->references('id')
                    ->on('groups')->onDelete('cascade');
            });
        } catch (Exception $exception) {

        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('classes');
    }
};
