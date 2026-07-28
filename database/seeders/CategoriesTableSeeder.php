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
            ['name' => 'Business & Corporate Websites', 'slug' => Str::slug('Business & Corporate Websites'), 'order_id' => 1, 'status' => 1],
            ['name' => 'E-Commerce & Marketplace', 'slug' => Str::slug('E-Commerce & Marketplace'), 'order_id' => 2, 'status' => 1],
            ['name' => 'SaaS & Web Platforms', 'slug' => Str::slug('SaaS & Web Platforms'), 'order_id' => 3, 'status' => 1],
            ['name' => 'Booking & Management Systems', 'slug' => Str::slug('Booking & Management Systems'), 'order_id' => 4, 'status' => 1],
            ['name' => 'Business Process Solutions', 'slug' => Str::slug('Business Process Solutions'), 'order_id' => 5, 'status' => 1],
            ['name' => 'AI-Assisted Development', 'slug' => Str::slug('AI-Assisted Development'), 'order_id' => 6, 'status' => 1],
            ['name' => 'WordPress Plugin Development', 'slug' => Str::slug('WordPress Plugin Development'), 'order_id' => 7, 'status' => 1],
            ['name' => 'AI Automation & Workflow', 'slug' => Str::slug('AI Automation & Workflow'), 'order_id' => 8, 'status' => 1],
        ];

        DB::table('categories')->insert($categories);
    }
}
