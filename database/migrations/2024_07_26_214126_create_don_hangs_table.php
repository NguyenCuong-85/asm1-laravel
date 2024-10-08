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
        Schema::create('don_hangs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('ten_nguoi_nhan');
            $table->string('email_nguoi_nhan')->nullable();
            $table->string('so_dien_thoai_nguoi_nhan');
            $table->string('dia_chi_nguoi_nhan');
            $table->text('ghi_chu')->nullable();
            $table->enum('phuong_thuc_thanh_toan',['Sip COD','Internet banking']);
            $table->decimal('tong_tien', 12, 2);
            $table->enum('trang_thai', ['đang chờ vận chuyển', 'đang vận chuyển', 'đã nhận', 'đã hủy'])->default('đang chờ vận chuyển');
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('don_hangs');
    }
};
