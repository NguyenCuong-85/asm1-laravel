<?php

namespace App\Http\Controllers\Clients;

use App\Models\DanhMuc;
use App\Models\DonHang;
use App\Models\SanPham;
use Illuminate\Http\Request;
use App\Models\ChiTietDonHang;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Darryldecode\Cart\Facades\CartFacade as Cart;

class ClientController extends Controller
{
    protected $don_hang;
    public function __construct()
    {
        $this->don_hang = new DonHang();
    }
    public function home(Request $request)
    {
        $search = $request->input('search');

        $san_phams = SanPham::query()
            ->where('ten_san_pham', 'like', "%$search%")
            ->get();
        $danh_mucs = DanhMuc::query()->get();
        return view('welcome', compact('san_phams', 'danh_mucs'));
    }
    public function chiTietSanPham($id)
    {
        $danh_mucs = DanhMuc::query()->get();
        $san_pham = SanPham::findOrFail($id);
        $san_pham_lien_quans = SanPham::where('danh_muc_id', $san_pham->danh_muc_id)
            ->where('id', '!=', $san_pham->id)
            ->inRandomOrder()
            ->limit(6)
            ->get();
        return view('clients.chitietsanpham', compact('san_pham', 'danh_mucs', 'san_pham_lien_quans'));
    }
    public function userProfile()
    {
        // $don_hangs = DonHang::query()
        //     ->orderBy('id', 'DESC')
        //     ->get();
        $danh_mucs = DanhMuc::query()->get();
        return view('clients.profileUser.thongTinCaNhan', compact('danh_mucs'));
    }
    public function donHang()
    {
        $don_hangs = DonHang::query()
            ->orderBy('id', 'DESC')
            ->get();
        $danh_mucs = DanhMuc::query()->get();
        return view('clients.profileUser.donHang', compact('danh_mucs', 'don_hangs'));
    }
    public function editUser()
    {
        $danh_mucs = DanhMuc::query()->get();
        return view('clients.profileUser.capNhatNguoiDung', compact('danh_mucs'));
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
        // dd($request->all());
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
    public function danhMucSanPham(string $id)
    {
        $danh_mucs = DanhMuc::query()->get();
        $danh_muc = DanhMuc::query()->findOrFail($id);
        $san_phams = SanPham::query()
            ->where('danh_muc_id', $danh_muc->id)->get();
        return view('clients.sanPham', compact('danh_mucs', 'san_phams'));
    }
    public function updateUser(Request $request)
    {
        if ($request->isMethod('post')) {
            $data = $request->validate([
                'name' => 'required|string|max:255',
                'so_dien_thoai' => 'required|string|max:15',
                'email' => 'required|string|email|max:255|unique:users,email,' . Auth::id(),
                'dia_chi' => 'required|string|max:255',
            ]);
            $user = Auth::user();
            // dd($data);
            if ($request->hasFile('avatar')) {
                if ($user->avatar) {
                    Storage::disk('public')->delete($user->avatar);
                }
                // Lưu file hình ảnh mới
                $data['avatar'] = Storage::disk('public')->put('avatars', $request->file('avatar'));
            } else {
                $data['avatar'] = $user->avatar;
            }
            $data['updated_at'] = now();
            DB::table('users')->where('id', $user->id)->update($data);
            return redirect()->back()->with('success', 'Cập nhật thành công');
        }
    }
    public function chiTietDonHang(string $id)
    {
        $don_hang = DonHang::query()->findOrFail($id);
        $danh_mucs = DanhMuc::query()->get();
        $chi_tiet_don_hangs = ChiTietDonHang::query()
            ->join('san_phams', 'san_phams.id', '=', 'chi_tiet_don_hangs.san_pham_id')
            ->where('don_hang_id', $don_hang->id)
            ->select(
                'chi_tiet_don_hangs.*',
                'san_phams.*',
                'chi_tiet_don_hangs.so_luong as so_luong_ctdh', // Alias cho cột so_luong của chi_tiet_don_hangs
                'san_phams.so_luong as so_luong_sp', // Alias cho cột so_luong của san_phams
                'chi_tiet_don_hangs.gia as gia_ctdh', // Alias cho cột gia của chi_tiet_don_hangs
                'san_phams.gia as gia_sp' // Alias cho cột gia của san_phams
            )

            ->get();
        return view('clients.profileUser.chiTietDonHang', compact('danh_mucs', 'don_hang', 'chi_tiet_don_hangs'));
    }
    public function huyDonhang(string $id)
    {
        $don_hang = DonHang::query()->findOrFail($id);
        if ($don_hang->trang_thai === 'đang vận chuyển' || $don_hang->trang_thai === 'đang nhận') {
            return redirect()->back()->with('success', 'Đơn Hàng Đã vận Chuyển Không Được Hủy!');
        } else if ($don_hang->trang_thai === 'đã hủy') {
            return redirect()->back()->with('success', 'Đơn Hàng Đã Được Hủy Rồi!');
        } else {
            $don_hang->trang_thai = 'đã hủy';
            $don_hang->updated_at = now();
            $don_hang->save();
            return redirect()->back()->with('success', 'Hủy Đơn Hàng Thành Công!');
        }
    }
}
