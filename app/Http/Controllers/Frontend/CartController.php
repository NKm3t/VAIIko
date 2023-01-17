<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Product;
use http\Client\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    /**
     * Prida produkt do kosika, kontroluje ci uz sa dany produkt nenachadza v kosiku
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse|void
     */
    public function addProduct(Request $request)
    {
        $product_id = $request->input('product_id');
        $product_qty = $request->input('product_qty');
        $product_note = $request->input('product_note');

        if (Auth::check()) {
            $prod_check = Product::where('id', $product_id)->first();

            if ($prod_check) {
                if (Cart::where('prod_id', $product_id)->where('user_id', Auth::id())->exists()) {
                    return response()->json(['status' => $prod_check->name." uz pridane do kosika"]);
                }
                else {
                    $cartItem = new Cart();
                    $cartItem->prod_id = $product_id;
                    $cartItem->user_id = Auth::id();
                    $cartItem->prod_qty = $product_qty;
                    $cartItem->note = $product_note;
                    $cartItem->save();
                    return response()->json(['status' => $prod_check->name." pridane do kosika"]);
                }
            }
        }
        else {
            return response()->json(['status' => "Pre pokracovanie sa prihlaste"]);
        }
    }

    /**
     * Zobrazi kosik s produktami
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function viewCart()
    {
        $cartItems = Cart::where('user_id', Auth::id())->get();
        return view('frontend.cart', compact('cartItems'));
    }

    /**
     * Vymaze produkt z kosika
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse|void
     */
    public function deleteProduct(Request $request)
    {
        if (Auth::check()) {
            $prod_id = $request->input('prod_id');
            if (Cart::where('prod_id', $prod_id)->where('user_id', Auth::id())->exists()) {
                $cartItem = Cart::where('prod_id', $prod_id)->where('user_id', Auth::id())->first();
                $cartItem->delete();
                return response()->json(['status' => "Produkt vymazany"]);
            }
        }
        else {
            return response()->json(['status' => "Pre pokracovanie sa prihlaste"]);
        }
    }

    /**
     * Aktualizuje kosik, pri zmene poctu produktov
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse|void
     */
    public function updateCart(Request $request)
    {
        $prod_id = $request->input('prod_id');
        $product_qty = $request->input('prod_qty');
        //$prod_note = $request->input('prod_note');

        if (Auth::check()) {
            if (Cart::where('prod_id', $prod_id)->where('user_id', Auth::id())->exists()) {
                $cart = Cart::where('prod_id', $prod_id)->where('user_id', Auth::id())->first();
                $cart->prod_qty = $product_qty;
                //$cart->note = $prod_note;
                $cart->update();
                return response()->json(['status' => ""]);
            }
        }
    }

    /**
     * Zobrazuje pocet produktov v kosiku
     * @return \Illuminate\Http\JsonResponse
     */
    public function cartcount()
    {
        $cartcount = Cart::where('user_id', Auth::id())->count();
        return response()->json(['count'=> $cartcount]);
    }
}
