<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('adminhensem'),
            'phonenum' => '012-2384766',
        ]
        );

        User::create([
            'name' => 'Abu Bakar',
            'email' => 'abu@gmail.com',
            'password' => Hash::make('12345678'),
            'phonenum' => '012-2384766',
        ]
        );
        
       User::create([
        'name' => 'Ali Muhammad',
        'email' => 'ali@gmail.com',
        'password' => Hash::make('12345678'),
        'phonenum' => '013-4324230',
        ]
        );
    
    }
}
