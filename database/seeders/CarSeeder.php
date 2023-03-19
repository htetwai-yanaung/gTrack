<?php

namespace Database\Seeders;

use App\Models\Car;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $cars = [
            [
                'name' => 'Toyota',
                'number' => '12/1234',
                'model' => 'Toyota Corolla',
                'color' => 'white',
                'license' => 'B/00128/04',
                'year' => 2019,
                'fuel' => '92',
                'company_id' => 2,
            ],
            [
                'name' => 'Volkswagen Group',
                'number' => '12/1234',
                'model' => 'Volkswagen Golf',
                'color' => 'black',
                'license' => 'B/00160/06',
                'year' => 2020,
                'fuel' => '92',
                'company_id' => 2,
            ],
            [
                'name' => 'Stellantis',
                'number' => '12/1234',
                'model' => 'Jeep Grand Cherokeef',
                'color' => 'brown',
                'license' => 'B/01231/12',
                'year' => 2018,
                'fuel' => '92',
                'company_id' => 2,
            ],
            [
                'name' => 'General Motors',
                'number' => '12/1234',
                'model' => 'Chevrolet Silverado',
                'color' => 'white',
                'license' => 'B/05641/07',
                'year' => 2021,
                'fuel' => '92',
                'company_id' => 2,
            ],
            [
                'name' => 'Ford',
                'number' => '12/1234',
                'model' => 'Ford F-Series',
                'color' => 'black',
                'license' => 'B/16451/07',
                'year' => 2021,
                'fuel' => '92',
                'company_id' => 2,
            ],
        ];

        foreach($cars as $car){
            Car::create($car);
        }
    }
}
