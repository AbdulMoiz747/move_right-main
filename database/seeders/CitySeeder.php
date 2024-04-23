<?php

namespace Database\Seeders;

use App\Models\Area;
use App\Models\City;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $locations = [
            'London' => ['Westminster', 'Camden', 'Greenwich', 'Kensington', 'Islington'],
            'Manchester' => ['City Centre', 'Didsbury', 'Chorlton', 'Salford Quays', 'Ancoats'],
            'Birmingham' => ['Digbeth', 'Jewellery Quarter', 'Edgbaston', 'Moseley', 'Harborne'],
            'Glasgow' => ['City Centre', 'West End', 'East End', 'Finnieston', 'Partick'],
            'Edinburgh' => ['Old Town', 'New Town', 'Leith', 'Stockbridge', 'Marchmont'],
            'Liverpool' => ['City Centre', 'Anfield', 'Everton', 'Toxteth', 'Aigburth'],
            'Bristol' => ['Clifton', 'Bedminster', 'Stokes Croft', 'Redland', 'Easton'],
            'Leeds' => ['City Centre', 'Headingley', 'Hyde Park', 'Roundhay', 'Chapel Allerton'],
            'Newcastle' => ['City Centre', 'Jesmond', 'Heaton', 'Ouseburn', 'Gosforth'],
            'Cardiff' => ['City Centre', 'Roath', 'Cathays', 'Canton', 'Adamsdown'],
        ];

        foreach ($locations as $cityName => $areas) {
            $city = City::create(['name' => $cityName]);

            foreach ($areas as $areaName) {
                Area::create(['name' => $areaName, 'city_id' => $city->id]);
            }
        }
    }
}
