<?php

namespace App\Http\Controllers\Admins;

use App\Http\Controllers\Controller;
use App\Models\BinhLuan;
use App\Models\SanPham;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use PHPUnit\Metadata\Uses;

class BinhLuanController extends Controller
{
    const PATH_VIEW = 'admins.binhluans.';
    protected $binh_luan;
    public function __construct(){
        $this->binh_luan = new BinhLuan();
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $data = $this->binh_luan->getAllBinhLuan();
        // return view(self::PATH_VIEW.__FUNCTION__,compact('data'));

    }

    /**
     * Show the form for creating a new resource.
     */
 

    /**
     * Store a newly created resource in storage.
     */


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     */


    /**
     * Update the specified resource in storage.
     */

}
