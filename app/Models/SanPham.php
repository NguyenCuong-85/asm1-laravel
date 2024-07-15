<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
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
        DB::table($this->table)
            ->where('id', $id)
            ->update([
                'ten_danh_muc' => $data->ten_danh_muc,
                'trang_thai' => $data->trang_thai,
                'updated_at' => now(),
            ]);
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
