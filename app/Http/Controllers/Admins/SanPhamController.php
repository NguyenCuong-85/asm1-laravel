<?php

namespace App\Http\Controllers\Admins;

use App\Models\DanhMuc;
use App\Models\SanPham;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

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
        return view(self::PATH_VIEW . __FUNCTION__,compact('data'));
    }
     
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if ($request->isMethod('POST')) {
            $data = $request->except('_token');
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
        return view(self::PATH_VIEW . __FUNCTION__,compact('danhMucs','data'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = $this->san_pham->getSanPham($id);
        $danhMucs = DanhMuc::query()->get();
        return view(self::PATH_VIEW . __FUNCTION__,compact('danhMucs','data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
