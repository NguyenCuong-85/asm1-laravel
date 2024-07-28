<?php

use App\Http\Controllers\Admins\BinhLuanController;
use App\Http\Controllers\Admins\ChucVuController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admins\DanhMucController;
use App\Http\Controllers\Admins\DonHangController;
use App\Http\Controllers\Admins\SanPhamController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::resource('danhmucs',DanhMucController::class);
Route::resource('sanphams',SanPhamController::class);

Route::resource('chucvus',ChucVuController::class);

Route::resource('binhluans',BinhLuanController::class);

Route::resource('donhangs',DonHangController::class);

