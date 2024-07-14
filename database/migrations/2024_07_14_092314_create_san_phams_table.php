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
        Schema::create('san_phams', function (Blueprint $table) {
            $table->id();
            $table->string('ten_san_pham'); 
            $table->string('ma_san_pham')->unique();
            $table->string('hinh_anh')->nullable();
            $table->text('mo_ta')->nullable(); 
            $table->decimal('gia', 8, 2);
            $table->integer('so_luong'); 
            $table->date('ngay_san_xuat')->nullable();
            $table->boolean('trang_thai')->default(true); // Trạng thái ẩn hiện
            $table->unsignedBigInteger('danh_muc_id'); // Khóa ngoại đến bảng danh mục
            $table->timestamps();

            // Định nghĩa khóa ngoại
            $table->foreign('danh_muc_id')->references('id')->on('danh_mucs')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('san_phams');
    }
};
