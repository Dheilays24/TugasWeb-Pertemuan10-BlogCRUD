<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();

            // Judul artikel
            $table->string('title');

            // Isi artikel
            $table->text('content');

            // Nama file gambar, boleh kosong
            $table->string('image')->nullable();

            // Untuk fitur soft delete
            $table->softDeletes();

            // created_at dan updated_at
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};