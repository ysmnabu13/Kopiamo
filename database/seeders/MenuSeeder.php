<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Menu;
use Illuminate\Support\Facades\DB;


class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       Menu::create([
            'menuName' => 'Espresso',
            'menuDesc' => 'Newly brewed coffee with hot temperature',
            'menuType' => 'Hot',
            'menuPrice' => '5.80',
            'coffee_photo_path' =>'1hot.jfif',
       ]);
       Menu::create([
            'menuName' => 'Iced Americano',
            'menuDesc' => 'Newly brewed coffee with cold temperature',
            'menuType' => 'Cold',
            'menuPrice' => '7.90',
            'coffee_photo_path' =>'1cold.jfif',
        ]);
       Menu::create([
            'menuName' => 'Americano',
            'menuDesc' => 'Newly brewed coffee with hot temperature',
            'menuType' => 'Hot',
            'menuPrice' => '5.90',
            'coffee_photo_path' =>'2hot.jfif',
        ]);
        Menu::create([
            'menuName' => 'Iced Cappuccino',
            'menuDesc' => 'Newly brewed coffee with cold temperature',
            'menuType' => 'Cold',
            'menuPrice' => '7.90',
            'coffee_photo_path' =>'2cold.png',
        ]);
        Menu::create([
            'menuName' => 'Cappuccino',
            'menuDesc' => 'Newly brewed coffee with hot temperature',
            'menuType' => 'Hot',
            'menuPrice' => '6.90',
            'coffee_photo_path' =>'3hot.jfif',
        ]);
        Menu::create([
            'menuName' => 'Iced Hazelnut Cappuccino',
            'menuDesc' => 'Newly brewed coffee with cold temperature',
            'menuType' => 'Cold',
            'menuPrice' => '8.90',
            'coffee_photo_path' =>'3cold.jfif',
        ]);
        Menu::create([
            'menuName' => 'Caffe Latte',
            'menuDesc' => 'Newly brewed coffee with hot temperature',
            'menuType' => 'Hot',
            'menuPrice' => '6.90',
            'coffee_photo_path' =>'4hot.jfif',
        ]);
        Menu::create([
            'menuName' => 'Iced Caramello Cappuccino',
            'menuDesc' => 'Newly brewed coffee with cold temperature',
            'menuType' => 'Cold',
            'menuPrice' => '8.90',
            'coffee_photo_path' =>'4cold.jfif',
        ]);
        Menu::create([
            'menuName' => 'Caramello Latte',
            'menuDesc' => 'Newly brewed coffee with hot temperature',
            'menuType' => 'Hot',
            'menuPrice' => '8.00',
            'coffee_photo_path' =>'5hot.jfif',
        ]);
        Menu::create([
            'menuName' => 'Iced Mochaccino',
            'menuDesc' => 'Newly brewed coffee with cold temperature',
            'menuType' => 'Cold',
            'menuPrice' => '8.90',
            'coffee_photo_path' =>'5cold.jfif',
        ]);
      
        
       
    }
}
