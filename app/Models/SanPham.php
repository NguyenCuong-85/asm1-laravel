<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SanPham extends Model
{
    protected $table = 'san_phams';
    public function getAllSanPham()
    {
        $sanPhams = DB::table($this->table)
            ->join('danh_mucs', 'san_phams.danh_muc_id', '=', 'danh_mucs.id')
            ->select('san_phams.*', 'danh_mucs.ten_danh_muc')
            ->get();
        return $sanPhams;
    }
    public function getSanPham($id)
    {
        $sanPham =  DB::table('san_phams')->where('id', $id)->first();
        return $sanPham;
    }
    public function createSanPham($data)
    {
        DB::table($this->table)->insert([
            'ma_san_pham' => $data['ma_san_pham'],
            'ten_san_pham' => $data['ten_san_pham'],
            'hinh_anh' => $data['hinh_anh'],
            'so_luong' => $data['so_luong'],
            'gia' => $data['gia'],
            'mo_ta' => $data['mo_ta'],
            'ngay_san_xuat' => $data['ngay_san_xuat'],
            'trang_thai' => $data['trang_thai'],
            'danh_muc_id' => $data['danh_muc_id'],
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
    public function updateSanPham($data, $id)
    {
        // Lấy sản phẩm hiện tại
        $sanPham = DB::table($this->table)->where('id', $id)->first();

        // Kiểm tra nếu không có hình ảnh mới được tải lên, giữ lại hình ảnh cũ
        if (empty($data['hinh_anh'])) {
            $data['hinh_anh'] = $sanPham->hinh_anh;
        }

        DB::table($this->table)
            ->where('id', $id)
            ->update([
                'ma_san_pham' => $data['ma_san_pham'],
                'ten_san_pham' => $data['ten_san_pham'],
                'hinh_anh' => $data['hinh_anh'],
                'so_luong' => $data['so_luong'],
                'gia' => $data['gia'],
                'mo_ta' => $data['mo_ta'],
                'ngay_san_xuat' => $data['ngay_san_xuat'],
                'trang_thai' => $data['trang_thai'],
                'danh_muc_id' => $data['danh_muc_id'],
                'updated_at' => now()
            ]);
    }
    public function deleteSanPham($id)
    {
        // Lấy thông tin sản phẩm hiện tại
        $sanPham = DB::table($this->table)->where('id', $id)->first();

        // Xóa sản phẩm khỏi cơ sở dữ liệu
        DB::table($this->table)->where('id', $id)->delete();

        // Nếu sản phẩm có hình ảnh, xóa hình ảnh khỏi thư mục lưu trữ
        if ($sanPham && $sanPham->hinh_anh) {
            Storage::disk('public')->delete($sanPham->hinh_anh);
        }
    }
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
