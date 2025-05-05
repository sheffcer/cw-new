<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('news', function (Blueprint $table) {
            // Проверяем существует ли колонка перед её удалением
            if (Schema::hasColumn('news', 'title')) {
                $table->dropColumn('title');
            }

            if (Schema::hasColumn('news', 'description')) {
                $table->dropColumn('description');
            }

            if (Schema::hasColumn('news', 'content')) {
                $table->dropColumn('content');
            }
        });
    }

    public function down(): void
    {
        Schema::table('news', function (Blueprint $table) {
            // Проверяем отсутствие колонок перед их созданием
            if (!Schema::hasColumn('news', 'title')) {
                $table->string('title');
            }

            if (!Schema::hasColumn('news', 'description')) {
                $table->text('description');
            }

            if (!Schema::hasColumn('news', 'content')) {
                $table->text('content')->nullable();
            }
        });
    }
};
