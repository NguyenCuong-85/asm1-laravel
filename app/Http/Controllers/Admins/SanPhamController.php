<?php

namespace App\Http\Controllers\Admins;

use App\Models\DanhMuc;
use App\Models\SanPham;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\SanPhamRequest;
use Illuminate\Support\Facades\Storage;

class SanPhamController extends Controller
{
    const PATH_VIEW = 'admins.sanphams.';
    protected $san_pham;
    public function __construct()
    {
        $this->san_pham = new SanPham();
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = $this->san_pham->getAllSanPham();
        return view(self::PATH_VIEW . __FUNCTION__, compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data = DanhMuc::query()->get();
        // dd($data);
        return view(self::PATH_VIEW . __FUNCTION__, compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SanPhamRequest $request)
    {
        if ($request->isMethod('POST')) {
            $data = $request->except('_token');
            // Thêm hình ảnh
            if ($request->hasFile('hinh_anh')) {
                // Thêm hình ảnh
                $filename = $request->file('hinh_anh')->store('uploads/sanpham', 'public');
            } else {
                $filename = null;
            }

            $data['hinh_anh'] = $filename;
            $this->san_pham->createSanPham($data);
            return redirect()->back()->with('success', 'Thêm Sản Phẩm Thành Công!');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = $this->san_pham->getSanPham($id);
        $danhMucs = DanhMuc::query()->get();
        return view(self::PATH_VIEW . __FUNCTION__, compact('danhMucs', 'data'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = $this->san_pham->getSanPham($id);
        $danhMucs = DanhMuc::query()->get();
        return view(self::PATH_VIEW . __FUNCTION__, compact('danhMucs', 'data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Lấy tất cả dữ liệu từ request trừ _token
        $data = $request->except('_token');
        // Lấy sản phẩm hiện tại
        $sanPham = $this->san_pham->getSanPham($id);
        // Kiểm tra nếu có file hình ảnh mới được tải lên
        if ($request->hasFile('hinh_anh')) {
            if ($sanPham->hinh_anh) {
                Storage::disk('public')->delete($sanPham->hinh_anh);
            }
            // Lưu file hình ảnh mới
            $filename = $request->file('hinh_anh')->store('uploads/sanpham', 'public');
            $data['hinh_anh'] = $filename;
        } else {
            $data['hinh_anh'] = $sanPham->hinh_anh;
        }

        // Cập nhật sản phẩm
        $this->san_pham->updateSanPham($data, $id);

        return redirect()->back()->with('success', 'Cập Nhật Sản Phẩm Thành Công!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Lấy thông tin sản phẩm hiện tại
        $sanPham = $this->san_pham->getSanPham($id);
        // Nếu sản phẩm có hình ảnh, xóa hình ảnh khỏi thư mục lưu trữ
        if ($sanPham && $sanPham->hinh_anh) {
            Storage::disk('public')->delete($sanPham->hinh_anh);
        }
        $this->san_pham->deleteSanPham($id);
        return redirect()->back()->with('success', 'Xóa Sản Phẩm Thành Công!');
    }
}
