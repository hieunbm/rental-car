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
        Schema::create('carReview', function (Blueprint $table) {
            $table->id();
            $table->text("message");
            $table->unsignedBigInteger("score");
            $table->unsignedBigInteger("customer_id");
            $table->unsignedBigInteger("car_id");
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
        Schema::dropIfExists('carReview');
    }
};
