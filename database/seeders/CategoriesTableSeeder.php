<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            ['name' => 'Web Application', 'slug' => Str::slug('Web Application'), 'order_id' => 1, 'status' => 1],
            ['name' => 'E-commerce', 'slug' => Str::slug('E-commerce'), 'order_id' => 2, 'status' => 1],
            ['name' => 'Platform', 'slug' => Str::slug('Platform'), 'order_id' => 3, 'status' => 1],
            ['name' => 'Management System', 'slug' => Str::slug('Management System'), 'order_id' => 4, 'status' => 1],
            ['name' => 'Business Solution', 'slug' => Str::slug('Business Solution'), 'order_id' => 5, 'status' => 1],
        ];

        DB::table('categories')->insert($categories);
    }
}
