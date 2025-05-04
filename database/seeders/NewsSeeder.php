<?php

namespace Database\Seeders;

use App\Models\News;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NewsSeeder extends Seeder
{
    public function run(): void
    {
        $news = [
            [
                'title' => 'Нова лінійка портативних акумуляторів з підтримкою швидкої зарядки',
                'description' => 'Зустрічайте нову лінійку портативних акумуляторів Colorway з підтримкою технологій Quick Charge та Power Delivery',
                'date' => '2024-10-05',
                'is_new' => true,
                'image_default' => 'assets/images/news-02.jpg',
                'image_mobile' => 'assets/images/news-02-mobile.jpg',
                'image_tablet' => 'assets/images/news-02-tablet.jpg',
                'content' => 'Зустрічайте нову лінійку портативних акумуляторів Colorway з підтримкою технологій Quick Charge та Power Delivery. Наші нові моделі дозволяють заряджати ваші пристрої до 3 разів швидше, ніж звичайні зарядні пристрої.'
            ],
            [
                'title' => 'Беспровідні навушники SoundWave Pro вже в продажу',
                'description' => 'Новинка! Бездротові навушники SoundWave Pro з активним шумопоглинанням та тривалим часом роботи тепер доступні в Україні',
                'date' => '2024-09-15',
                'is_new' => true,
                'image_default' => 'assets/images/news-01.jpg',
                'image_mobile' => 'assets/images/news-01-mobile.jpg',
                'image_tablet' => 'assets/images/news-01-tablet.jpg',
                'content' => 'Новинка! Бездротові навушники SoundWave Pro з активним шумопоглинанням та тривалим часом роботи тепер доступні в Україні. Основні характеристики: Bluetooth 5.3 для стабільного підключення, Активне шумопоглинання з можливістю налаштування, До 30 годин автономної роботи, Швидка зарядка: 10 хвилин = 2 години прослуховування, Зручне управління дотиком, Захист від вологи IPX5.'
            ],
            [
                'title' => 'Відкриття нового сервісного центру у Львові',
                'description' => 'Раді повідомити про відкриття нового сервісного центру ColorWay у Львові за адресою вул. Зелена, 123',
                'date' => '2024-08-20',
                'is_new' => false,
                'image_default' => 'assets/images/news-03.jpg',
                'image_mobile' => 'assets/images/news-03-mobile.jpg',
                'image_tablet' => 'assets/images/news-03-tablet.jpg',
                'content' => 'Раді повідомити про відкриття нового сервісного центру ColorWay у Львові за адресою вул. Зелена, 123. Наш новий центр обладнаний сучасним діагностичним обладнанням та укомплектований досвідченими фахівцями.'
            ],
            [
                'title' => 'Інноваційна серія SD-карт для професійних фотографів',
                'description' => 'ColorWay представляє нову серію SD-карт PRO X з надзвичайно високою швидкістю запису для професійних фотографів та відеографів',
                'date' => '2024-07-10',
                'is_new' => false,
                'image_default' => 'assets/images/news-04.jpg',
                'image_mobile' => 'assets/images/news-04-mobile.jpg',
                'image_tablet' => 'assets/images/news-04-tablet.jpg',
                'content' => 'ColorWay представляє нову серію SD-карт PRO X з надзвичайно високою швидкістю запису для професійних фотографів та відеографів. Карти пам\'яті розроблені спеціально для зйомки в форматі 4K та 8K з неперевершеною продуктивністю.'
            ],
            [
                'title' => 'Презентація нової серії моніторів для геймерів',
                'description' => 'Нова серія геймерських моніторів від ColorWay зі швидкістю оновлення 165 Гц та технологією G-Sync тепер доступна в Україні',
                'date' => '2024-06-05',
                'is_new' => false,
                'image_default' => 'assets/images/news-05.jpg',
                'image_mobile' => 'assets/images/news-05-mobile.jpg',
                'image_tablet' => 'assets/images/news-05-tablet.jpg',
                'content' => 'Нова серія геймерських моніторів від ColorWay зі швидкістю оновлення 165 Гц та технологією G-Sync тепер доступна в Україні. Наші монітори забезпечують кришталево чисте зображення, мінімальний час відгуку та плавний геймплей у найвимогливіших іграх.'
            ],
            [
                'title' => 'Відкриття офіційного інтернет-магазину ColorWay',
                'description' => 'З радістю повідомляємо про запуск оновленого офіційного інтернет-магазину ColorWay з розширеним асортиментом та спеціальними пропозиціями',
                'date' => '2024-05-15',
                'is_new' => false,
                'image_default' => 'assets/images/news-06.jpg',
                'image_mobile' => 'assets/images/news-06-mobile.jpg',
                'image_tablet' => 'assets/images/news-06-tablet.jpg',
                'content' => 'З радістю повідомляємо про запуск оновленого офіційного інтернет-магазину ColorWay з розширеним асортиментом та спеціальними пропозиціями. На сайті ви знайдете повний каталог нашої продукції з детальними описами та характеристиками.'
            ],
        ];

        foreach ($news as $item) {
            News::create($item);
        }
    }
}
