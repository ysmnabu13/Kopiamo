<?php

namespace App\Http\Controllers;

use RealRashid\SweetAlert\Facades\Alert;
use Gloudemans\Shoppingcart\Facades\Cart;
use App\Http\Controllers\Controller;
use App\Models\Menu;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index(){
        // Cart::store(auth()->id());
        $carts = Cart::content();
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
            ['photo' => $menus->coffee_photo_path, 'type' => $menus->menuType]
        )->associate(Menu::class);

        Cart::store(auth()->id());

        alert()->success('Success!','Item successfully added to the cart')->autoClose(2000);
        
        return redirect()->route('menu.index');
    }

    public function destroy($cart){

        Cart::remove($cart);
        Cart::store(auth()->id());
        
        return redirect()->route('cart.index');

    }

    public function update(Request $request, $id){
        
        Cart::update($id, $request->input('cart_qty'));
        Cart::store(auth()->id());
        return $this->index();
    }
}
