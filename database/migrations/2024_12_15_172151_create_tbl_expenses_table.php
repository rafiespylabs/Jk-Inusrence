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
        Schema::create('tbl_expenses', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('type_id'); // Foreign key for tbl_expense_types
            $table->decimal('amount', 10, 2);
            $table->string('description')->nullable(); // Optional field
            $table->date('date');
            $table->date('created_date')->default(now()); // Default to current date
            $table->integer('created_by'); // Foreign key for users table
            $table->timestamps();

            // Foreign key constraints
            $table->foreign('type_id')->references('id')->on('tbl_expense_types')->onDelete('cascade');
            $table->foreign('created_by')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_expenses');
    }
};
