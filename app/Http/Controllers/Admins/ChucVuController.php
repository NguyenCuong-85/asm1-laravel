<?php

namespace App\Http\Controllers\Admins;

use App\Http\Controllers\Controller;
use App\Models\ChucVu;
use Illuminate\Http\Request;

class ChucVuController extends Controller
{
    const PATH_VIEW = 'admins.chucvus.';
    protected $chuc_vu;
    public function __construct(){
        $this->chuc_vu = new ChucVu();
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
         $chuc_vus = ChucVu::all();
         return view(self::PATH_VIEW.__FUNCTION__,compact('chuc_vus'));

    }
}
