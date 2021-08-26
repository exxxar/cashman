<?php

namespace Database\Seeders;

use App\Models\CompanyAdvertising;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CompanyAdvertisingTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    public function run()
    {

        $advertisings = [
            [
                'title' => 'Вы ждали возвращение наших детских мастер-классов? Мы тоже!🤗', 'description' => '15 августа в 13:00 пройдёт любимая детская вечеринка с самим Mario👷🏻
Ваших деток будут ждать:

😻Серебряное шоу
⛹Приключенческий квест
👯‍♀Дискотека
🍬Кулинарный мастер-класс по приготовлению Рафаэлло

БарБоско очень соскучился по вашим малышам! С нетерпением ждём встречи!♥

🔶🔶🔶🔶🔶🔶
☎0713100788
📍Ленинский проспект, 11б, Донецк', 'company_id' => DB::table('companies')->where('title', 'BAR BOSKO')->value('id'), 'creator_id' => 1, 'is_active' => true,
                'type' => 'Баннер', 'images' => ['main' => 'news/barbosko_news.jpg']
            ],
            [
                'title' => 'Вы ждали возвращение наших детских мастер-классов? Мы тоже!🤗', 'description' => '15 августа в 13:00 пройдёт любимая детская вечеринка с самим Mario👷🏻
🔶🔶🔶🔶🔶🔶
☎0713100788
📍Ленинский проспект, 11б, Донецк', 'company_id' => DB::table('companies')->where('title', 'BAR BOSKO')->value('id'), 'creator_id' => 1, 'is_active' => true,
                'type' => 'Сторис', 'images' => ['main' => 'news/barbosko_news.jpg']
            ],
            [
                'title' => 'СЕТ ВЫХОДНОГО ДНЯ🔥', 'description' => 'Каждую неделю в субботу и воскресенье:

⭕СЕТ "Weekend in Chicago" ВСЕГО ЗА 469 руб

В состав сета входт:
- 2 бургера "Ichiken"
- Сырные шарики
- Картофель фри
- Куриные стрипсы

*Акция действует также на самовынос и доставку.

📲 +38(071)07-888-70, +38(071)50-777-05
🏡 ул. Артёма, 133б (ТЦ Форум)', 'company_id' => DB::table('companies')->where('title', 'Diner')->value('id'), 'creator_id' => 1, 'is_active' => true,
                'type' => 'Баннер', 'images' => ['main' => 'news/isushi_news.jpg']
            ],
            [
                'title' => 'СЕТ ВЫХОДНОГО ДНЯ🔥', 'description' => 'Каждую неделю в субботу и воскресенье: ⭕СЕТ "Weekend in Chicago" ВСЕГО ЗА 469 руб
📲 +38(071)07-888-70, +38(071)50-777-05
🏡 ул. Артёма, 133б (ТЦ Форум)', 'company_id' => DB::table('companies')->where('title', 'Diner')->value('id'), 'creator_id' => 1, 'is_active' => true,
                'type' => 'Сторис', 'images' => ['main' => 'news/isushi_news.jpg']
            ],

            [
                'title' => 'СЕТ ВЫХОДНОГО ДНЯ🔥', 'description' => 'Каждую неделю в субботу и воскресенье:

⭕СЕТ "Weekend in Chicago" ВСЕГО ЗА 469 руб

В состав сета входт:
- 2 бургера "Ichiken"
- Сырные шарики
- Картофель фри
- Куриные стрипсы

*Акция действует также на самовынос и доставку.

📲 +38(071)07-888-70, +38(071)50-777-05
🏡 ул. Артёма, 133б (ТЦ Форум)', 'company_id' => DB::table('companies')->where('title', 'ISUSHI')->value('id'), 'creator_id' => 1, 'is_active' => true,
                'type' => 'Баннер', 'images' => ['main' => 'news/isushi_news.jpg']
            ],
            [
                'title' => 'СЕТ ВЫХОДНОГО ДНЯ🔥', 'description' => 'Каждую неделю в субботу и воскресенье:
⭕СЕТ "Weekend in Chicago" ВСЕГО ЗА 469 руб
📲 +38(071)07-888-70, +38(071)50-777-05
🏡 ул. Артёма, 133б (ТЦ Форум)', 'company_id' => DB::table('companies')->where('title', 'ISUSHI')->value('id'), 'creator_id' => 1, 'is_active' => true,
                'type' => 'Сторис', 'images' => ['main' => 'news/isushi_news.jpg']
            ],

            [
                'title' => 'СЕТ ВЫХОДНОГО ДНЯ🔥', 'description' => 'Каждую неделю в субботу и воскресенье:

⭕СЕТ "Weekend in Chicago" ВСЕГО ЗА 469 руб

В состав сета входт:
- 2 бургера "Ichiken"
- Сырные шарики
- Картофель фри
- Куриные стрипсы

*Акция действует также на самовынос и доставку.

📲 +38(071)07-888-70, +38(071)50-777-05
🏡 ул. Артёма, 133б (ТЦ Форум)', 'company_id' => DB::table('companies')->where('title', 'BURGER BAR')->value('id'), 'creator_id' => 1, 'is_active' => true,
                'type' => 'Баннер', 'images' => ['main' => 'news/isushi_news.jpg']
            ],
            [
                'title' => 'СЕТ ВЫХОДНОГО ДНЯ🔥', 'description' => 'Каждую неделю в субботу и воскресенье:
⭕СЕТ "Weekend in Chicago" ВСЕГО ЗА 469 руб
🏡 ул. Артёма, 133б (ТЦ Форум)', 'company_id' => DB::table('companies')->where('title', 'BURGER BAR')->value('id'), 'creator_id' => 1, 'is_active' => true,
                'type' => 'Сторис', 'images' => ['main' => 'news/isushi_news.jpg']
            ],

            [
                'title' => 'Кофе фраппе – лёгкий освежающий напиток', 'description' => 'Кофе фраппе',
                'company_id' => DB::table('companies')->where('title', 'AR COFFEE')->value('id'), 'creator_id' => 1, 'is_active' => true,
                'type' => 'Сторис', 'images' => ['main' => 'news/arcoffe_news.jpg']
            ],

            [
                'title' => 'Кофе фраппе – лёгкий освежающий напиток', 'description' => 'Кофе фраппе – лёгкий освежающий напиток, основу которого составляют эспрессо и колотый лёд. Само название Frappe – французское, обозначающее «бить», «стучать». А история появления напитка – жаркая, греческая. Считается, что фраппе придуман в 1957 году на Международной торговой ярмарке в Салониках, когда один из участников выставки не смог найти кипяток для заваривания растворимого кофе и взболтал его с холодной водой и льдом.',
                'company_id' => DB::table('companies')->where('title', 'AR COFFEE ')->value('id'), 'creator_id' => 1, 'is_active' => true,
                'type' => 'Баннер', 'images' => ['main' => 'news/arcoffe_news.jpg']
            ],

            [
                'title' => 'Одежда для фитнеса', 'description' => 'Для начала определимся с тканью для будущего костюма. Тут выбор невелик: либо хлопок, либо синтетика. На первый взгляд, натуральная ткань предпочтительнее. Но так ли это на самом деле? Практика показывает, что хлопковые ткани впитывают пот во время тренировок, растягиваются, линяют и вообще быстро теряют свою форму. То ли дело инновационная синтетика! Она отлично тянется, держит форму и в то же время выводит всю влагу на поверхность, не прилипая к коже. Можно остановиться на таких тканях, как мерил, сапплекс или смесовых тканях с добавлением полиэстера и эластана. Они не мнутся, не портятся от соленой и хлорированной воды и солнца, а еще – к ним равнодушна моль!

Сегодня становится все популярнее модная одежда для фитнеса из вискозы. Она отлично прилегает к телу, не стесняет движения, практически не теряет яркости цвета и приятна на ощупь. На взгляд многих специалистов, лучшая на сегодняшний день ткань - DIWO (Dry In Wet Out) от итальянской компании FREDDY. Эта ткань имеет двухслойную структуру: внутренний нейлоновый слой поглощает влагу, а внешний – хлопчатобумажный – незаметно ее выводит.',
                'company_id' => DB::table('companies')->where('title', 'BODY MASTER')->value('id'), 'creator_id' => 1, 'is_active' => true,
                'type' => 'Баннер', 'images' => ['main' => 'news/bodymaster_news.jpg']
            ],
            [
                'title' => 'Одежда для фитнеса', 'description' => 'Для начала определимся с тканью для будущего костюма.',
                'company_id' => DB::table('companies')->where('title', 'BODY MASTER')->value('id'), 'creator_id' => 1, 'is_active' => true,
                'type' => 'Сторис', 'images' => ['main' => 'news/bodymaster_news.jpg']
            ],

            [
                'title' => 'Сыр Дор Блю', 'description' => 'Сыр Дор Блю обладает плотной неоднородной консистенцией и маслянистой структурой, легко ломается. Сырная масса белого или кремового цвета пронизана тёмно-зелёными прожилками плесени, которая образует специфический «мраморный» узор.

Оформить заказ можно по телефону: ☎
Тел. (050) 700-68-80.
+38(071)305-88-77.

Мы находимся : 🗺
Университетская 20

График работы :⏳
с 10 .00 до 21.00
Без выходных', 'company_id' => DB::table('companies')->where('title', 'Царский')->value('id'), 'creator_id' => 1, 'is_active' => true,
                'type' => 'Баннер', 'images' => ['main' => 'news/carskiy_news.jpg']
            ],
            [
                'title' => 'Сыр Дор Блю', 'description' => 'Сыр Дор Блю.Оформить заказ можно по телефону: ☎
Тел. (050) 700-68-80.
+38(071)305-88-77.
График работы :⏳
с 10 .00 до 21.00
Без выходных', 'company_id' => DB::table('companies')->where('title', 'Царский')->value('id'), 'creator_id' => 1, 'is_active' => true,
                'type' => 'Сторис', 'images' => ['main' => 'news/carskiy_news.jpg']
            ],

            [
                'title' => 'Пляжная вечеринка 🌴', 'description' => '
Взрывная party 👯‍♀ в вейк-парке «Остров»',
                'company_id' => DB::table('companies')->where('title', 'ОСТРОВ Wake Park Donetsk')->value('id'), 'creator_id' => 1, 'is_active' => true,
                'type' => 'Сторис', 'images' => ['main' => 'news/ostrov_news.jpg']
            ],
            [
                'title' => 'Пляжная вечеринка 🌴', 'description' => '
Взрывная party 👯‍♀ в вейк-парке «Остров», превратит Ваш обычный выходной в яркую радугу цвета и феерию эмоций !',
                'company_id' => DB::table('companies')->where('title', 'ОСТРОВ Wake Park Donetsk')->value('id'), 'creator_id' => 1, 'is_active' => true,
                'type' => 'Баннер', 'images' => ['main' => 'news/ostrov_news.jpg']
            ],

            [
                'title' => 'Пицца «Капричиоза»', 'description' => '
Пицца с ярким вкусом. Хорошо подходит для большой компании. Классическое сочетание балыка, грибов и помидоров. тесто – 200г; соус – 80г; сыр – 70г; балык – 20г; грибы свежие – 20г; маслины – 20г; помидоры – 30г; зелень петрушки – 3',
                'company_id' => DB::table('companies')->where('title', 'Chelentano')->value('id'), 'creator_id' => 1, 'is_active' => true,
                'type' => 'Баннер', 'images' => ['main' => 'news/chelentano_news.jpg']
            ],
            [
                'title' => 'Пицца «Капричиоза»', 'description' => '
Пицца с ярким вкусом. Хорошо подходит для большой компании',
                'company_id' => DB::table('companies')->where('title', 'Chelentano')->value('id'), 'creator_id' => 1, 'is_active' => true,
                'type' => 'Сторис', 'images' => ['main' => 'news/chelentano_news.jpg']
            ],


        ];
        $property = [
            'price'=> 100,
            'creator_id'=>1
        ];
            foreach ($advertisings as $advertising)
                CompanyAdvertising::create([
                    'title' => $advertising['title'],
                    'description' => $advertising['description'],
                    'company_id' => $advertising['company_id'],
                    'regularity' =>1,
                    'properties' => [
                        'price' => $property['price'],
                        'creator_id' => $property['creator_id'],
                    ],
                    'creator_id' => $advertising['creator_id'],
                    'is_active' => $advertising['is_active'],
                    'images' => [
                        'main' => $advertising['images']['main']
                    ],
                    'type' => $advertising['type']
                ]);


    }

}
