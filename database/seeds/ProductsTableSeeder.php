<?php

use App\Product;
use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{
    public function run()
    {
        // Dresses
        for ($i = 1; $i <= 10; $i++) {
            Product::create([
                'name' => 'Dress ' . $i,
                'slug' => 'dress-' . $i,
                'details' => [13, 14, 15][array_rand([13, 14, 15])] . ' lorem, ' . [1, 2, 3][array_rand([1, 2, 3])] . ' size',
                'price' => array(3000, 5000, 7000, 10000, 12000, 15000, 17000, 20000, 25000, 30000, 32000, 35000, 37000, 40000)[array_rand([3000, 5000, 7000, 10000, 12000, 15000, 17000, 20000, 25000, 30000, 32000, 35000, 37000, 40000], 1)],
                'description' => 'Lorem ' . $i . ' ipsum dolor sit amet, consectetur adipisicing elit.',
            ])->categories()->attach(1);
        }

        // Shoes
        for ($i = 1; $i <= 10; $i++) {
            Product::create([
                'name' => 'Shoe ' . $i,
                'slug' => 'shoe-' . $i,
                'details' => [24, 25, 27][array_rand([24, 25, 27])] . ' size',
                'price' => array(3000, 5000, 7000, 10000, 12000, 15000, 17000, 20000, 25000, 30000, 32000, 35000, 37000, 40000)[array_rand([3000, 5000, 7000, 10000, 12000, 15000, 17000, 20000, 25000, 30000, 32000, 35000, 37000, 40000], 1)],
                'description' => 'Lorem ' . $i . ' ipsum dolor sit amet, consectetur adipisicing elit.',
            ])->categories()->attach(2);
        }

        // Handbags
        for ($i = 1; $i <= 10; $i++) {
            Product::create([
                'name' => 'Handbag ' . $i,
                'slug' => 'handbag-' . $i,
                'details' => [16, 32, 64][array_rand([16, 32, 64])] . 'size handbag',
                'price' => array(3000, 5000, 7000, 10000, 12000, 15000, 17000, 20000, 25000, 30000, 32000, 35000, 37000, 40000)[array_rand([3000, 5000, 7000, 10000, 12000, 15000, 17000, 20000, 25000, 30000, 32000, 35000, 37000, 40000], 1)],
                'description' => 'Lorem ' . $i . ' ipsum dolor sit amet, consectetur adipisicing elit.',
            ])->categories()->attach(3);
        }

        // Jeans
        for ($i = 1; $i <= 10; $i++) {
            Product::create([
                'name' => 'Jeans ' . $i,
                'slug' => 'jeans-' . $i,
                'details' => [16, 32, 64][array_rand([16, 32, 64])] . 'size jeans',
                'price' => array(3000, 5000, 7000, 10000, 12000, 15000, 17000, 20000, 25000, 30000, 32000, 35000, 37000, 40000)[array_rand([3000, 5000, 7000, 10000, 12000, 15000, 17000, 20000, 25000, 30000, 32000, 35000, 37000, 40000], 1)],
                'description' => 'Lorem ' . $i . ' ipsum dolor sit amet, consectetur adipisicing elit.',
            ])->categories()->attach(4);
        }

        // Shirts
        for ($i = 1; $i <= 10; $i++) {
            Product::create([
                'name' => 'Shirt ' . $i,
                'slug' => 'shirt-' . $i,
                'details' => [16, 32, 64][array_rand([16, 32, 64])] . 'size shirt',
                'price' => array(3000, 5000, 7000, 10000, 12000, 15000, 17000, 20000, 25000, 30000, 32000, 35000, 37000, 40000)[array_rand([3000, 5000, 7000, 10000, 12000, 15000, 17000, 20000, 25000, 30000, 32000, 35000, 37000, 40000], 1)],
                'description' => 'Lorem ' . $i . ' ipsum dolor sit amet, consectetur adipisicing elit.',
            ])->categories()->attach(5);
        }

        // Jackets
        for ($i = 1; $i <= 10; $i++) {
            Product::create([
                'name' => 'Jacket ' . $i,
                'slug' => 'jacket-' . $i,
                'details' => [16, 32, 64][array_rand([16, 32, 64])] . 'size jacket',
                'price' => array(3000, 5000, 7000, 10000, 12000, 15000, 17000, 20000, 25000, 30000, 32000, 35000, 37000, 40000)[array_rand([3000, 5000, 7000, 10000, 12000, 15000, 17000, 20000, 25000, 30000, 32000, 35000, 37000, 40000], 1)],
                'description' => 'Lorem ' . $i . ' ipsum dolor sit amet, consectetur adipisicing elit.',
            ])->categories()->attach(6);
        }

        // Short
        for ($i = 1; $i <= 10; $i++) {
            Product::create([
                'name' => 'Short ' . $i,
                'slug' => 'short-' . $i,
                'details' => [16, 32, 64][array_rand([16, 32, 64])] . 'size short',
                'price' => array(3000, 5000, 7000, 10000, 12000, 15000, 17000, 20000, 25000, 30000, 32000, 35000, 37000, 40000)[array_rand([3000, 5000, 7000, 10000, 12000, 15000, 17000, 20000, 25000, 30000, 32000, 35000, 37000, 40000], 1)],
                'description' => 'Lorem ' . $i . ' ipsum dolor sit amet, consectetur adipisicing elit.',
            ])->categories()->attach(7);
        }

        Product::whereIn('id', [13, 24, 35, 44, 56, 67, 70, 23, 5, 61, 39, 43, 50])->update(['featured' => true]);
        Product::whereIn('id', [1, 24, 25, 42, 36, 47, 70, 39, 65, 61, 33, 34, 55])->update(['special' => true]);

        $product = Product::find(35);
        $product->categories()->attach(7);
    }
}
