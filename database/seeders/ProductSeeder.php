<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    public function run(): void
    {   

        Product::create(['name' => 'Telefono', 'price' => 52000, 'quantity' => 20, 'code' => '324']);
        Product::create(['name' => 'Teclado', 'price' => 15000, 'quantity' => 25, 'code' => '123']);
        Product::create(['name' => 'Mouse', 'price' => 10000, 'quantity' => 30, 'code' => '456']);
        Product::create(['name' => 'Monitor', 'price' => 35000, 'quantity' => 10, 'code' => '789']);
        Product::create(['name' => 'Impresora', 'price' => 45000, 'quantity' => 15, 'code' => '963']);

    }
}
