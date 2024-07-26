<?php

namespace App\Http\Controllers\Clients;

use Darryldecode\Cart\Facades\CartFacade as Cart;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CartController extends Controller
{
    public function addToCart(Request $request)
    {
        Cart::add(array(
            'id' => $request->id,
            'name' => $request->name,
            'price' => $request->price,
            'hinh_anh' => $request->hinh_anh,
            'quantity' => 1,
            'attributes' => array()
        ));
        // dd($request->all());
        return response()->json(['success' => 'Product added to cart']);
    }

    public function showCart()
    {
        $cartItems = Cart::getContent();
        // dd($cartItems);
        return view('clients.gioHang', compact('cartItems'));
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

        return response()->json([
            'success' => 'Cart updated',
            'item' => $cartItem,
            'itemTotal' => $cartItem->getPriceSum(),
            'cartTotal' => Cart::getTotal()
        ]);
    }
    public function removeFromCart(Request $request)
    {
        Cart::remove($request->id);

        return response()->json([
            'success' => 'Product removed from cart',
            'cartTotal' => Cart::getTotal()
        ]);
    }
}
