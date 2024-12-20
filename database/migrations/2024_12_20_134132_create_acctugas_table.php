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
        Schema::create('acctugas', function (Blueprint $table) {
            $table->id();
            $table->string('picker');
            $table->string('title');
            $table->string('description');
            $table->integer('reward');
            $table->integer('kasir_job')->nullable();
            $table->string('kurir_job')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('acctugas');
    }
};
