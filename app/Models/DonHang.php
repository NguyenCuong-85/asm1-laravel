<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class DonHang extends Model
{
    protected $table = 'don_hangs';
    public function getAllDonHang()
    {
        $donHangs = DB::table($this->table)
            // ->join('san_phams', 'binh_luans.san_pham_id', '=', 'san_phams.id')
            ->join('users','binh_luans.user_id','=','users.id')
            ->select('binh_luans.*','users.name')
            ->get();
        return   $donHangs;
    }
    public function getDonHang($id)
    {
        $donHang =  DB::table('don_hangs')->where('id', $id)->first();
        return $donHang;
    }
    public function createDonHang($data)
    {
        DB::table($this->table)->insert([
            'trang_thai' => $data['trang_thai'],
                'user_id' => $data['user_id'],
                'tong_tien' => $data['tong_tien'],
                'created_at' => now(),
                'updated_at' => now(),
        ]);
    }
    public function updateDonHang($data, $id)
    {
        DB::table($this->table)
            ->where('id', $id)
            ->update([
                'trang_thai' => $data['trang_thai'],
                'user_id' => $data['user_id'],
                'tong_tien' => $data['tong_tien'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
    }
    public function deleteDonHang($id)
    { 
        // Xóa sản phẩm khỏi cơ sở dữ liệu
        DB::table($this->table)->where('id', $id)->delete();
    }
    use HasFactory;
    protected $fillable = [
        'trang_thai',
        'user_id',
        'tong_tien',
    ];
    // public function sanPham()
    // {
    //     return $this->belongsTo(SanPham::class);
    // }
    public function user(){
        return $this->belongsTo(User::class);
    }
}
