<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // Jika tabel reviews belum ada sama sekali, buat dari awal
        if (!Schema::hasTable('reviews')) {
            Schema::create('reviews', function (Blueprint $table) {
                $table->id();
                $table->foreignId('order_id')->constrained()->cascadeOnDelete();
                $table->foreignId('user_id')->constrained()->cascadeOnDelete();
                $table->foreignId('product_id')->constrained()->cascadeOnDelete();
                $table->tinyInteger('rating')->unsigned();
                $table->text('comment')->nullable();
                $table->boolean('is_approved')->default(true);
                $table->timestamps();

                $table->unique(['order_id', 'user_id', 'product_id']);
            });
            return;
        }

        // Jika tabel sudah ada tapi kolom-kolom belum lengkap, tambahkan satu per satu
        Schema::table('reviews', function (Blueprint $table) {
            if (!Schema::hasColumn('reviews', 'order_id')) {
                $table->foreignId('order_id')->after('id')->constrained()->cascadeOnDelete();
            }
            if (!Schema::hasColumn('reviews', 'user_id')) {
                $table->foreignId('user_id')->after('order_id')->constrained()->cascadeOnDelete();
            }
            if (!Schema::hasColumn('reviews', 'product_id')) {
                $table->foreignId('product_id')->after('user_id')->constrained()->cascadeOnDelete();
            }
            if (!Schema::hasColumn('reviews', 'rating')) {
                $table->tinyInteger('rating')->unsigned()->after('product_id');
            }
            if (!Schema::hasColumn('reviews', 'comment')) {
                $table->text('comment')->nullable()->after('rating');
            }
            if (!Schema::hasColumn('reviews', 'is_approved')) {
                $table->boolean('is_approved')->default(true)->after('comment');
            }
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('reviews');
    }
};