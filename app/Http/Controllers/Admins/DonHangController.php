<?php

namespace App\Http\Controllers\Admins;

use App\Http\Controllers\Controller;
use App\Models\DonHang;
use App\Models\User;
use Illuminate\Http\Request;

class DonHangController extends Controller
{
      const PATH_VIEW = 'admins.donhangs.';
    protected $don_hang;
    public function __construct()
    {
        $this->don_hang = new DonHang();
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $order = DonHang::query()->get();
        return view(self::PATH_VIEW . __FUNCTION__, compact('order'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $data = User::query()->get();
        // dd($data);
        return view(self::PATH_VIEW . __FUNCTION__, compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        if ($request->isMethod('POST')) {
            $data = $request->except('_token');
            // dd($data);
            $this->don_hang->create($data);
           
            return redirect()->back()->with('success', 'Thêm Đơn Hàng Thành Công!');
          
        }
          
        
        
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $data = $this->don_hang->getDonHang($id);

       
        $user = User::query()->get();


        return view(self::PATH_VIEW.__FUNCTION__,compact('user','data',));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $this->don_hang->updateDonHang( $request,$id);
        return redirect()->back()->with('success', 'Cập Nhật đơn hàng Thành Công!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $this->don_hang->deleteDonHang($id);
        return redirect()->back()->with('success', 'Xóa Đơn Hàng Thành Công!');
    }
}
