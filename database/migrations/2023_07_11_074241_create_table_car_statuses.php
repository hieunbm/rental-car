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
        Schema::create('car_statuses', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("rental_id");
            $table->text("note")->nullable();
            $table->string("thumbnail_1");
            $table->string("thumbnail_2");
            $table->timestamps();
            $table->foreign("rental_id")->references("id")->on("rental");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('car_statuses');
    }
};
