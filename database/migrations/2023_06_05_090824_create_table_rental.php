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
            $table->unsignedBigInteger("user_id");
            $table->unsignedBigInteger("car_id");
            $table->timestamp("rental_date")->nullable()->default(null);
            $table->timestamp("return_date")->nullable()->default(null);
            $table->unsignedInteger("expected");
            $table->string("pickup_location");
            $table->text("message")->nullable();
            $table->text("address")->nullable();
            $table->string("email");
            $table->string("telephone",20);
            $table->string("rental_type");
            $table->unsignedDecimal("car_price");
            $table->string("desposit_type");
            $table->unsignedDecimal("desposit_amount");
            $table->unsignedDecimal("additional_fee")->nullable();
            $table->unsignedDecimal("total_amount");
            $table->unsignedTinyInteger("status");
            $table->string("payment_method",20)->nullable();
            $table->boolean("is_rent_paid")->default(false);
            $table->boolean("is_desposit_paid")->default(false);
            $table->boolean("is_car_returned")->default(false);
            $table->boolean("is_desposit_returned")->default(false);
            $table->boolean("is_reviewed")->default(false);
            $table->timestamps();
            $table->foreign("user_id")->references("id")->on("users");
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
