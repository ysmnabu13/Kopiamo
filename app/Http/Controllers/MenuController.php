<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Menu;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $menus = Menu::all();
        return view('menu.index',compact('menus'));
    }

     /**
     * Display a listing of the searched resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function search()
    {
        $search=$_GET['search'];
        $menus=Menu::where('menuName','LIKE','%'.$search.'%')->get();

        return view('menu.search',compact('menus'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('menu.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Menu::create([
            'menuName'=> $request->get('menuName'),
            'menuDesc'=>$request->get('menuDesc'),
            'menuType'=>$request->get('menuType'),
            'menuPrice'=>$request->get('menuPrice'),
        ]);

        return redirect()->route('menu.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Menu $menu)
    {
        
        
        return view('menu.edit',compact('menu'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $menu = Menu::find($id);
        request()->validate([
            'menuName' => 'required',
            'menuDesc' => 'required',
            'menuType' => 'required',
            'menuPrice' => 'required',
        ]);

        $menu->update([
            'menuName' => request('menuName'),
            'menuDesc' => request('menuDesc'),
            'menuType' => request('menuType'),
            'menuPrice' => request('menuPrice'),
        ]);

        return redirect()->route('menu.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Menu $menu)
    {
        $menu->delete();
        return redirect()->route('menu.index');

    }
}
