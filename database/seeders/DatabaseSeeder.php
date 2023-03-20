<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use App\Models\CarDriver;
use Database\Seeders\CarSeeder;
use Illuminate\Database\Seeder;
use Database\Seeders\DriverSeeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $users = [
            [
                'company_name' => 'Admin',
                'email' => 'admin@gmail.com',
                'role' => 'admin',
                'password' => Hash::make('password'),
            ],
            [
                'company_name' => 'Google',
                'email' => 'google@gmail.com',
                'role' => 'client',
                'password' => Hash::make('password'),
            ],
        ];
        foreach($users as $user){
            User::create($user);
        }

        CarDriver::create([
            'car_id' => 1,
            'user_id' => 3
        ]);

        $this->call([
            CarSeeder::class,
            DriverSeeder::class,
        ]);
    }
}
