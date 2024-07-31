<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Clients\CartController;
use App\Http\Controllers\Admins\DanhMucController;
use App\Http\Controllers\Admins\DonHangController;
use App\Http\Controllers\Admins\SanPhamController;
use App\Http\Controllers\Clients\ClientController;

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

Route::middleware('auth')->prefix('admin')->group(function () {
    Route::resource('danhmucs', DanhMucController::class);
    Route::resource('sanphams', SanPhamController::class);
    Route::resource('donhangs', DonHangController::class);
});
Route::middleware('auth')->group(function () {
    Route::get('/user-profile', [ClientController::class, 'userProfile'])->name('user-profile');
    Route::post('/proceed-to-checkout', [ClientController::class, 'showFormCheckOut'])->name('proceedToCheckout');
    Route::post('/checkout', [ClientController::class, 'checkOut'])->name('checkOut');

});
Route::get('/', [ClientController::class, 'home'])->name('welcome');
Route::get('/about', [ClientController::class, 'about'])->name('about');
Route::get('/blog', [ClientController::class, 'blog'])->name('blog');
Route::get('/contact', [ClientController::class, 'contact'])->name('contact');
Route::get('/chitietsanpham/{id}', [ClientController::class, 'chiTietSanPham'])->name('chitietsanpham');

Route::post('/add-to-cart', [CartController::class, 'addToCart'])->name('add.to.cart');
Route::post('/update-cart', [CartController::class, 'updateCart'])->name('update.cart');
Route::get('/cart', [CartController::class, 'showCart'])->name('cart');
Route::post('/remove-from-cart', [CartController::class, 'removeFromCart'])->name('remove.from.cart');

Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
