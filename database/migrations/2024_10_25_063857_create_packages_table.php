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
        Schema::create('packages', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('service_id'); // Khóa ngoại từ bảng service
            $table->string('package_name'); // Tên gói dịch vụ
            $table->text('description'); // Mô tả gói dịch vụ
            $table->decimal('price', 10, 2); // Giá gói dịch vụ
            $table->timestamps();

            // Khóa ngoại
            $table->foreign('service_id')->references('id')->on('service')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('packages');
    }
};
