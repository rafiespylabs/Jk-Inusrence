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
        Schema::create('tbl_healthpolicies', function (Blueprint $table) {
            $table->id();
            $table->tinyInteger('type')->comment('1-family, 2-individual, 3-group(company), 4-topup');
            $table->integer('company_id');
            $table->string('name');
            $table->string('primary_number');
            $table->string('secondary_number')->nullable();
            $table->date('expiry_date');
            $table->decimal('premium_amount', 10, 2);
            $table->decimal('sum_insured', 10, 2);
            $table->enum('term', ['1year']);
            $table->integer('executive_id');
            $table->boolean('status')->default(0)->comment('0-Not paid, 1-paid');
            $table->integer('referred_id');
            $table->integer('provider_id');
            $table->text('note')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_healthpolicies');
    }
};
