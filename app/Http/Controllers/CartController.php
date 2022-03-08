<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function __construct()
    {
        $this->middleware('customer');
    }

    public function addToCart(Request $request)
    {

        $check = Cart::where('user_id', Auth::user()->id)->where('order_number', null)->where('product_id', $request->id)->first();
        if ($check) {
            $check->quantity = $check->quantity + 1;
            $check->save();
        } else {
            Cart::create([
                'user_id' => Auth::user()->id,
                'product_id' => $request->id,
                'status' => 0,
                'quantity' => 1,
            ]);
        }
        $orders = Cart::where('user_id', Auth::user()->id)->where('order_number', null)->with('product')->get();
        $html = '';
        $total = 0;
        $pro_total = 0;


        $html .= '<div class="d-flex justify-content-between">
            <span>You have ' . $orders->count() . ' items in your cart</span>
        </div>';

        foreach ($orders as  $order) {
            $html .= '<div
            class="d-flex crt-master-itm justify-content-between align-items-center mt-3 p-2 items rounded">
            <div class="d-flex flex-row"><img class="rounded"
                    src="' . asset('uploads/products/' . $order->product->image) . '" width="40">
                <div class="ml-2">
                    <span class="font-weight-bold d-block">' . $order->product->title . '</span>
                    <span class="spec"> ' . $order->product->price . ' X ' . $order->quantity . ' (Total = ' .  $pro_total = $order->quantity * $order->product->price . ' BDT )
                    </span>
                </div>
                <div class="ml-2">
                    <div class="d-flex flex-column plus-minus plus-minusMaster">
                        <span data-id="' . $order->product->id . '"
                            class="badge vsm-text plus badgeMaster addTocart">+</span>
                        <span data-id="' . $order->product->id . '"
                            class="badge vsm-text minus badgeMaster removeFromcart">-</span>
                    </div>
                </div>
            </div>
        </div>';
            $total += number_format((float)$pro_total, 2);
        }
        $html .= '<h4 class="font-weight-bold d-block">Total : ' . $total . ' BDT</h4>';
        return $html;
    }
    public function cHechaddToCart(Request $request)
    {

        $check = Cart::where('user_id', Auth::user()->id)->where('order_number', null)->where('product_id', $request->id)->first();
        if ($check) {
            $check->quantity = $check->quantity + 1;
            $check->save();
        } else {
            Cart::create([
                'user_id' => Auth::user()->id,
                'product_id' => $request->id,
                'status' => 0,
                'quantity' => 1,
            ]);
        }
        $orders = Cart::where('user_id', Auth::user()->id)->where('order_number', null)->with('product')->get();
        $html = '';
        $total = 0;
        $pro_total = 0;
        foreach ($orders as  $order) {
            $html .= '<div class="row border-top border-bottom">
            <div class="row main align-items-center">
                <div class="col-2">
                    <img class="img-fluid"
                        src="' . asset('uploads/products/' . $order->product->image) . '">
                </div>
                <div class="col">
                    <div class="row text-muted">' . $order->product->title . '</div>
                </div>
                <div class="col-4">
                    <div class="row d-flex justify-content-end px-3">
                        <p class="mb-0" id="cnt1">' . $order->quantity . '</p>
                        <div class="d-flex flex-column plus-minus">
                            <span style="cursor: pointer" data-id="' . $order->product->id . '"
                                class="badge ch-addTocart vsm-text plus">+</span>
                            <span style="cursor: pointer" data-id="' . $order->product->id . '"
                                class="badge ch-removeFromcart vsm-text minus">-</span>
                        </div>
                    </div>
                </div>
                <div style="font-size: 11px; font-weight: 600;" class="col"> 
                Price : ' . $order->product->price . ' ; 
                <span>Total : ' .  $pro_total  = $order->product->price * $order->quantity . ' BDT</span> 
                </div>
            </div>
    </div>';
            $total += number_format((float)$pro_total, 2);
        }
        $data['total'] = $total;
        $data['html'] = $html;
        return $data;
    }

    public function removeFromCart(Request $request)
    {
        $check = Cart::where('user_id', Auth::user()->id)->where('order_number', null)->where('product_id', $request->id)->first();
        if ($check) {
            $check->quantity = $check->quantity - 1;
            $check->save();
        }
        if ($check->quantity == 0) {
            $check->delete();
        }

        $orders = Cart::where('user_id', Auth::user()->id)->where('order_number', null)->with('product')->get();
        $html = '';
        $total = 0;
        $pro_total = 0;
        $html .= '<div class="d-flex justify-content-between">
            <span>You have ' . $orders->count() . ' items in your cart</span>
        </div>';

        foreach ($orders as  $order) {
            $pro_total = $order->quantity * $order->product->price;
            $html .= '<div
            class="d-flex crt-master-itm justify-content-between align-items-center mt-3 p-2 items rounded">
            <div class="d-flex flex-row"><img class="rounded"
                    src="' . asset('uploads/products/' . $order->product->image) . '" width="40">
                <div class="ml-2">
                    <span class="font-weight-bold d-block">' . $order->product->title . '</span>
                    <span class="spec">
                        ' . $order->product->price . ' X ' . $order->quantity . ' (Total = ' . $order->quantity * $order->product->price . ' BDT )
                    </span>
                </div>
                <div class="ml-2">
                    <div class="d-flex flex-column plus-minus plus-minusMaster">
                        <span data-id="' . $order->product->id . '"
                            class="badge vsm-text plus badgeMaster addTocart">+</span>
                        <span data-id="' . $order->product->id . '"
                            class="badge vsm-text minus badgeMaster removeFromcart">-</span>
                    </div>
                </div>
            </div>
        </div>';
            $total += number_format((float)$pro_total, 2);
        }
        $html .= '<h4 class="font-weight-bold d-block">Total : ' . $total . ' BDT</h4>';
        return $html;
    }


    public function cHechremoveFromCart(Request $request)
    {
        $check = Cart::where('user_id', Auth::user()->id)->where('order_number', null)->where('product_id', $request->id)->first();
        if ($check) {
            $check->quantity = $check->quantity - 1;
            $check->save();
        }
        if ($check->quantity == 0) {
            $check->delete();
        }

        $orders = Cart::where('user_id', Auth::user()->id)->where('order_number', null)->with('product')->get();
        $html = '';
        $total = 0;
        $pro_total = 0;


        foreach ($orders as  $order) {
            $html .= '<div class="row border-top border-bottom">
            <div class="row main align-items-center">
                <div class="col-2">
                    <img class="img-fluid"
                        src="' . asset('uploads/products/' . $order->product->image) . '">
                </div>
                <div class="col">
                    <div class="row text-muted">' . $order->product->title . '</div>
                </div>
                <div class="col-4">
                    <div class="row d-flex justify-content-end px-3">
                        <p class="mb-0" id="cnt1">' . $order->quantity . '</p>
                        <div class="d-flex flex-column plus-minus">
                            <span style="cursor: pointer" data-id="' . $order->product->id . '"
                                class="badge ch-addTocart vsm-text plus">+</span>
                            <span style="cursor: pointer" data-id="' . $order->product->id . '"
                                class="badge ch-removeFromcart vsm-text minus">-</span>
                        </div>
                    </div>
                </div>
                <div style="font-size: 11px; font-weight: 600;" class="col"> 
                Price : ' . $order->product->price . ' ; 
                <span>Total : ' . $pro_total = $order->product->price * $order->quantity . ' BDT</span> 
                </div>
            </div>
    </div>';
            $total += number_format((float)$pro_total, 2);
        }
        $data['total'] = $total;
        $data['html'] = $html;
        return $data;
    }



    public function submitOrder(Request $request)
    {
        $orders = Cart::where('user_id', Auth::user()->id)->where('order_number', null)->with('product')->get();
        if ($orders->count() == 0) {
            return redirect()->back()->with('warning', 'your cart is empty, Please Add product to cart');
        }
        $total = 0;
        $pro_total = 0;
        foreach ($orders as $order) {
            $pro_total = $order->product->price * $order->quantity;
            $total += number_format((float)$pro_total, 2);
        }
        $placed_order = Order::create([
            'orderId' => 'RNC_' . substr(number_format(time() * rand(), 0, '', ''), 0, 6),
            'user_id' => Auth::user()->id,
            'name' => $request->customer_name,
            'phone' => $request->phone,
            'address' => $request->address,
            'payment' => $request->payment,
            'amount' => $total,
            'account_number' => $request->account_number,
            'transaction_id' => $request->transaction_id,
        ]);

        foreach ($orders as $order) {
            $order->order_number = $placed_order->orderId;
            $order->save();
        }
        return redirect()->back()->with('success', 'Order Placed Successfully! Order Number #' . $placed_order->orderId);
    }
}
