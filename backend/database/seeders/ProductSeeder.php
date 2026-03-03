<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\ProductImage;
use App\Models\Comment;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    public function run()
    {
        // Вставка продукта из мокового массива products[0]
        $product = Product::create([
            'name' => '3D принтер',
            'code' => 2840367,
            'price' => 33333,
            'old_price' => 55555,
            'delivery' => '2025-04-01',
            'description' => 'это "текст-рыба", часто используемый в печати и веб-дизайне. Lorem Ipsum является стандартной "рыбой" для текстов на латинице с начала XVI века. В то время некий безымянный печатник создал большую коллекцию размеров и форм шрифтов, используя Lorem Ipsum для распечатки образцов. Lorem Ipsum не только успешно пережил без заметных изменений пять веков, но и перешагнул в электронный дизайн.'
        ]);

        // Изображения
        foreach (['https://i.ibb.co/gPCq1G4/image.png',
                     "https://i.ibb.co/yFhYrms/hb2NiWc.jpg",
                     "https://i.ibb.co/r6QCT38/NcXNhJb.jpg"] as $url) {
            ProductImage::create([
                'product_id' => $product->id,
                'image_url' => $url
            ]);
        }

        // Комментарии
        foreach ([
                     [
                         'id' => 0,
                         'author' => "Кирилл",
                         'text' => "Отличный принтер"
                     ],
                     [
                         'id' => 1,
                         'author' => "Илья",
                         'text' => "Цену бы пониже"
                     ],
                     [
                         'id' => 2,
                         'author' => "Дима",
                         'text' => "А где покупать расходники"
                     ],
                     [
                         'id' => 3,
                         'author' => "Кирилл Иванович",
                         'text' => "Доповлен покупкой"
                     ],
                     [
                         'id' => 4,
                         'author' => "Дима",
                         'text' => "Сломался через месяц"
                     ]
                 ]
                 as $commentData) {
            Comment::create([
                'product_id' => $product->id,
                'author' => $commentData['author'],
                'text' => $commentData['text']
            ]);
        }


        $product = Product::create([
            'name' => 'Эльфивая башня',
            'code' => 2840368,
            'price' => 500,
            'old_price' => 555,
            'delivery' => '2025-04-01',
            'description' => 'это "текст-рыба", часто используемый в печати и веб-дизайне. Lorem Ipsum является стандартной "рыбой" для текстов на латинице с начала XVI века. В то время некий безымянный печатник создал большую коллекцию размеров и форм шрифтов, используя Lorem Ipsum для распечатки образцов. Lorem Ipsum не только успешно пережил без заметных изменений пять веков, но и перешагнул в электронный дизайн.'
        ]);

        // Изображения
        foreach ([
                     "https://i.ibb.co/r6QCT38/NcXNhJb.jpg",
                     "https://i.ibb.co/gPCq1G4/image.png",
                     "https://i.ibb.co/yFhYrms/hb2NiWc.jpg"
                 ] as $url) {
            ProductImage::create([
                'product_id' => $product->id,
                'image_url' => $url
            ]);
        }

        // Комментарии
        foreach ([
                     [
                         'id' => 0,
                         'author' => "Кирилл",
                         'text' => "Уж лучше купить принтер и самому напечатать"
                     ],
                     [
                         'id' => 1,
                         'author' => "Илья",
                         'text' => "А можно заказать Пизанскую башню?"
                     ],
                     [
                         'id' => 2,
                         'author' => "Сергей",
                         'text' => "Я такую же могу распечатать"
                     ]
                 ] as $commentData) {
            Comment::create([
                'product_id' => $product->id,
                'author' => $commentData['author'],
                'text' => $commentData['text']
            ]);
        }

        $product = Product::create([
            'name' => 'Шахматы',
            'code' => 2840777,
            'price' => 1000,
            'old_price' => 0,
            'delivery' => '2025-04-01',
            'description' => 'это "текст-рыба", часто используемый в печати и веб-дизайне. Lorem Ipsum является стандартной "рыбой" для текстов на латинице с начала XVI века. В то время некий безымянный печатник создал большую коллекцию размеров и форм шрифтов, используя Lorem Ipsum для распечатки образцов. Lorem Ipsum не только успешно пережил без заметных изменений пять веков, но и перешагнул в электронный дизайн.'

        ]);

        // Изображения
        foreach ([
                     "https://i.ibb.co/yFhYrms/hb2NiWc.jpg",
                     "https://i.ibb.co/r6QCT38/NcXNhJb.jpg",
                     "https://i.ibb.co/gPCq1G4/image.png"
                 ] as $url) {
            ProductImage::create([
                'product_id' => $product->id,
                'image_url' => $url
            ]);
        }

        // Комментарии
        foreach ([
                     [
                         'id' => 0,
                         'author' => "Кирилл",
                         'text' => "Я могу более красивые сделать"
                     ],
                     [
                         'id' => 1,
                         'author' => "Илья",
                         'text' => "На самом деле самые красивые шахматные наборы — деревянные"
                     ],
                     [
                         'id' => 2,
                         'author' => "Сергей",
                         'text' => "Зато с 3D-принтером можно самые причудливые фигуры создать"
                     ]
                 ] as $commentData) {
            Comment::create([
                'product_id' => $product->id,
                'author' => $commentData['author'],
                'text' => $commentData['text']
            ]);
        }
    }
}
