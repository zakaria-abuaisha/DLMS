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
            $table->foreignId('test_type_id')
                ->references('id')
                ->on('test_types')
                ->onDelete('cascade');
            $table->foreignId('Local_dl_application_id')
                ->references('id')
                ->on('local_driving_license_applications')
                ->onDelete('cascade');
            $table->dateTime('appointmentDate');
            $table->decimal('paidFees', 10, 2);
            $table->foreignId('created_by_user_id')
                ->references('id')
                ->on('users');
            $table->boolean('isLocked')->default(false);
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
