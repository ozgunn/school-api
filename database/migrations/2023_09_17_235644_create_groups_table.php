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
        Schema::create('groups', function (Blueprint $table) {
            $table->id();
            $table->unsignedBiginteger('school_id')->nullable();
            $table->string('name');
            $table->tinyInteger('age_group');
            $table->timestamps();
            $table->softDeletes();
        });
        try {
            Schema::table('groups', function($table) {
                $table->foreign('school_id')->references('id')
                    ->on('schools')->onDelete('set null');
            });
        } catch (Exception $exception) {

        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('groups');
    }
};
