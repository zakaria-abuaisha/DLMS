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
        Schema::create('detained_licenses', function (Blueprint $table) {
            $table->id();
            $table->foreignId('license_id');
            $table->timestamp('detainDate');
            $table->decimal('fineFees', 10, 2);
            $table->foreignId('created_by_user_id');
            $table->foreignId('license_class_id');
            $table->boolean('isReleased');
            $table->dateTime('releaseDate');
            $table->foreignId('released_by_user_id')->nullable();
            $table->foreignId('release_application_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detained_licenses');
    }
};
