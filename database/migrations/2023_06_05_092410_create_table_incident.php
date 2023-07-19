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
        Schema::create('incident', function (Blueprint $table) {
            $table->id();
            $table->string("title");
            $table->unsignedBigInteger("rental_id");
            $table->string("thumbnail");
            $table->text("description");
            $table->unsignedDecimal("expense");
            $table->timestamps();
            $table->foreign("rental_id")->references("id")->on("rental");
            $table->softDeletesTz();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('incident');
    }
};
