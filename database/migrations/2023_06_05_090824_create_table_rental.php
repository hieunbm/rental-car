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
        Schema::create('rental', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("customer_id");
            $table->unsignedBigInteger("car_id");
            $table->timestamp("rental_date")->nullable()->default(null);
            $table->timestamp("return_date")->nullable()->default(null);
            $table->string("pickup_location");
            $table->string("message");
            $table->text("address");
            $table->string("email");
            $table->string("telephone",20);
            $table->string("rental_type");
            $table->unsignedDecimal("car_price");
            $table->unsignedDecimal("additional_fee");
            $table->unsignedDecimal("total_amount");
            $table->unsignedTinyInteger("status");
            $table->timestamps();
            $table->foreign("customer_id")->references("id")->on("users");
            $table->foreign("car_id")->references("id")->on("cars");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rental');
    }
};
