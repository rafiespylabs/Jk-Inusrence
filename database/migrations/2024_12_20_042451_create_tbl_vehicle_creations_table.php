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
        Schema::create('tbl_vehicle_creations', function (Blueprint $table) {
            $table->id();
            $table->integer('type_id');
            $table->integer('brand_id');
            $table->integer('model_id');
            $table->integer('vehicle_number');
            $table->string('engine_number');
            $table->date('date_of_registration');
            $table->date('end_registration');
            $table->string('owner_name');
            $table->integer('chassis_number');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_vehicle_creations');
    }
};
