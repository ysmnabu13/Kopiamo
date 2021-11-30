<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UpdateMenuStaff;
use App\Http\Requests\StoreMenuStaff;
use App\Models\Menu;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;

class MenuController extends Controller
{
    
    public function index()
    {
         $menus =Menu::all();
        return view('menu.index',compact('menus'));
     
    }

    public function create()
    {
        return view('menu.create');
    }

    public function store(StoreMenuStaff $request)
    {
        Menu::create($request->validated());
        return redirect()->route('menu.index');
        
    }


    public function show(Menu $menus)
    {
        return view('menu.show',compact('menus'));
    }

    public function edit(Menu $menus)
    {
        return view('menu.edit',compact('menus'));
    }


    public function update(UpdateMenuStaff $request, Menu $menu)
    {
        $menus->update($request->validated());
    }


    public function destroy(Menu $menu)
    {
        $menus->delete();
        return redirect()->route (route:'menu.index');
    }
}


