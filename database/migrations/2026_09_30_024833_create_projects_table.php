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
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->string('title');        // Contoh: CGOS
            $table->string('label')->default('PROJECT');
            $table->text('description');   // Deskripsi proyek
            $table->json('technologies');   // Mengimpan array tech (Laravel, PHP, MySQL)
            $table->string('image')->nullable(); // Opsional jika ada foto proyek
            $table->string('link')->nullable();  // Opsional jika ada link demo
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};
