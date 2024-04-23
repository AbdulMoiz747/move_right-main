<?php

namespace Database\Seeders;

use App\Models\Buyer;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class BuyerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Buyer::create([
            'name' => 'Londaybaz',
            'email' => 'buyer@example.com',
            'password' => Hash::make('1234567890'),
            'phone' => "+6666699999", // You can set a specific value if needed
            'about' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Tenetur necessitatibus distinctio voluptates deserunt illum suscipit nulla, accusamus, sapiente deleniti illo numquam eum, blanditiis consequatur? Voluptatem qui eos delectus? Omnis, voluptas repellendus ducimus asperiores quos voluptatum vitae quasi minus voluptates recusandae aspernatur officiis tenetur beatae, necessitatibus possimus ipsa ab aperiam esse.', // You can set a specific value if needed
            'location_id' => 1, // You can set a specific value if needed
            'profile_picture' => null, // You can set a specific value if needed
        ]);
    }
}
