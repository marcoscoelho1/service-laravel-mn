<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\City;

class CitySeeder extends Seeder
{
    public function run()
    {
        foreach ($this->getCities() as $city) {
            City::create(
                [
                    'id_state' => $city['id_state'],
                    'name' => $city['name']
                ]
            );
        }
    }

    public function getCities()
    {
        $cities = [
            [
                'id_state' => 25,
                'name' => 'São Paulo'
            ],
            [
                'id_state' => 25,
                'name' => 'Salto'
            ]
        ];

        return $cities;
    }
}
