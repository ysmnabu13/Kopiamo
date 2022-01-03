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
        // $menus = Menu::where('id', $carts->id)->get();
        $menus = Menu::all();
        return view('cart.index', compact('carts','menus'));
    }

    public function store(Request $request){
        $menus = Menu::findOrFail($request->input('menu_id'));

        Cart::add(
            $menus->id,
            $menus->menuName,
            $request->input('quantity'),
            $menus->menuPrice,
            0.00,
            ['photo' => $menus->coffee_photo_path]
        )->associate(Menu::class);

        // Cart::add([
        //     ['id' => $menus->id, 'name' => $menus->menuName, 'qty' => $request->input('quantity') ,
        //     'price' => $menus->menuPrice, 'weight' => 0], 'options' => ['photo' => $menus->coffee_photo_path]
        //   ])->associate(Menu::class);

        // Cart::store(auth()->id());

        return redirect()->route('menu.index')->with('message', 'Item successfully added to cart');
        // return view('menu.index');
    }
}
