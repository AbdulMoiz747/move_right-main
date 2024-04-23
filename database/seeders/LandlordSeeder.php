<?php

namespace Database\Seeders;

use App\Models\Landlord;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class LandlordSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Landlord::create([
            'name' => 'Mahesh Dallay',
            'email' => 'landlord@example.com',
            'password' => Hash::make('1234567890'),
            'phone' => "+66669999",
            'about' => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Tenetur necessitatibus distinctio voluptates deserunt illum suscipit nulla, accusamus, sapiente deleniti illo numquam eum, blanditiis consequatur? Voluptatem qui eos delectus? Omnis, voluptas repellendus ducimus asperiores quos voluptatum vitae quasi minus voluptates recusandae aspernatur officiis tenetur beatae, necessitatibus possimus ipsa ab aperiam esse.",
            'location_id' => 1, 
            'profile_picture' => null, 
        ]);
    }
}
