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
        Schema::create('daily_notes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBiginteger('parent_id')->default(0);
            $table->string('type')->nullable();
            $table->string('title')->nullable();
            $table->string('option')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
        try {
            Schema::table('daily_notes', function($table) {
                $table->foreign('parent_id')->references('id')
                    ->on('daily_notes');
            });
        } catch (Exception $exception) {

        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('daily_notes');
    }
};
