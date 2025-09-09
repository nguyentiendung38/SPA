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
        Schema::create('products', function (Blueprint $table) {
            $table->id(); // Cột id tự động tăng
            $table->string('name'); // Cột tên sản phẩm
            $table->text('description'); // Cột mô tả sản phẩm
            $table->decimal('price', 10, 2); // Cột giá sản phẩm, với 10 số và 2 số thập phân
            $table->string('image'); // Cột đường dẫn hình ảnh
            $table->integer('sold')->default(0); // Cột số lượng bán, mặc định là 0
            $table->integer('view')->default(0); // Cột số lượt xem, mặc định là 0
            $table->unsignedBigInteger('category_id'); // Cột khóa ngoại từ bảng category_products

            // Thiết lập khóa ngoại cho category_id
            $table->foreign('category_id')->references('id')->on('category_products')->onDelete('cascade');

            $table->timestamps(); // Cột created_at và updated_at tự động
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
