<?php

namespace App\Http\Controllers\Admins;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class NguoiDungController extends Controller
{
    public function index(){
        $users = User::query()->get();
        return view('admins.nguoidungs.index', compact('users'));
    }
}
