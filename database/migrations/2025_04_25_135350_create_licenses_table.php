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
        Schema::create('licenses', function (Blueprint $table) {
            $table->id();
            $table->foreignId('application_id');
            $table->foreignId('driver_id');
            $table->foreignId('license_class_id');
            $table->timestamp('issueDate');
            $table->dateTime('expirationDate');
            $table->text('notes');
            $table->decimal('paidFees', 10, 2);
            $table->boolean('isActive');
            $table->foreignId('created_by_user_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('licenses');
    }
};
