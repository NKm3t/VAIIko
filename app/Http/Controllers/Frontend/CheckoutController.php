<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    public function index()
    {
        $cartItems = Cart::where('user_id', Auth::id())->get();
        return view('frontend.checkout', compact('cartItems'));
    }

    public function placeorder(Request $request)
    {
        $order = new Order();
        $order->user_id = Auth::id();
        $order->firstName = $request->input('firstName');
        $order->lastName = $request->input('lastName');
        $order->email = $request->input('email');
        $order->phone = $request->input('phone');
        $order->street = $request->input('street');
        $order->city = $request->input('city');
        $order->postCode = $request->input('postCode');
        $order->state = $request->input('state');

        $total = 0;
        $cartItems_total = Cart::where('user_id', Auth::id())->get();
        foreach ($cartItems_total as $prod) {
            $total += $prod->products->selling_price * $prod->prod_qty;
        }

        $order->total_price = $total;

        $order->tracking_no = rand(1111, 9999);
        $order->save();

        $cartItems = Cart::where('user_id', Auth::id())->get();
        foreach ($cartItems as $item) {
            OrderItem::create([
                'order_id' => $order->id,
                'prod_id' => $item->prod_id,
                'qty' => $item->prod_qty,
                'price' => $item->products->selling_price,
            ]);
        }

        if (Auth::user()->street == NULL) {
            $user = User::where('id', Auth::id())->first();
            $order->name = $request->input('firstName');
            $user->lastName = $request->input('lastName');
            $user->phone = $request->input('phone');
            $user->street = $request->input('street');
            $user->city = $request->input('city');
            $user->postCode = $request->input('postCode');
            $user->state = $request->input('state');
            $user->update();
        }
        $cartItems = Cart::where('user_id', Auth::id())->get();
        Cart::destroy($cartItems);

        return redirect('/')->with('status', "Uspesne objednane");
    }
}
