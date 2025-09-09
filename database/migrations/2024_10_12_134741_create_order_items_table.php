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
        Schema::create('order_items', function (Blueprint $table) {
            $table->id(); // Cột id tự động tăng
            $table->unsignedBigInteger('product_id'); // Cột khóa ngoại từ bảng products
            $table->unsignedBigInteger('order_id'); // Cột khóa ngoại từ bảng orders
            $table->decimal('price', 10, 2); // Cột giá sản phẩm tại thời điểm đặt hàng
            $table->integer('quantity'); // Cột số lượng sản phẩm

            // Thiết lập khóa ngoại cho product_id và order_id
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
            $table->foreign('order_id')->references('id')->on('order')->onDelete('cascade');

            $table->timestamps(); // Cột created_at và updated_at tự động
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order_items');
    }
};
