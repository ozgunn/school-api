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
        Schema::create('media', function (Blueprint $table) {
            $table->id();
            $table->unsignedBiginteger('user_id')->nullable();
            $table->unsignedBiginteger('school_id')->nullable();
            $table->unsignedBiginteger('group_id')->nullable();
            $table->unsignedBiginteger('class_id')->nullable();
            $table->timestamp('publish_date');
            $table->string('file');
            $table->string('description')->nullable();
            $table->tinyInteger('type')->default(1);
            $table->timestamps();
            $table->softDeletes();
        });
        try {
            Schema::table('media', function($table) {
                $table->foreign('user_id')->references('id')
                    ->on('users');
                $table->foreign('school_id')->references('id')
                    ->on('schools');
                $table->foreign('group_id')->references('id')
                    ->on('groups');
                $table->foreign('class_id')->references('id')
                    ->on('classes');
            });
        } catch (Exception $exception) {

        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('media');
    }
};
