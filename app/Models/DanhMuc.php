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
    public function createDanhMuc($data){
        DB::table("danh_mucs")->create($data);
    }
    protected $fillable = [
        'ten_danh_muc',
        'trang_thai'
    ];
}
