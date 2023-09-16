<?php

namespace Database\Seeders;

use App\Models\Brand;
use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Brand::factory(5)->create()->each(function (Brand $brand) {

            Product::factory(3)->create([
                'brand_id' => $brand->id
            ]);


        });
    }
}
