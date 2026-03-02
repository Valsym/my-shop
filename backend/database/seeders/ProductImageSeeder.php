<?php

namespace Database\Seeders;

use App\Models\ProductImage;
use Illuminate\Database\Seeder;

class ProductImageSeeder extends Seeder
{
    public function run()
    {

        // Изображения
        for ($i=3; $i<20; $i++) {
            for ($j=1; $j<=3; $j++) { // три пикчи на продукт
                ProductImage::create([
                    'product_id' => $i,
                    'image_url' =>
                        'https://source.unsplash.com/random/200x267?sig=' . rand(1, 10000),
                ]);
            }
        }


    }
}
