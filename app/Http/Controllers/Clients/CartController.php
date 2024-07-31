<?php

namespace App\Http\Controllers\Clients;

use Darryldecode\Cart\Facades\CartFacade as Cart;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\DanhMuc;

class CartController extends Controller
{
    public function addToCart(Request $request)
    {
        Cart::add(array(
            'id' => $request->id,
            'name' => $request->name,
            'price' => $request->price,
            'image' => $request->image,
            'quantity' => 1,
            'attributes' => array()
        ));
        $cartCount = Cart::getContent()->count();

        return response()->json(['success' => 'Product added to cart', 'cartCount' => $cartCount]);
    }

    public function showCart()
    {
        $cartItems = Cart::getContent();
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
