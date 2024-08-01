<?php

namespace App\Http\Controllers\Clients;

use App\Models\DanhMuc;
use App\Models\SanPham;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Darryldecode\Cart\Facades\CartFacade as Cart;

class CartController extends Controller
{
    public function addToCart(Request $request)
    {
        $san_pham = SanPham::findOrFail($request->id);
        Cart::add(array(
            'id' => $san_pham->id,
            'name' => $san_pham->ten_san_pham,
            'price' => $san_pham->gia,
            'quantity' => 1,
            'attributes' => array(
                'image' => $san_pham->hinh_anh,
            )
        ));
        $cartCount = Cart::getContent()->count();

        return response()->json(['success' => 'Product added to cart', 'cartCount' => $cartCount]);
    }

    public function showCart()
    {
        // dd(Cart::getContent());
        $cartItems = Cart::getContent();
        // $id = $cartItems->pluck('id')->toArray();
        // $cartItems = SanPham::whereIn('id', $id)->get();
        $danh_mucs = DanhMuc::query()->get();
        if ($cartItems->isEmpty()) {
            return view('clients.gioHang', compact('danh_mucs'));
        } else {
            return view('clients.gioHang', compact('cartItems', 'danh_mucs'));
        }
    }
    public function updateCart(Request $request)
    {
        Cart::update($request->id, array(
            'quantity' => array(
                'relative' => false,
                'value' => $request->quantity
            ),
        ));

        $cartItem = Cart::get($request->id);
        $cartCount = Cart::getContent()->count();
        return response()->json([
            'success' => 'Cart updated',
            'item' => $cartItem,
            'itemTotal' => $cartItem->getPriceSum(),
            'cartTotal' => Cart::getTotal(),
            'cartCount' => $cartCount,
        ]);
    }
    public function removeFromCart(Request $request)
    {
        Cart::remove($request->id);
        $cartIsEmpty = Cart::isEmpty();
        $cartCount = Cart::getContent()->count();

        return response()->json([
            'success' => 'Product removed from cart',
            'cartTotal' => Cart::getTotal(),
            'cartIsEmpty' => $cartIsEmpty,
            'cartCount' => $cartCount
        ]);
    }
}
