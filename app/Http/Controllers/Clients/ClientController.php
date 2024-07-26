<?php

namespace App\Http\Controllers\Clients;

use App\Models\DanhMuc;
use App\Models\SanPham;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ClientController extends Controller
{
    public function home()
    {
        $san_phams = SanPham::query()->get();
        $danh_mucs = DanhMuc::query()->get();
        return view('welcome', compact('san_phams', 'danh_mucs'));
    }
    public function chiTietSanPham($id)
    {
        $san_pham = SanPham::findOrFail($id);
        return view('clients.chitietsanpham', compact('san_pham'));
    }
    public function userProfile()
    {
        return view('clients.thongTinNguoiDung');
    }
}
