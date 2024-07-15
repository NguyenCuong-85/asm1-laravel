<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DanhMuc extends Model
{
    use HasFactory;
    public function getAllDanhMuc()
    {
        $danhMucs =  DB::table('danh_mucs')->get();
        return $danhMucs;
    }
    public function getDanhMuc($id)
    {
        $danhMucs =  DB::table('danh_mucs')->where('id', $id)->first();
        return $danhMucs;
    }
    public function deleteDanhMuc($id)
    {
        DB::table('danh_mucs')->where('id', $id)->delete();
    }
    public function createDanhMuc($data)
    {
        DB::table("danh_mucs")->insert([

            'ten_danh_muc' => $data['ten_danh_muc'],
            'trang_thai' => $data['trang_thai'],
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
    public function updateDanhMuc($data, $id)
    {
        DB::table('danh_mucs')
            ->where('id', $id)
            ->update([
                'ten_danh_muc' => $data->ten_danh_muc,
                'trang_thai' => $data->trang_thai,
                'updated_at' => now(),
            ]);
    }
    protected $fillable = [
        'ten_danh_muc',
        'trang_thai'
    ];
}
