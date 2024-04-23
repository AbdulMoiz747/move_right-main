<?php

namespace Database\Seeders;

use App\Models\Location;
use App\Models\Property;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class PropertySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // $allAmenities = ["A/C & Heating", "Garages", "Swimming Pool", "Parking", "Lake View", "Garden", "Disabled Access", "Pet Friendly", "Ceiling Height", "Outdoor Shower", "Refrigerator", "Fireplace", "Wifi", "TV Cable", "Barbeque", "Laundry", "Dryer", "Lawn", "Elevator"];
        // $randomlySelectedAmenities = array_rand($allAmenities, 10);
        // $selectedAmenities = array_map(function ($key) use ($allAmenities) {
        //     return $allAmenities[$key];
        // }, $randomlySelectedAmenities);

        // $types = ['house', 'plot', 'apartments', 'condos', 'villas', 'lofts'];
        // $randomTypeKey = array_rand($types);
        // $randomType = $types[$randomTypeKey];

        // $listInOptions = ['sell', 'rent'];
        // $randomListInKey = array_rand($listInOptions);
        // $randomListIn = $listInOptions[$randomListInKey];

        // $options = [0, 1];
        // $randomValue = $options[array_rand($options)];

        // // $listInOptions = ['sell', 'rent'];
        // // $randomListInKey = array_rand($listInOptions);
        // // $randomListIn = $listInOptions[$randomListInKey];

        // Property::create([
        //     'title' => 'Blueberry villa',
        //     'description' => 'Lorem ipsum dolor sit amet consectetur. Et velit varius ipsum tempor vel dignissim tincidunt. Aliquam accumsan laoreet ultricies tincidunt faucibus fames augue in sociis. Nisl enim integer neque nec.',
        //     'address' => '3891 Ranchview',
        //     'location' => Location::create([
        //         'city_id' => 1,
        //         'area_id' => 1
        //         ])->id,
        //     'landlord_id' => 1,
        //     'subletter_id' => null,
        //     'type' => $randomType,
        //     'list_in' => $randomListIn,
        //     'status' => "available",
        //     'sq_yard' => rand(200, 1000),
        //     'price' => rand(5000, 10000),
        //     'allow_sublet' => $randomValue,
        //     'bedrooms' => rand(1, 10),
        //     'bathrooms' => rand(1, 10),
        //     'kitchens' => rand(1, 10),
        //     'garages' => rand(1, 10),
        //     'built_year' => 19 . rand(10, 99),
        //     'uuid' => Str::uuid()->toString(),
        //     'amenities' => $selectedAmenities,
        //     'media' => null
        // ]);
    }
}
