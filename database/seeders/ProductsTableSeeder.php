<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $products = [
            [
                "name"         => "Pizza",
                "description"  => "Some Description Here",
                "image"        => "products/product_1.jpg",
                "barcode"      => "11223344",
                "quantity"     => random_int(4,8),
                "price"        => 100,
            ],
            [
                "name"         => "Burger",
                "description"  => "Some Description Here",
                "image"        => "products/product_2.jpg",
                "barcode"      => "1122344",
                "quantity"     => random_int(4,8),
                "price"        => 50,
            ],
            [
                "name"         => "Taco & Drink Combo",
                "description"  => "Some Description Here",
                "image"        => "products/product_3.jpg",
                "barcode"      => "1223344",
                "quantity"     => random_int(4,8),
                "price"        => 50,
            ],
            [
                "name"         => "Taco Combo",
                "description"  => "Some Description Here",
                "image"        => "products/product_4.jpg",
                "barcode"      => "4432211",
                "quantity"     => random_int(4,8),
                "price"        => 50,
            ],
            [
                "name"         => "Burger & Drink",
                "description"  => "Some Description Here",
                "image"        => "products/product_5.jpg",
                "barcode"      => "123321",
                "quantity"     => random_int(4,8),
                "price"        => 250,
            ],
            [
                "name"         => "HotDog",
                "description"  => "Some Description Here",
                "image"        => "products/product_6.jpg",
                "barcode"      => "124421",
                "quantity"     => random_int(4,8),
                "price"        => 30,
            ],
            [
                "name"         => "Peperoni Pizza",
                "description"  => "Some Description Here",
                "image"        => "products/product_9.jpg",
                "barcode"      => "127721",
                "quantity"     => random_int(4,8),
                "price"        => 60,
            ],
            [
                "name"         => "Spicy Fries",
                "description"  => "Some Description Here",
                "image"        => "products/product_19.jpg",
                "barcode"      => "125521",
                "quantity"     => random_int(4,8),
                "price"        => 20,
            ],

        ];

        foreach ($products as $product){
            Product::create($product);
        }
    }
}
