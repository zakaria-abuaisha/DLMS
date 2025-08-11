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
            $table->foreignId('application_id')
                ->references('id')->on('applications');
            $table->foreignId('driver_id')
                ->references('id')->on('drivers');
            $table->foreignId('license_class_id')
                ->references('id')->on('license_classes');
            $table->date('issueDate')->useCurrent();
            $table->date('expirationDate');
            $table->text('notes');
            /*
                F -> First Time
                RT -> Retained After Detain it
                RN -> Renewed
                M -> New After Missing It
                D -> New After Damage It
            */
            $table->enum('issueReason', ['F', 'D', 'RT', 'RN', 'M']);
            $table->decimal('paidFees', 10, 2);
            $table->boolean('isActive')->default(true);
            $table->foreignId('created_by_user_id')
                ->references('id')->on('users');
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
