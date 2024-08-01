<?php

namespace App\Http\Controllers\Admins;

use App\Models\DonHang;
use App\Models\ChiTietDonHang;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreDonHangRequest;
use App\Http\Requests\UpdateDonHangRequest;

class DonHangController extends Controller
{
    const PATH_VIEW = 'admins.donhangs.';
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = DonHang::query()->get();
        return view(self::PATH_VIEW . __FUNCTION__, compact('data'));
        // dd(self::PATH_VIEW.__FUNCTION__);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreDonHangRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(DonHang $donhang)
    {
        $san_phams = ChiTietDonHang::query()
            ->join('san_phams', 'chi_tiet_don_hangs.san_pham_id', '=', 'san_phams.id')
            ->where('chi_tiet_don_hangs.don_hang_id', $donhang->id)
            ->select(
                'chi_tiet_don_hangs.*',
                'san_phams.*',
                'chi_tiet_don_hangs.so_luong as so_luong_ctdh', // Alias cho cột so_luong của chi_tiet_don_hangs
                'san_phams.so_luong as so_luong_sp', // Alias cho cột so_luong của san_phams
                'chi_tiet_don_hangs.gia as gia_ctdh', // Alias cho cột gia của chi_tiet_don_hangs
                'san_phams.gia as gia_sp' // Alias cho cột gia của san_phams
            )
            ->get();
        // dd($san_phams);
        return view(self::PATH_VIEW . __FUNCTION__, compact('donhang', 'san_phams'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(DonHang $donHang)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateDonHangRequest $request, DonHang $donhang)
    {
        if ($request->isMethod('PUT')) {
            // dd($request->trang_thai);
            $donhang->update([
                'trang_thai' => $request->trang_thai,
            ]);
            return redirect()->back()->with('success', 'Cập nhật thành công');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DonHang $donhang)
    {
        // dd($donHang);
        $donhang->delete();
        return redirect()->route('donhangs.index')->with('success', 'Xóa đơn hàng thành công!');
    }
}
