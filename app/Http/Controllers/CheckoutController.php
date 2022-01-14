<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Menu;
use App\Models\Order;

class CheckoutController extends Controller
{
    public function index()
    {
        return view('order.checkout');
    }

    public function buynow($currMenu)
    {
        $menus = Menu::where('id', $currMenu)->get();
        $orders = Order::with('user')->get();
        return view('order.checkout')->with([
            'menus' => $menus,
            'orders' => $orders
        ]);
    }

    public function pageToCheckout(Request $request){
        //Source of page 
        $source = $request->input('from');
        if(strcmp($source, 'cartpage')){
            return $this->index()->with('fromCart', 'Items from cart');
        }
        else{
            return $this->index()->with('fromBuyNow', 'Items from menu');
        }
    }
}
