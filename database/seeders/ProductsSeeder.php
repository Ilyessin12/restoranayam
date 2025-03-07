<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;
use Illuminate\Support\Facades\DB;

class ProductsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Disable foreign key checks
		DB::statement('SET FOREIGN_KEY_CHECKS=0;');

		// Truncate the table
		DB::table('products')->truncate(); 

		// Re-enable foreign key checks
		DB::statement('SET FOREIGN_KEY_CHECKS=1;');
		
        $products = [
            [
                'name' => 'Ayam Goreng',
                'description' => 'Ayam digoreng.',
                'price' => 12000,
                'stock' => 50,
                'image' => 'ayam_goreng.jpg'
            ],
            [
                'name' => 'Tempe Goreng',
                'description' => 'Tempe digoreng..',
                'price' => 1000,
                'stock' => 30,
                'image' => 'tempe_goreng.jpg'
            ],
            [
                'name' => 'Tahu Goreng',
                'description' => 'Tahu digoreng.',
                'price' => 1000,
                'stock' => 20,
                'image' => 'tahu_goreng.jpg'
            ],
            [
                'name' => 'Nasi',
                'description' => 'Sanguan le.',
                'price' => 3000,
                'stock' => 100,
                'image' => 'nasi.jpg'
            ],
        ];

        foreach ($products as $product) {
            Product::create($product);
        }
    }
}
