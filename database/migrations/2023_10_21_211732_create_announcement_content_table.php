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
        Schema::create('announcement_content', function (Blueprint $table) {
            $table->id();
            $table->unsignedBiginteger('announcement_id');
            $table->string('lang', 5)->nullable();
            $table->text('content');
            $table->timestamps();
        });
        try {
            Schema::table('announcement_content', function($table) {
                $table->foreign('announcement_id')->references('id')
                    ->on('announcements');
            });
        } catch (Exception $exception) {

        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('announcement_content');
    }
};
