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
        // return view('order.checkout');
    }

    public function show($currMenu)
    {
        $menus = Menu::where('id', $currMenu)->get();
        $orders = Order::with('user')->get();
        return view('order.checkout')->with([
            'menus' => $menus,
            'orders' => $orders
        ]);
    }
}
