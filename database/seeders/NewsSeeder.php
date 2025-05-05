<?php

namespace Database\Seeders;

use App\Models\News;
use App\Models\NewsTranslation;
use Illuminate\Database\Seeder;

class NewsSeeder extends Seeder
{
    public function run(): void
    {
        // Массив с данными новостей
        $news = [
            [
                'date' => '2024-10-05',
                'is_new' => true,
                'image_default' => 'assets/images/news-01.jpg',
                'image_mobile' => 'assets/images/news-01-mobile.jpg',
                'image_tablet' => 'assets/images/news-01-tablet.jpg',
                'translations' => [
                    'uk' => [
                        'title' => 'Нова лінійка портативних акумуляторів з підтримкою швидкої зарядки',
                        'description' => 'Зустрічайте нову лінійку портативних акумуляторів Colorway з підтримкою технологій Quick Charge та Power Delivery',
                        'content' => 'Зустрічайте нову лінійку портативних акумуляторів Colorway з підтримкою технологій Quick Charge та Power Delivery. Наші нові моделі дозволяють заряджати ваші пристрої до 3 разів швидше, ніж звичайні зарядні пристрої.'
                    ],
                    'en' => [
                        'title' => 'New line of portable batteries with fast charging support',
                        'description' => 'Meet the new line of Colorway portable batteries with Quick Charge and Power Delivery technologies',
                        'content' => 'Meet the new line of Colorway portable batteries with Quick Charge and Power Delivery technologies. Our new models allow you to charge your devices up to 3 times faster than conventional chargers.'
                    ],
                    'ru' => [
                        'title' => 'Новая линейка портативных аккумуляторов с поддержкой быстрой зарядки',
                        'description' => 'Встречайте новую линейку портативных аккумуляторов Colorway с поддержкой технологий Quick Charge и Power Delivery',
                        'content' => 'Встречайте новую линейку портативных аккумуляторов Colorway с поддержкой технологий Quick Charge и Power Delivery. Наши новые модели позволяют заряжать ваши устройства до 3 раз быстрее, чем обычные зарядные устройства.'
                    ]
                ]
            ],
            [
                'date' => '2024-09-20',
                'is_new' => true,
                'image_default' => 'assets/images/news-02.jpg',
                'image_mobile' => 'assets/images/news-02-mobile.jpg',
                'image_tablet' => 'assets/images/news-02-tablet.jpg',
                'translations' => [
                    'uk' => [
                        'title' => 'Оновлення асортименту фотопаперу для струменевих принтерів',
                        'description' => 'Нові варіанти фотопаперу для професійного та домашнього використання',
                        'content' => 'Ми розширили наш асортимент фотопаперу для струменевих принтерів. Тепер доступні нові розміри та типи поверхні для різних завдань. Професійні фотографи оцінять нашу серію Premium з розширеним кольоровим охопленням та підвищеною стійкістю до вицвітання.'
                    ],
                    'en' => [
                        'title' => 'Updated range of photo paper for inkjet printers',
                        'description' => 'New photo paper options for professional and home use',
                        'content' => 'We have expanded our range of photo paper for inkjet printers. New sizes and surface types are now available for various tasks. Professional photographers will appreciate our Premium series with extended color gamut and increased resistance to fading.'
                    ],
                    'ru' => [
                        'title' => 'Обновление ассортимента фотобумаги для струйных принтеров',
                        'description' => 'Новые варианты фотобумаги для профессионального и домашнего использования',
                        'content' => 'Мы расширили наш ассортимент фотобумаги для струйных принтеров. Теперь доступны новые размеры и типы поверхности для различных задач. Профессиональные фотографы оценят нашу серию Premium с расширенным цветовым охватом и повышенной устойчивостью к выцветанию.'
                    ]
                ]
            ],
            [
                'date' => '2024-09-01',
                'is_new' => false,
                'image_default' => 'assets/images/news-03.jpg',
                'image_mobile' => 'assets/images/news-03-mobile.jpg',
                'image_tablet' => 'assets/images/news-03-tablet.jpg',
                'translations' => [
                    'uk' => [
                        'title' => 'Участь у виставці Consumer Electronics Show 2024',
                        'description' => 'Colorway представила нові продукти на найбільшій виставці споживчої електроніки',
                        'content' => 'З 9 по 12 січня наша компанія взяла участь у виставці Consumer Electronics Show 2024 в Лас-Вегасі. На нашому стенді були представлені нові моделі зарядних пристроїв, портативних акумуляторів та аксесуарів для мобільних пристроїв. Особливу увагу відвідувачів привернула наша нова серія екологічних аксесуарів, виготовлених з переробленого пластику.'
                    ],
                    'en' => [
                        'title' => 'Participation in Consumer Electronics Show 2024',
                        'description' => 'Colorway presented new products at the largest consumer electronics exhibition',
                        'content' => 'From January 9 to 12, our company participated in the Consumer Electronics Show 2024 in Las Vegas. Our booth featured new models of chargers, portable batteries, and accessories for mobile devices. Visitors were particularly interested in our new series of eco-friendly accessories made from recycled plastic.'
                    ],
                    'ru' => [
                        'title' => 'Участие в выставке Consumer Electronics Show 2024',
                        'description' => 'Colorway представила новые продукты на крупнейшей выставке потребительской электроники',
                        'content' => 'С 9 по 12 января наша компания приняла участие в выставке Consumer Electronics Show 2024 в Лас-Вегасе. На нашому стенді були представлені нові моделі зарядних пристроїв, портативних акумуляторів та аксесуарів для мобільних пристроїв. Особливу увагу відвідувачів привернула наша нова серія екологічних аксесуарів, виготовлених з переробленого пластику.'
                    ]
                ]
            ],
            [
                'date' => '2024-08-15',
                'is_new' => false,
                'image_default' => 'assets/images/news-04.jpg',
                'image_mobile' => 'assets/images/news-04-mobile.jpg',
                'image_tablet' => 'assets/images/news-04-tablet.jpg',
                'translations' => [
                    'uk' => [
                        'title' => 'Нові кабелі з підтримкою технології Power Delivery 3.0',
                        'description' => 'Наші нові кабелі підтримують швидку зарядку до 100 Вт та передачу даних зі швидкістю до 10 Гбіт/с',
                        'content' => 'Ми раді представити нову лінійку кабелів з підтримкою технології Power Delivery 3.0. Наші кабелі підтримують швидку зарядку потужністю до 100 Вт та передачу даних зі швидкістю до 10 Гбіт/с. Всі кабелі оснащені міцною оплеткою, яка захищає їх від пошкоджень та збільшує термін служби.'
                    ],
                    'en' => [
                        'title' => 'New cables with Power Delivery 3.0 technology support',
                        'description' => 'Our new cables support fast charging up to 100W and data transfer speeds up to 10Gbps',
                        'content' => 'We are pleased to introduce a new line of cables with Power Delivery 3.0 technology support. Our cables support fast charging up to 100W and data transfer speeds up to 10Gbps. All cables are equipped with durable braiding that protects them from damage and increases their lifespan.'
                    ],
                    'ru' => [
                        'title' => 'Новые кабели с поддержкой технологии Power Delivery 3.0',
                        'description' => 'Наши новые кабели поддерживают быструю зарядку до 100 Вт и передачу данных со скоростью до 10 Гбит/с',
                        'content' => 'Мы рады представить новую линейку кабелей с поддержкой технологии Power Delivery 3.0. Наши кабели поддерживают быструю зарядку мощностью до 100 Вт и передачу данных со скоростью до 10 Гбит/с. Все кабели оснащены прочной оплеткой, которая защищает их от повреждений и увеличивает срок службы.'
                    ]
                ]
            ],
            [
                'date' => '2024-07-25',
                'is_new' => false,
                'image_default' => 'assets/images/news-05.jpg',
                'image_mobile' => 'assets/images/news-05-mobile.jpg',
                'image_tablet' => 'assets/images/news-05-tablet.jpg',
                'translations' => [
                    'uk' => [
                        'title' => 'Відкриття нового сервісного центру в Києві',
                        'description' => 'Ми відкрили новий сервісний центр у Києві за адресою вул. Хрещатик, 15',
                        'content' => 'Раді повідомити про відкриття нового сервісного центру Colorway у Києві. Тепер ви можете отримати кваліфіковану допомогу з усіх наших продуктів за адресою вул. Хрещатик, 15. Сервісний центр працює з понеділка по п\'ятницю з 9:00 до 18:00 та в суботу з 10:00 до 15:00.'
                    ],
                    'en' => [
                        'title' => 'Opening of a new service center in Kyiv',
                        'description' => 'We have opened a new service center in Kyiv at 15 Khreshchatyk Street',
                        'content' => 'We are pleased to announce the opening of a new Colorway service center in Kyiv. Now you can get qualified assistance with all our products at 15 Khreshchatyk Street. The service center is open Monday to Friday from 9:00 to 18:00 and Saturday from 10:00 to 15:00.'
                    ],
                    'ru' => [
                        'title' => 'Открытие нового сервисного центра в Киеве',
                        'description' => 'Мы открыли новый сервисный центр в Киеве по адресу ул. Крещатик, 15',
                        'content' => 'Рады сообщить об открытии нового сервисного центра Colorway в Киеве. Теперь вы можете получить квалифицированную помощь по всем нашим продуктам по адресу ул. Крещатик, 15. Сервисный центр работает с понедельника по пятницу с 9:00 до 18:00 и в субботу с 10:00 до 15:00.'
                    ]
                ]
            ],
            [
                'date' => '2024-07-10',
                'is_new' => false,
                'image_default' => 'assets/images/news-06.jpg',
                'image_mobile' => 'assets/images/news-06-mobile.jpg',
                'image_tablet' => 'assets/images/news-06-tablet.jpg',
                'translations' => [
                    'uk' => [
                        'title' => 'Нова серія чорнил для принтерів Canon та Epson',
                        'description' => 'Представляємо нову серію чорнил преміум-класу для струменевих принтерів',
                        'content' => 'Ми раді представити нову серію чорнил преміум-класу для струменевих принтерів Canon та Epson. Наші чорнила забезпечують яскраві та насичені кольори, швидке висихання та стійкість до вицвітання. Вони ідеально підходять для друку фотографій та документів високої якості.'
                    ],
                    'en' => [
                        'title' => 'New series of ink for Canon and Epson printers',
                        'description' => 'Introducing a new series of premium ink for inkjet printers',
                        'content' => 'We are pleased to introduce a new series of premium ink for Canon and Epson inkjet printers. Our inks provide vibrant and rich colors, fast drying, and resistance to fading. They are perfect for printing high-quality photos and documents.'
                    ],
                    'ru' => [
                        'title' => 'Новая серия чернил для принтеров Canon и Epson',
                        'description' => 'Представляем новую серию чернил премиум-класса для струйных принтеров',
                        'content' => 'Мы рады представить новую серию чернил премиум-класса для струйных принтеров Canon и Epson. Наши чернила обеспечивают яркие и насыщенные цвета, быстрое высыхание и устойчивость к выцветанию. Они идеально подходят для печати фотографий и документов высокого качества.'
                    ]
                ]
            ]
        ];

        // Создаем новости и их переводы
        foreach ($news as $newsItem) {
            $translations = $newsItem['translations'];
            unset($newsItem['translations']);

            $createdNews = News::create($newsItem);

            foreach ($translations as $locale => $translation) {
                NewsTranslation::create([
                    'news_id' => $createdNews->id,
                    'locale' => $locale,
                    'title' => $translation['title'],
                    'description' => $translation['description'],
                    'content' => $translation['content'] ?? null,
                ]);
            }
        }
    }
}
