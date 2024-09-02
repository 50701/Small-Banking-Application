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
        // Create abc_bank_users Table
        Schema::create('abc_bank_users', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // Name field
            $table->string('email')->unique(); // Email field with unique constraint
            $table->string('password'); // Password field
            $table->boolean('agreed_to_terms')->default(false); // Agree checkbox (terms and privacy)
            $table->decimal('balance', 15, 2)->default(0); // Balance field with default value of 0
            $table->string('remember_token')->nullable(); // Add remember_token field
            $table->timestamps(); // Created at and updated at timestamps
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Drop abc_bank_users Table
        Schema::dropIfExists('abc_bank_users');
    }
};
