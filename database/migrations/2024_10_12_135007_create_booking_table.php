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
        Schema::create('booking', function (Blueprint $table) {
            $table->id(); // Cột id tự động tăng
            $table->string('service_id'); // Cột khóa ngoại từ bảng services
            $table->unsignedBigInteger('user_id'); // Cột khóa ngoại từ bảng users
            $table->unsignedBigInteger('package_id'); // Cột khóa ngoại từ bảng packages
            $table->string('message');
            $table->datetime('appointment_datetime'); // Cột ngày và giờ hẹn
            $table->string('status')->default('pending'); // Cột trạng thái, mặc định là "pending"

            // Thiết lập khóa ngoại cho service_id và user_id
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('package_id')->references('id')->on('packages')->onDelete('cascade'); // Giả sử bảng packages tồn tại


            $table->timestamps(); // Cột created_at và updated_at tự động
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('booking');
    }
};
