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
        Schema::create('rental_service', function (Blueprint $table) {
            $table->unsignedBigInteger("rental_id");
            $table->unsignedBigInteger("service_id");
            $table->unsignedDecimal("price");
            $table->timestamps();
            $table->foreign("rental_id")->references("id")->on("rental");
            $table->foreign("service_id")->references("id")->on("service");
            $table->softDeletesTz();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rental_service');
    }
};
