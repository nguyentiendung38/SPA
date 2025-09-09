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
        Schema::create('cart', function (Blueprint $table) {
            $table->id(); // Cột id tự động tăng
            $table->unsignedBigInteger('user_id'); // Cột khóa ngoại từ bảng users

            // Thiết lập khóa ngoại cho product_id và user_id
           
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

            $table->timestamps(); // Cột created_at và updated_at tự động
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cart');
    }
};
