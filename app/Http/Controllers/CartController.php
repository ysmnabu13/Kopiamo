<?php

namespace App\Http\Controllers;

use Gloudemans\Shoppingcart\Facades\Cart;
use App\Http\Controllers\Controller;
use App\Models\Menu;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index(){
        $carts = Cart::content();
        return view('cart.index', compact('carts'));
    }

    public function store(Request $request){
        $menus = Menu::findOrFail($request->input('menu_id'));

        Cart::add(
            $menus->id,
            $menus->menuName,
            $request->input('quantity'),
            $menus->menuPrice,
        )->associate(Menu::class);

        Cart::store(auth()->id());

        return redirect()->route('menu.index')->with('message', 'Item successfully added to cart');
    }
}
