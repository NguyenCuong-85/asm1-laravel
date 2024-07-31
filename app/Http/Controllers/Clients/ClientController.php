<?php

namespace App\Http\Controllers\Clients;

use App\Models\DanhMuc;
use App\Models\DonHang;
use App\Models\SanPham;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Darryldecode\Cart\Facades\CartFacade as Cart;

class ClientController extends Controller
{
    protected $don_hang;
    public function __construct()
    {
        $this->don_hang = new DonHang();
    }
    public function home()
    {
        // $cartCount = Cart::getContent()->count();
        $san_phams = SanPham::query()->get();
        $danh_mucs = DanhMuc::query()->get();
        return view('welcome', compact('san_phams', 'danh_mucs'));
    }
    public function chiTietSanPham($id)
    {
        $danh_mucs = DanhMuc::query()->get();
        $san_pham = SanPham::findOrFail($id);
        return view('clients.chitietsanpham', compact('san_pham', 'danh_mucs'));
    }
    public function userProfile()
    {
        $don_hangs = DonHang::query()
            ->orderBy('id', 'DESC')
            ->get();
        $danh_mucs = DanhMuc::query()->get();
        return view('clients.thongTinNguoiDung', compact('danh_mucs', 'don_hangs'));
    }
    public function about()
    {
        $san_phams = SanPham::query()->get();
        $danh_mucs = DanhMuc::query()->get();
        return view('clients.about', compact('san_phams', 'danh_mucs'));
    }

    public function blog()
    {
        $san_phams = SanPham::query()->get();
        $danh_mucs = DanhMuc::query()->get();
        return view('clients.blog', compact('san_phams', 'danh_mucs'));
    }

    public function contact()
    {
        $san_phams = SanPham::query()->get();
        $danh_mucs = DanhMuc::query()->get();
        return view('clients.contact', compact('san_phams', 'danh_mucs'));
    }
    public function showFormCheckOut(Request $request)
    {
        if ($request->isMethod('post')) {
            $danh_mucs = DanhMuc::query()->get();
            $cartItems = Cart::getContent();
            return view('clients.thanhToan', compact('danh_mucs', 'cartItems'));
        }
    }
    public function checkOut(Request $request)
    {
        if ($request->isMethod('post')) {
            // dd($request->all());
            $danh_mucs = DanhMuc::query()->get();
            $cartItems = Cart::getContent();
            // dd($cartItems);
            $donHangId =  DB::table('don_hangs')->insertGetId([
                'user_id' => Auth::user()->id,
                'ten_nguoi_nhan' => $request->ten_nguoi_nhan,
                'email_nguoi_nhan' => $request->email_nguoi_nhan,
                'so_dien_thoai_nguoi_nhan' => $request->so_dien_thoai_nguoi_nhan,
                'dia_chi_nguoi_nhan' => $request->dia_chi_nguoi_nhan,
                'ghi_chu' => $request->ghi_chu,
                'phuong_thuc_thanh_toan' => $request->phuong_thuc_thanh_toan,
                'tong_tien' => Cart::getTotal(),
                'created_at' => now(),
                'updated_at' => now()
            ]);
            foreach ($cartItems as $key => $value) {
                DB::table('chi_tiet_don_hangs')->insert([
                    'don_hang_id' => $donHangId,
                    'san_pham_id' => $value->id,
                    'so_luong' => $value->quantity,
                    'gia' => $value->price,
                    'thanh_tien' => $value->getPriceSum(),
                    'created_at' => now(),
                    'updated_at' => now()
                ]);
                DB::table('san_phams')
                    ->where('id', $value->id)
                    ->decrement('so_luong', $value->quantity);
            }
            Cart::clear();
            return view('clients.datHang', compact('danh_mucs'));
        }
    }
}
