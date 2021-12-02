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
            'menuName' => 'Hot Coffee',
            'menuDesc' => 'Newly brewed coffee with hot temperature',
            'menuType' => 'Hot',
            'menuPrice' => '7.20',
       ]);
       Menu::create([
        'menuName' => 'Cold Coffee',
            'menuDesc' => 'Newly brewed coffee with cold temperature',
            'menuType' => 'Cold',
            'menuPrice' => '8.50',
   ]);
       
    }
}
