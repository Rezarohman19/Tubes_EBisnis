<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Product::create(['name' => 'Frozen Salmon', 'description' => 'Premium quality frozen salmon fillets', 'price' => 89000, 'stock' => 50]);
        Product::create(['name' => 'Frozen Chicken Breast', 'description' => 'Skinless boneless chicken breast', 'price' => 45000, 'stock' => 100]);
        Product::create(['name' => 'Frozen Shrimp', 'description' => 'Large size frozen shrimp', 'price' => 125000, 'stock' => 30]);
        Product::create(['name' => 'Frozen Beef Steak', 'description' => 'Premium beef steak cuts', 'price' => 150000, 'stock' => 40]);
        Product::create(['name' => 'Frozen Mixed Vegetables', 'description' => 'Broccoli, carrot, and peas mix', 'price' => 35000, 'stock' => 80]);
        Product::create(['name' => 'Frozen Ice Cream', 'description' => 'Assorted flavors ice cream', 'price' => 25000, 'stock' => 200]);
    }
}
