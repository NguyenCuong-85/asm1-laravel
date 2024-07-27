<?php

namespace App\Http\Controllers\Admins;

use App\Models\DonHang;
use App\Http\Requests\StoreDonHangRequest;
use App\Http\Requests\UpdateDonHangRequest;
use App\Http\Controllers\Controller;

class DonHangController extends Controller
{
    const PATH_VIEW = 'admins.donhangs.';
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = DonHang::query()->get();
        return view(self::PATH_VIEW.__FUNCTION__, compact('data'));
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
    public function show(DonHang $donHang)
    {
        //
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
    public function update(UpdateDonHangRequest $request, DonHang $donHang)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DonHang $donHang)
    {
        //
    }
}
