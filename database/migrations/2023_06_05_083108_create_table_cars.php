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
        Schema::create('cars', function (Blueprint $table) {
            $table->id();
            $table->string("license_plate");
            $table->string("model");
            $table->string("slug");
            $table->unsignedBigInteger("brand_id");
            $table->unsignedBigInteger("carType_id");
            $table->string("thumbnail");
            $table->string("fuelType");
            $table->string("transmission");
            $table->unsignedBigInteger("km_limit");
            $table->unsignedBigInteger("modelYear");
            $table->unsignedBigInteger("reverse_sensor");
            $table->unsignedBigInteger("airConditioner");
            $table->unsignedBigInteger("driverAirbag");
            $table->unsignedBigInteger("cDPlayer");
            $table->unsignedBigInteger("brakeAssist");
            $table->unsignedTinyInteger("status");
            $table->text("description");
            $table->float("rate");
            $table->timestamps();
            $table->foreign("brand_id")->references("id")->on("brands");
            $table->foreign("carType_id")->references("id")->on("carTypes");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cars');
    }
};
