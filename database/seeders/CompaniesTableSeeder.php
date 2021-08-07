<?php

namespace Database\Seeders;

use App\Models\Company;
use Illuminate\Database\Seeder;


class CompaniesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $companies = [
            [
                'title' => 'AR COFFEE', 'domain' => 'arcoffee_dn_bot', 'cashback_percent' => 7, 'cashback_percent_level_1' => 3,
                'cashback_percent_level_2' => 1, 'description' => 'Вкусный кофе в центре Донецка! У нас вы можете купить много сортов натурального кофе вместе с нашей фирменной выпечкой!',
                'image' => 'companyLogos/arcoffee.jpg', 'position' => [48.008579, 37.810202],
                'company_group_id' => 1, 'properties' => ['short_description' => 'Вкусный кофе в центре Донецка!', 'time' => '8.00-21.00', 'address' => 'Бульвар Шевченко, 13'],
                'socials' => ['instagram' => 'https://www.instagram.com/arcoffee_dn/', 'telegram' => 'https://t.me/arcoffee_dn_bot/'], 'callback_url' => 'https://t.me/arcoffee_dn_bot/',
                'is_active' => true, 'upload_vk_url' => '', 'creator_id' => 1],
            [
                'title' => 'ISUSHI', 'domain' => 'isushi-dn.ru', 'cashback_percent' => 10, 'cashback_percent_level_1' => 3,
                'cashback_percent_level_2' => 1, 'description' => 'BURGERS&ISUSHI - это объединение самых популярных кухонь.\n Благодаря этому мы предоставляем самый широкий ассортимент направлений - wok, суши и роллы, сочные бургеры, пиццы на тонком и на толстом тесте, закуски и обеды.\n Уникальные авторские рецепты, классические блюда, множество скидок и акций, система кешбека - все это делает нас теми, кто мы есть.\n Для нас важен каждый гость, именно поэтому мы так ценим качество!',
                'image' => 'companyLogos/isushi.jpg', 'position' => [48.013024, 37.803327],
                'company_group_id' => 2, 'properties' => ['short_description' => 'BURGERS•PIZZA•SUSHI•WOK🔥', 'time' => '10.00-22.00', 'address' => 'Ул. Артёма,133б, ТЦ Форум'], 'socials' => ['instagram' => 'https://www.instagram.com/burgers_isushi_dn/', 'telegram' => 'https://t.me/diner_dn_bot', 'vk' => 'https://vk.com/burgers_isushi_dn'],
                'callback_url' => 'https://t.me/arcoffee_dn_bot/',
                'is_active' => true, 'upload_vk_url' => 'https://vk.com/burgers_isushi_dn', 'creator_id' => 1
            ],
            [
                'title' => 'BAR BOSKO', 'domain' => 'barbosko_bot', 'cashback_percent' => 10, 'cashback_percent_level_1' => 3,
                'cashback_percent_level_2' => 1, 'description' => 'Ресторан БарБоско - это душевная обстановка, сытная домашняя кухня и необычные согревающие напитки.\nКогда мы говорим о настоящей кухне, то всегда подразумеваем с детства знакомые домашние мотивы, которые из поколения в поколение передаются и бережно сохраняются.\n И как же здорово, что в Республике все больше таких мест.\n Ресторан домашней кухни «БарБоско» поражает своей фирменной начинкой. Пожалуй, это самый уникальный рестораны в столице, где как на международном музыкальном фестивале, бок о бок, в дружеской и гостеприимной атмосфере, стоят стили разных кухонь.\n Невероятная задача стоявшая перед рестораторами, объединить блюда разных стран выполнена на отлично!',
                'image' => 'companyLogos/barbosko.jpg', 'position' => [47.986519, 37.786077],
                'company_group_id' => 3, 'properties' => ['short_description' => 'По любым вопросам Вы можете обратиться по телефону:\n +38 (071) 310-07-88', 'time' => '11.00-22.00', 'address' => 'Ленинский проспект, 11б'], 'socials' => ['instagram' => 'https://www.instagram.com/bar.bosco.cafe/', 'telegram' => 'https://t.me/barbosko_bot', 'vk' => 'https://vk.com/barbosko_donetsk'],
                'callback_url' => 'https://vk.com/barbosko_donetsk',
                'is_active' => true, 'upload_vk_url' => 'https://vk.com/barbosko_donetsk', 'creator_id' => 1
            ],
            [
                'title' => 'BODY MASTER', 'domain' => 'bodymaster.ru', 'cashback_percent' => 10, 'cashback_percent_level_1' => 3,
                'cashback_percent_level_2' => 1, 'description' => 'BODY MASTER - территория красивого и здорового тела, хорошего настроения и заряда энергией⚡️',
                'image' => 'companyLogos/bodymaster.jpg', 'position' => [48.022055, 37.803578],
                'company_group_id' => 4, 'properties' => ['short_description' => '🔹Индивидуальный подход\n 🔹Функциональные тренировки\n 🔹Тренажёрный зал\n 🔹Программы для здоровья.\n По любым вопросам Вы можете обратиться по телефону:\n +38071 009 0009', 'time' => 'ПН-ПТ 8:00-21:00\n СБ-ВС 9:00-19:00', 'address' => 'г. Донецк, пр-кт Германа Титова 9'],
                'socials' => ['instagram' => 'https://www.instagram.com/bodymaster_dn/', 'telegram' => 'https://t.me/body_master_bot/', 'vk' => 'https://vk.com/club46584117'], 'callback_url' => 'https://bodymaster.ru',
                'is_active' => true, 'upload_vk_url' => 'https://vk.com/club46584117', 'creator_id' => 1
            ],
            [
                'title' => 'BURGER BAR', 'domain' => 'burgerbardonetsk.com', 'cashback_percent' => 7, 'cashback_percent_level_1' => 3,
                'cashback_percent_level_2' => 1, 'description' => 'Burger Bar\n Донецк, бул. Пушкина, 28\n +38 (066) 177-51-88\n +38 (071) 327-77-20',
                'image' => 'companyLogos/burgerbar.jpg', 'position' => [48.008579, 37.810202],
                'company_group_id' => 3, 'properties' => ['short_description' => 'Вкусные бургеры в центре Донецка!', 'time' => '8.00-21.00', 'address' => 'Бул. Пушкина, 28'], 'socials' => ['instagram' => 'https://www.instagram.com/burgerbardonetsk/', 'telegram' => 'https://t.me/burgerbardonetsk_bot/', 'vk' => 'https://vk.com/burgerbardonetsk'], 'callback_url' => 'https://t.me/burgerbardonetsk_bot/',
                'is_active' => true, 'upload_vk_url' => 'https://vk.com/burgerbardonetsk', 'creator_id' => 1
            ],
            [
                'title' => 'Царский', 'domain' => 'carskiy_dn', 'cashback_percent' => 7, 'cashback_percent_level_1' => 3,
                'cashback_percent_level_2' => 1, 'description' => 'Магазин Царский - это живые раки в Донецке, креветка, махан и другая продукция к пиву для приятного времяпровождения! Мы дорожим своей репутацией и гарантируем, что наши продукты отвечают самым высоким стандартам и достойны самого изысканного вкуса.',
                'image' => 'companyLogos/carskiy.jpg', 'position' => [48.003713, 37.798700],
                'company_group_id' => 5, 'properties' => ['short_description' => 'Раки, устрицы, креветки, продукты к пиву', 'time' => '10 .00 до 21.00 - без выходных и перерывов', 'address' => 'Ул. Университетская, 20'], 'socials' => ['instagram' => 'https://www.instagram.com/carskiy_dn/', 'telegram' => 'https://t.me/carskiy_dn_bot/'], 'callback_url' => ' https://vk.com/raki_1',
                'is_active' => true, 'upload_vk_url' => ' https://vk.com/raki_1', 'creator_id' => 1
            ],
            [
                'title' => 'Chelentano', 'domain' => 'celentano.dn.ua', 'cashback_percent' => 10, 'cashback_percent_level_1' => 3,
                'cashback_percent_level_2' => 1, 'description' => 'Кафе «Пицца Челентано»! Вас ждут оригинальный интерьер, внимательный персонал и неизменно позитивная атмосфера 😉👌 Вам предложат блюда только из свежих продуктов, богатые на микроэлементы, витамины и минералы. Паста 🍝, блинчики 🥞, салаты 🥗, суши 🍣 и роллы 🍣, супы 🍲, напитки 🍹🍸🍷, десерты 🍰🍫🍒, настоящий кофе ☕ и конечно же самая вкусная пицца 🍕 в городе! Все блюда созданы, чтобы поразить Ваш вкус!',
                'image' => 'companyLogos/celentano.jpg', 'position' => [48.008579, 37.810202],
                'company_group_id' => 3, 'properties' => ['short_description' => 'ДОСТАВКА ПИЦЦЫ 🍕 И РОЛЛОВ 🍣 в любой район Донецка!👇\nСАЙТ ДОСТАВКИ 🚗\n👇 http://pizzachelentano.com/', 'time' => 'Мы работаем каждый день с 10:00 до 21:00 без перерыва и выходных.', 'address' => ['пр. Богдана-Хмельницкого 92', 'бул. Шевченко 48', 'ул. Артема 277']], 'socials' => ['instagram' => 'https://www.instagram.com/chelentanodonetsk/', 'telegram' => 'https://t.me/celentanodon_bot/', 'vk' => 'https://vk.com/celentanodonetsk'], 'callback_url' => 'https://t.me/celentanodon_bot/',
                'is_active' => true, 'upload_vk_url' => 'https://vk.com/celentanodonetsk', 'creator_id' => 1
            ],
            [
                'title' => 'Diner', 'domain' => 'diner-dn.ru', 'cashback_percent' => 10, 'cashback_percent_level_1' => 3,
                'cashback_percent_level_2' => 1, 'description' => '🍔 сочные, аппетитные бургеры\n 🍝 лапша WOK на любой вкус🍕\n ароматная пицца',
                'image' => 'companyLogos/diner.jpg', 'position' => [48.007746, 37.804889],
                'company_group_id' => 3, 'properties' => ['short_description' => 'Доставка: +38(071)07-888-70\nБронь: +38(071)50-777-05', 'time' => 'Режим работы: 09:00-22:00', 'address' => 'Артема, 127, Донецк'], 'socials' => ['instagram' => 'https://www.instagram.com/diner_dn/', 'telegram' => 'https://t.me/diner_dn_bot/', 'vk' => 'https://vk.com/diner_dn'], 'callback_url' => 'https://t.me/diner_dn_bot/',
                'is_active' => true, 'upload_vk_url' => 'https://vk.com/diner_dn', 'creator_id' => 1
            ],
            [
                'title' => 'ОСТРОВ Wake Park Donetsk', 'domain' => 'wake_bot', 'cashback_percent' => 7, 'cashback_percent_level_1' => 3,
                'cashback_percent_level_2' => 1, 'description' => 'Вейк-парк - место для экстремального спорта и семейного отдыха.',
                'image' => 'companyLogos/wakepark.jpg', 'position' => [47.985646, 37.728848],
                'company_group_id' => 6, 'properties' => ['short_description' => 'Вейк-парк - место для экстремального спорта и семейного отдыха.\n- Вейкбординг\n- Петанк\n- Пляжный волейбол\n- Бампербол\n- Батут',
                'time' => '10.00-22.00', 'address' => 'ул. Гете, 1в, Донецк'], 'socials' => ['instagram' => ' https://instagram.com/ostrov.wakeparkdonetsk', 'telegram' => 'https://t.me/wakepark_bot/', 'vk' => 'https://vk.com/ostrov.wakeparkdonetsk'], 'callback_url' => 'https://t.me/wakepark_bot',
                'is_active' => true, 'upload_vk_url' => 'https://vk.com/ostrov.wakeparkdonetsk', 'creator_id' => 1
            ],
            [
                'title' => 'Донецкий сувенир', 'domain' => 'shop.advdnr.ru', 'cashback_percent' => 7, 'cashback_percent_level_1' => 3,
                'cashback_percent_level_2' => 1, 'description' => 'Магазин сувениров. Сувенирная продукция. Подарки с символикой. Подарки с гравировкой.Корпоративные подарки. Футболки с печатью. Настольные игры.\n В нашем магазине представлена продукция для самого разного покупателя - от крупных учреждений и предприятий до коллекционеров и просто жителей, которые смогут теперь в одном месте купить подарки с символикой нашей Республики.\n
                 У нас вы точно найдете продукцию, которая Вам по душе.',
                'image' => 'companyLogos/souvenir.jpg', 'position' => [48.000119, 37.801240],
                'company_group_id' => 7, 'properties' => ['short_description' => 'сувенирная продукция\n 🎁подарки с символикой\n 🖋подарки с гравировкой\n 📔корпорат. подарки\n 👕футболки с 🎆\n 🧩настольные игры\n 📚комиксы', 'time' => 'Понедельник - выходной.\n10.00-19.00', 'address' => 'Бульвар Пушкина, 8'], 'socials' => ['instagram' => 'https://www.instagram.com/don.suvenir/', 'telegram' => 'https://t.me/souvenir_dn_bot/', 'vk' => 'https://vk.com/don.suvenir'],
                'callback_url' => 'https://vk.com/don.suvenir',
                'is_active' => true, 'upload_vk_url' => 'https://vk.com/don.suvenir', 'creator_id' => 1
            ]

        ];
        foreach ($companies as $company)
            Company::create([
                'title' => $company['title'],
                'domain' => $company['domain'],
                'cashback_percent' => $company['cashback_percent'],
                'cashback_percent_level_1' => $company['cashback_percent_level_1'],
                'cashback_percent_level_2' => $company['cashback_percent_level_2'],
                'description' => $company['description'],
                'image' => $company['image'],
                'position' => json_encode($company['position']),
                'company_group_id' => $company['company_group_id'],
                'properties' => json_encode($company['properties']),
                'socials' => json_encode($company['socials']),
                'callback_url' => $company['callback_url'],
                'is_active' => $company['is_active'],
                'upload_vk_url' => $company['upload_vk_url'],
                'creator_id' => $company['creator_id'],
            ]);
    }
}
