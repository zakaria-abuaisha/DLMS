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
        Schema::create('applications', function (Blueprint $table) {
            $table->id();
            $table->foreignId('applicant_person_id')
            ->references('id')
            ->on('people')
            ->onDelete('cascade');
            $table->foreignId('application_type_id')
            ->references('id')
            ->on('application_types');
            $table->enum('applicationStatus', ["P","X","C"])->default('P'); # Pending(P), Canceled(X), Completed(C)
            $table->decimal('paidFees', 10, 2);
            $table->foreignId('created_by_user_id')
            ->references('id')
            ->on('users')
            ->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('applications');
    }
};
