<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Driver;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DriverSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $drivers = [
            [
                'company_id' => '2',
                'name'=>'U Aung Aung',
                'age'=>45,
                'phone' => '09791265237',
                'address' => 'Yangon',
                'license'=>'B/00123/04',
                'email' => 'user1@gmail.com',
                'password' => Hash::make('password'),
            ],
            [
                'company_id' => '2',
                'name'=>'U Myint',
                'age'=>40,
                'phone' => '09791265237',
                'address' => 'Mandalay',
                'license'=>'B/17452/06',
                'email' => 'user2@gmail.com',
                'password' => Hash::make('password'),
                'status' => '1'
            ],
            [
                'company_id' => '2',
                'name'=>'U Ko',
                'age'=>37,
                'phone' => '09791265237',
                'address' => 'Yangon',
                'license'=>'B/10231/06',
                'email' => 'user3@gmail.com',
                'password' => Hash::make('password'),
            ],
            [
                'company_id' => '2',
                'name'=>'U Mg Mg',
                'age'=>35,
                'phone' => '09791265237',
                'address' => 'Yangon',
                'license'=>'B/01576/14',
                'email' => 'user4@gmail.com',
                'password' => Hash::make('password'),
            ],
            [
                'company_id' => '2',
                'name'=>'U Kyaw',
                'age'=>34,
                'phone' => '09791265237',
                'address' => 'Yangon',
                'license'=>'B/01245/14',
                'email' => 'user5@gmail.com',
                'password' => Hash::make('password'),
            ],
        ];

        foreach($drivers as $driver){
            User::create($driver);
        }
    }
}
