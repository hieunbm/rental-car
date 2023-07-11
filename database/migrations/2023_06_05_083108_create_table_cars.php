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
            $table->unsignedDecimal("price");
            $table->unsignedDecimal("desposit");
            $table->unsignedBigInteger("brand_id");
            $table->unsignedBigInteger("carType_id");
            $table->string("thumbnail");
            $table->string("fuelType");
            $table->string("transmission");
            $table->unsignedBigInteger("km_limit");
            $table->unsignedBigInteger("modelYear");
            $table->unsignedBigInteger("reverse_sensor")->default(0);
            $table->unsignedBigInteger("airConditioner")->default(0);;
            $table->unsignedBigInteger("driverAirbag")->default(0);;
            $table->unsignedBigInteger("cDPlayer")->default(0);;
            $table->unsignedBigInteger("brakeAssist")->default(0);;
            $table->unsignedInteger("seats");
            $table->unsignedTinyInteger("status")->default(0);;
            $table->text("description");
            $table->float("rate");
            $table->timestamps();
            $table->foreign("brand_id")->references("id")->on("brands");
            $table->foreign("carType_id")->references("id")->on("carTypes");
            $table->softDeletesTz();
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
