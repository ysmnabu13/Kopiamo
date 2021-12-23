<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Order;
use Illuminate\Support\Facades\DB;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Order::create([
            'user_id'       =>  '4',
            'orderStatus'   =>  'Pending',
            'totalPrice'    =>  '23.50',
        ]);

        Order::create([
            'user_id'       =>  '4',
            'orderStatus'   =>  'Ready to pick up',
            'totalPrice'    =>  '12.80',
        ]);

        Order::create([
            'user_id'       =>  '4',
            'orderStatus'   =>  'Completed',
            'totalPrice'    =>  '19.60',
        ]);
    }
}
