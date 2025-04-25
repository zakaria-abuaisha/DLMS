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
        Schema::create('test_appointments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('test_type_id');
            $table->foreignId('Local_dl_application_id');
            $table->dateTime('appointmentDate');
            $table->decimal('paidFees', 10, 2);
            $table->foreignId('created_by_user_id');
            $table->boolean('isLocked');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('test_appointments');
    }
};
