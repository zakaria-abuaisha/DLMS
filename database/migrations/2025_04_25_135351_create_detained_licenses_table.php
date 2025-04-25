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
            $table->foreignId('license_id')
                ->references('id')->on('licenses');
            $table->timestamp('detainDate')->useCurrent();
            $table->decimal('fineFees', 10, 2);
            $table->foreignId('created_by_user_id')
                ->references('id')->on('users');
            $table->foreignId('license_class_id')
                ->references('id')->on('license_classes');
            $table->boolean('isReleased')->default(false);
            $table->dateTime('releaseDate')->nullable();
            $table->foreignId('released_by_user_id')
                ->references('id')->on('users')->nullable();
            $table->foreignId('release_application_id')
                ->references('id')->on('applications')->nullable();
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
