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
        Schema::create('order', function (Blueprint $table) {
            $table->id(); // Cột id tự động tăng
            $table->string('madh'); // Cột mã đơn hàng
            $table->unsignedBigInteger('user_id'); // Cột khóa ngoại từ bảng users
            $table->string('name'); // Tên người đặt hàng
            $table->string('email'); // Email người đặt hàng
            $table->string('phone'); // Số điện thoại người đặt hàng
            $table->string('address'); // Địa chỉ người đặt hàng
            $table->string('status')->default('pending'); // Trạng thái đơn hàng, mặc định là "pending"
            $table->decimal('total', 10, 2); // Tổng giá trị đơn hàng, với 10 số và 2 số thập phân

            // Thiết lập khóa ngoại cho user_id
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

            $table->timestamps(); // Cột created_at và updated_at tự động
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order');
    }
};
