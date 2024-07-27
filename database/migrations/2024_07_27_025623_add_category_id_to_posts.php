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
        Schema::table('posts', function (Blueprint $table) {
            //建立關聯資料表

            // 方法一
            $table->foreignId('category_id')->constrained()->onDelete('cascade');
            // $table->foreignId('category_id')->constrained()->nullOnDelete();
            // $table->foreignId('category_id')->constrained()->restrictOnDelete();
            // $table->foreignId('category_id')->constrained()->cascadeOnDelete();

            // 方法二
            // $table->unsignedBigInteger('category_id')->after('title')->nullable();
            // $table->foreign('category_id')->references('id')->on('categories');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('posts', function (Blueprint $table) {
            //
        });
    }
};
