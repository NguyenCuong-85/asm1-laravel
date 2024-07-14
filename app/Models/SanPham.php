<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SanPham extends Model
{
    use HasFactory;
    protected $fillable = [
        'ten_san_pham',
        'ma_san_pham',
        'hinh_anh',
        'mo_ta',
        'gia',
        'so_luong',
        'ngay_san_xuat',
        'trang_thai',
        'danh_muc_id',
    ];
    public function danhMuc()
    {
        return $this->belongsTo(DanhMuc::class);
    }
}
