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
        Schema::create('confederations', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('acronym', 10);
            $table->string('continent');
            $table->string('logo')->nullable(); //ruta relativa en storage/app/public/logos
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('confederations');
    }
};
