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
        Schema::create('license_classes', function (Blueprint $table) {
            $table->id();
            $table->string('className')->unique();
            $table->text('classDescription');
            $table->unsignedSmallInteger('minimumAllowedAge');
            $table->unsignedSmallInteger('defaultValidityLength');
            $table->decimal('classFees', 10, 2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('license_classes');
    }
};
