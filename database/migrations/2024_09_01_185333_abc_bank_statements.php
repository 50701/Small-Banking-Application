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
        // Create abc_bank_statements Table
        Schema::create('abc_bank_statements', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('abc_bank_users')->onDelete('cascade'); // User who performed the transaction
            $table->foreignId('related_user_id')->nullable()->constrained('abc_bank_users')->onDelete('set null'); // User involved in the transaction (e.g., sender in case of incoming transfer)
            $table->decimal('amount', 15, 2);                         // Amount involved in the transaction
            $table->enum('type', ['credit', 'debit']);                // Type of transaction: credit or debit
            $table->string('details');                               // Details of the transaction (e.g., 'withdraw', 'deposit', 'transfer')
            $table->decimal('balance', 15, 2);                       // Balance after transaction
            $table->string('transaction_reference')->nullable();    // Unique identifier for the transaction (optional)
            $table->timestamps();                                   // Created at and updated at timestamps
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Drop abc_bank_statements Table
        Schema::dropIfExists('abc_bank_statements');
    }
};
