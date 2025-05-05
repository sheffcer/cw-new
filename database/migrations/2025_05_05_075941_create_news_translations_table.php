<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('news_translations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('news_id')->constrained()->onDelete('cascade');
            $table->string('locale', 2); // ru, en, etc.
            $table->string('title');
            $table->text('description');
            $table->text('content')->nullable();

            // Создаем уникальный ключ для комбинации news_id и locale
            $table->unique(['news_id', 'locale']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('news_translations');
    }
};
