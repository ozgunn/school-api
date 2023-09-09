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
        Schema::create('schools', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('parent_id')->nullable();
            $table->string('name', 100);
            $table->unsignedInteger('country')->nullable();
            $table->unsignedInteger('city')->nullable();
            $table->unsignedInteger('town')->nullable();
            $table->text('address')->nullable();
            $table->string('logo')->nullable();
            $table->string('phone', 20)->nullable();
            $table->string('email', 100)->nullable();
            $table->tinyInteger('status')->default(1);
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('parent')->references('id')->on('schools')->onDelete('set null');
            $table->foreign('country')->references('id')->on('def_countries')->onDelete('set null');
            $table->foreign('city')->references('id')->on('def_cities')->onDelete('set null');
            $table->foreign('town')->references('id')->on('def_towns')->onDelete('set null');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users_data');
    }
};
