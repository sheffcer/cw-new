<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('news', function (Blueprint $table) {
            $table->id();
            $table->date('date');
            $table->boolean('is_new')->default(false);
            $table->string('image_default')->nullable();
            $table->string('image_mobile')->nullable();
            $table->string('image_tablet')->nullable();
            $table->timestamps();
        });

    }

    public function down(): void
    {
        Schema::dropIfExists('news');
    }
};
