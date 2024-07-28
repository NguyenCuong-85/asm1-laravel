<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class BinhLuan extends Model
{
    // protected $table = 'binh_luans';
    // public function getAllBinhLuan()
    // {
    //     $binhLuans = DB::table($this->table)
    //         ->join('san_phams', 'binh_luans.san_pham_id', '=', 'san_phams.id')
    //         ->join('users','binh_luans.user_id','=','users.id')
    //         ->select('binh_luans.*', 'san_phams.ten_san_pham','users.name')
    //         ->get();
    //     return $binhLuans;
    // }

    use HasFactory;
    protected $fillable = [
        'noi_dung',
        'thoi_gian',
        'trang_thai',
        'user_id',
        'san_pham_id',
    ];
    public function sanPham()
    {
        return $this->belongsTo(SanPham::class);
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
}
