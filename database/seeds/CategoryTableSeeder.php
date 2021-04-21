<?php

use App\Category;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoryTableSeeder extends Seeder
{

    public function run()
    {
        $now = Carbon::now()->toDateTimeString();

        DB::table('category')->insert([
            ['name' => 'Dresses', 'slug' => 'dresses', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Shoes', 'slug' => 'shoes', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Handbags', 'slug' => 'handbags', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Jeans', 'slug' => 'jeans', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Shirts', 'slug' => 'shirts', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Jackets', 'slug' => 'jackets', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Shorts', 'slug' => 'shorts', 'created_at' => $now, 'updated_at' => $now],
        ]);
    }
}
