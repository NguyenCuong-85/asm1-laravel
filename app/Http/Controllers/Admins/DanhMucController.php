<?php

namespace App\Http\Controllers\Admins;

use App\Models\DanhMuc;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DanhMucController extends Controller
{
    const PATH_VIEW = 'admins.danhmucs.';
    protected $danh_muc;
    public function __construct(){
        $this->danh_muc = new DanhMuc();
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $danh_mucs = $this->danh_muc->getAllDanhMuc();
        return view(self::PATH_VIEW.__FUNCTION__,compact('danh_mucs'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view(self::PATH_VIEW.__FUNCTION__);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if ($request->isMethod('POST')) {
            // $data = $request->except('_token');
            // $this->danh_muc->insert($data);
            DanhMuc::create($request->all());
            return redirect()->back()->with('success', 'Thêm Danh Mục Thành Công!');
        }

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = DanhMuc::query()->findOrFail($id);
        return view(self::PATH_VIEW.__FUNCTION__,compact('data'));

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = DanhMuc::query()->findOrFail($id);
        return view(self::PATH_VIEW.__FUNCTION__,compact('data'));
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
        $data = DanhMuc::query()->findOrFail($id);
        $data->delete();
        return redirect()->back()->with('success', 'Xóa Danh Mục Thành Công!');
    }
}
