<?php

namespace App\Models;

use Illuminate\Support\Facades\Storage;

class News
{
    // private array $news = [
    //     1 => [
    //         'id' => 1,
    //         'category_id' => 1,
    //         'title' => 'Шарлиз Терон рассказала о желании режиссера одевать ее более сексуально
    //         ',
    //         'text' => 'Актриса Шарлиз Терон рассказала, что режиссер заставлял ее носить откровенные наряды

    //         Фото: Aude Guerrucci / Reuters
            
    //         Американская и южноафриканская актриса Шарлиз Терон рассказала о неприятном опыте взаимодействия с режиссером-мужчиной. ',
    //         'isPrivate' => true
    //     ],
    //     2 => [
    //         'id' => 2,
    //         'category_id' => 1,
    //         'title' => 'Пианист Денис Мацуев выступит в Государственном Кремлевском дворце',
    //         'text' => 'Пианист Денис Мацуев выступит в Кремлевском дворце в честь Международного дня музыки

    //         Фото: Екатерина Цветкова / Global Look Press
            
    //         Российский пианист Денис Мацуев выступит в Государственном Кремлевском дворце в честь Международного дня музыки. Об этом сообщается в пресс-релизе, поступившем в редакцию',
    //         'isPrivate' => true
    //     ],
    //     3 => [
    //         'id' => 3,
    //         'category_id' => 1,
    //         'title' => 'В университете Нью-Йорка начнут изучать влияние творчества Ланы Дель Рей',
    //         'text' => 'В университете Нью-Йорка введут курс, посвященный влиянию творчества Ланы Дель Рей

    //         Фото: ZUMA Press / Globallookpress.com
            
    //         В университете Нью-Йорка введут курс, посвященный влиянию творчества американской певицы Ланы Дель Рей на формирование музыкальной индустрии 21 века. Об этом сообщает Variety.
            
    //         Обучение под названием «Темы в записанной музыке: Лана Дель Рей» пройдет с 20 октября по 8 декабря. Преподавать курс студентам будет его автор и журналистка Кэти Яндоли.
            
    //         Помимо вклада исполнительницы в формирование современной музыкальной индустрии, в обучении будут разобраны отношение артистки к феминизму и ее связь с движениями за социальную справедливость, такими как Black Lives Matter, Me Too и Times Up. Также в пример будут приведены музыканты, на которых повлияло творчество певицы.',
    //         'isPrivate' => false
    //     ],
    //     4 => [
    //         'id' => 4,
    //         'category_id' => 1,
    //         'title' => 'Михаил Ефремов рассказал об отношении к заключенным',
    //         'text' => 'Михаил Ефремов рассказал об отношении к заключенным и переосмыслении ценностей в тюрьме
    //         СюжетДТП в Москве:
            
    //         Фото: Пресс-служба Мосгорсуда / РИА Новости
            
    //         Российский актер Михаил Ефремов, отбывающий наказание в колонии за то, что устроил смертельное ДТП в 2020 году, рассказал об отношении к сокамерникам. Об этом сообщает Starhit.
            
    //         Артист поведал, что раньше относился к заключенным нормально, а после освобождения из тюрьмы будет относиться еще лучше, так как в колонии сделано все, чтобы исправить человека.
            
    //         «Я на воле относился нормально к людям, которые прошли через лишение свободы. Думаю, сейчас, когда выйду на волю, буду относиться еще лучше, потому что это все-таки большой опыт. Человек, который прошел лишение свободы, у него было время и подумать, и поменяться. Наш фильм называется "Переоценка ценностей", вот переоценка ценностей тут происходит практически с каждым», — отметил Ефремов.',
    //         'isPrivate' => false
    //     ],
    //     5 => [
    //         'id' => 5,
    //         'category_id' => 2,
    //         'title' => 'Российская теннисистка стала победительницей турнира WTA в Сеуле
    //         ',
    //         'text' => 'Российская теннисистка Александрова победила латвийку Остапенко в финале турнира в Сеуле

    //         Фото: Алексей Даничев / РИА Новости
            
    //         Российская теннисистка Екатерина Александрова стала победительницей турнира категории WTA 250 в Сеуле (Южная Корея). Об этом сообщает корреспондент «Ленты.ру».
            
    //         В финальном матче Александрова оказалась сильнее соперницы из Латвии Елены Остапенко. Россиянка победила ее в двух сетах со счетом 7:6 (7:4), 6:0. Продолжительность встречи составила 1 час 25 минут.',
    //         'isPrivate' => true
    //     ],
    //     6 => [
    //         'id' => 6,
    //         'category_id' => 2,
    //         'title' => 'Дацик оценил свою победу над Емельяненко',
    //         'text' => 'Дацик назвал свою победу над Емельяненко «лучшим примером антиалкогольной кампании»
    //         Александр Емельяненко
    //         Александр Емельяненко. Фото: Артур Лебедев / РИА Новости
            
    //         Российский боец смешанного стиля (MMA) Вячеслав Дацик оценил свою победу над соотечественником Александром Емельяненко. Об этом сообщает «Спорт-Экспресс».
            
    //         «Этот бой — лучший пример антиалкогольной кампании в стране, — заявил он, пояснив, что из-за алкоголя даже у спортсменов в форме ухудшается координация. — Конечно, жалко было Александра. За такое короткое время никакая фарма не поможет восстановиться».',
    //         'isPrivate' => true
    //     ],
    //     7 => [
    //         'id' => 7,
    //         'category_id' => 2,
    //         'title' => 'Карпин прокомментировал победу России над Киргизией
    //         ',
    //         'text' => 'Валерий Карпин заявил, что остался доволен просмотром новичков в матче с Киргизией

    //         Фото: Edgar Breshchanov / Globallookpress.com
            
    //         Главный тренер сборной России по футболу Валерий Карпин прокомментировал победу над Киргизией в товарищеском матче. Его слова приводит «Матч ТВ».
            
    //         «Кто‑то был лучше, кто‑то хуже. Просмотром новичков доволен. По игре есть недочеты, но это понятно», — сказал тренер. Он добавил, что отметил для себя нескольких игроков, но не стал называть их фамилии.',
    //         'isPrivate' => false
    //     ],
    //     8 => [
    //         'id' => 8,
    //         'category_id' => 2,
    //         'title' => 'Международная ассоциация бокса приостановила членство Украины',
    //         'text' => 'IBA приостановила членство Федерации бокса Украины из-за вмешательства страны в работу

    //         Фото: unsplash
            
    //         Международная ассоциация бокса (IBA) приостановила членство Федерации бокса Украины (ФБУ) из-за вмешательства государства в работу организации. Об этом сообщается на сайте организации.
            
    //         В IBA заявили, что решение будет отменено при соблюдении условий автономии федерации и признания властями страны выборов президента ФБУ от 17 декабря 2021 года. Они подчеркнули, что санкции не коснутся украинских спортсменов. В ассоциации пояснили, что боксеры смогут принять участие в соревнованиях под эгидой организации, так как IBA поддержит их финансово.',
    //         'isPrivate' => false
    //     ],
    //     9 => [
    //         'id' => 9,
    //         'category_id' => 3,
    //         'title' => 'Созданы управляемые лазером микророботы',
    //         'text' => 'Ученые CU разработали автономных микророботов для решения медицинских задач

    //         Кадр: Cornell University / YouTube
            
    //         Ученые Корнеллского университета (США) создали микроробота, управляемого с помощью лазера. Об этом сообщается на сайте организации.
            
    //         По словам специалистов, ранее им приходилось управлять и давать энергию микророботам с помощью проводного интерфейса. Однако ученые разработали миниатюрные машины размером от 100 до 250 микрометров, которыми можно управлять удаленно с помощью лазера. Четвероногие микророботы могут менять направление движения и скорость в зависимости от желания оператора.',
    //         'isPrivate' => true
    //     ],
    //     10 => [
    //         'id' => 10,
    //         'category_id' => 3,
    //         'title' => 'Найден эффективный биомаркер одного из самых смертельных видов рака',
    //         'text' => 'Nature Cancer: белок METTL16 предложили использовать в качестве биомаркера рака

    //         Фото: Reuters Staff / Reuters
            
    //         Команда ученых из клиники Майо обнаружила новый эффективный биомаркер в гене, который может привести к более точной диагностике и лечению одного из самых смертельных видов рака — протоковой аденокарциномы поджелудочной железы (PDAC). Они предложили использовать для этого белок METTL16. Выводы исследования описаны в журнале Nature Cancer.',
    //         'isPrivate' => true
    //     ],
    //     11 => [
    //         'id' => 11,
    //         'category_id' => 3,
    //         'title' => 'Найдены новые доказательства возникновения жизни на Земле из космоса',
    //         'text' => 'На астероиде Рюгу нашли каплю жидкой воды

    //         Фото: 江戸村のとくぞう / Wikimedia
            
    //         Международная группа ученых, возглавляемая исследователями из Университета Тохоку, нашла новые доказательства возникновения жизни на Земле из космоса, сообщает The Guardian.
            
    //         В ходе работы специалисты проанализировали образцы пыли, полученные японским зондом «Хаябуса-2» с астероида Рюгу. Аппарат был запущен в 2014 году и вернулся на планету в 2020 году. В объекте, который находился в 300 миллионах километрах от Земли, обнаружили жидкую каплю воды.',
    //         'isPrivate' => false
    //     ],
    //     12 => [
    //         'id' => 12,
    //         'category_id' => 3,
    //         'title' => 'Изучена реакция младенцев в утробе на вкус и запах',
    //         'text' => 'Psychological Science: исследована реакция младенцев в утробе на вкус и запах

    //         Фото: Melanie Brown / Unsplash
            
    //         Британские специалисты из Университета Дарема изучили реакцию младенцев в утробе матери на вкус и запах с помощью 4D-ультразвукового исследования. Результаты работы опубликованы в журнале Psychological Science.
            
    //         Медики попросили 100 беременных женщин употреблять одну капсулу, содержащую примерно 400 миллиграммов моркови или 400 миллиграммов порошка из капусты за 20 минут до каждого сканирования. После чего ученые изучили реакцию на лице еще нерожденных детей. Те плоды, чьи матери принимали капсулы с морковным порошком, демонстрировали выражение лица, напоминающее улыбку. А из группы с капустой скорее огорчение.',
    //         'isPrivate' => false
    //     ],
    //     13 => [
    //         'id' => 13,
    //         'category_id' => 4,
    //         'title' => 'Глава СПЧ предложил увеличить призывной возраст натурализованных граждан',
    //         'text' => 'Глава СПЧ Фадеев предложил увеличить призывной возраст натурализованных россиян до 50 лет

    //         Фото: Shutterstock
            
    //         Глава Совета по правам человека (СПЧ) Валерий Фадеев предложил увеличить призывной возраст натурализованных граждан России до 45 или 50 лет. Об этом пишет ТАСС.
            
    //         Фадеев объяснил, что согласно российской Конституции, защита Отечества является долгом и обязанностью каждого гражданина России, без различий «между теми, кто получил гражданство по рождению, и теми, кто был натурализован». По его мнению, «необходимо заполнить эту правовую лакуну» и рассмотреть возможность увеличить призывной возраст натурализованных россиян до 45 или 50 лет.',
    //         'isPrivate' => true
    //     ],
    //     14 => [
    //         'id' => 14,
    //         'category_id' => 4,
    //         'title' => 'В падении экономики Европы увидели выгоду для США',
    //         'text' => 'Сенатор Совфеда Пушков увидел выгоду США от падения экономики Евросоюза из-за разрыва с РФ

    //         Фото: Нина Зотина / РИА Новости
            
    //         Сенатор Совета Федерации Алексей Пушков указал на выгоду для США от падения экономики Европы. Об этом он написал в своем Telegram-канале.
            
    //         «Падение Европы, ее экономики — на руку Соединенным Штатам. Блокируя любой диалог Европы с Россией, в том числе через так называемых младоевропейцев, США сознательно ослабляют Европу, все глубже загоняя ее в положение американского вассала», — объяснил политик.',
    //         'isPrivate' => true
    //     ],
    //     15 => [
    //         'id' => 15,
    //         'category_id' => 4,
    //         'title' => 'Матвиенко призвала губернаторов провести мобилизацию без ошибок',
    //         'text' => 'Спикер Совфеда Матвиенко призвала губернаторов обеспечить частичную мобилизацию без ошибок

    //         Фото: пресс-служба Совета Федерации
            
    //         Спикер Совета Федерации Валентина Матвиенко обратилась к губернаторам с просьбой обеспечить мобилизацию без ошибок. Об этом она написала в своем Telegram-канале.
            
    //         «Если необходимо, круглосуточно семь дней в неделю будьте в постоянном контакте с военкомами, на прямой связи с региональными омбудсменами и представителями общественности, но обеспечьте реализацию частичной мобилизации в полном и абсолютном соответствии объявленным критериям», — призвала она глав регионов. Она напомнила, что именно губернаторы являются председателями призывных комиссий.',
    //         'isPrivate' => false
    //     ],
    //     16 => [
    //         'id' => 16,
    //         'category_id' => 4,
    //         'title' => 'Названа возможная дата выступления Путина с посланием к Федеральному собранию',
    //         'text' => 'Президент России Путин может выступить с посланием Федеральному собранию 30 сентября

    //         Фото: Алексей Даничев / РИА Новости
            
    //         Президент России Владимир Путин может выступить с посланием к Федеральному собранию 30 сентября. Возможную дату обращения российского лидера называет РИА Новости со ссылкой на источник в парламенте.
            
    //         О том, что послание Федеральному Собранию могут отложить на осень, стало известно в июле. Позднее официальный представитель Кремля Дмитрий Песков заявил, что послание состоится до конца года. При этом он добавил, что большая пресс-конференция и прямая линия с главой государства также состоятся.',
    //         'isPrivate' => false
    //     ],
    //     17 => [
    //         'id' => 17,
    //         'category_id' => 5,
    //         'title' => 'В Северной Осетии рассказали о работе КПП на границе с Грузией',
    //         'text' => 'РБК: КПП «Верхний Ларс» на российско-грузинской границе работает в штатном режиме

    //         Фото: Александр Чипурин / РИА Новости
            
    //         Пункт пропуска «Верхний Ларс», где проходит граница России и Грузии, работает в штатном режиме. Об этом рассказали РБК в пресс-службе пограничного управления республики Северная Осетия-Алания.
            
    //         «Пункт пропуска "Верхний Ларс" работает в штатном режиме без каких-либо ограничений. Все полосы для движения, предназначенные для пропуска, работают в штатном режиме», — заявили там.',
    //         'isPrivate' => true
    //     ],
    //     18 => [
    //         'id' => 18,
    //         'category_id' => 5,
    //         'title' => 'Еще две авиакомпании пообещали вернуть деньги за билеты мобилизованным россиянам',
    //         'text' => 'S7 и Nordwind вернут деньги мобилизованным россиянам, купившим билеты до 21 сентября

    //         Фото: Иван Водопьянов / Коммерсантъ
            
    //         Еще две российские авиакомпании — S7 и Nordwind — пообещали россиянам в случае призыва полностью вернуть деньги за билеты. Об этом говорится на сайте перевозчиков.
            
    //         Отмечается, что мобилизованным россиянам, которые купили билеты до 10 часов утра по московскому времени 21 сентября, гарантируют полный возврат средств. Правило распространяется не только на самих призывников, но и на членов их семей, если они собирались лететь вместе.',
    //         'isPrivate' => true
    //     ],
    //     19 => [
    //         'id' => 19,
    //         'category_id' => 5,
    //         'title' => 'Финляндия запретит транзит россиян с шенгеном
    //         ',
    //         'text' => 'Власти Финляндии уточнили детали решения по ограничению въезда в страну для россиян. Об этом пишет ТАСС.

    //         В МИД Финляндии заявили, что в ближайшие дни пересечение границы российскими туристами будет ограничено. Так, гражданам России будет разрешен въезд в страну только с целью посещения друзей и родственников, транзит по шенгенским визам, в том числе полученным в других странах, будет запрещен.
            
    //         В министерстве также отметили, что отказ проходить военную службу не является основанием для подачи заявления на предоставление убежища в Финляндии. Глава МИД Пекка Хаависто добавил, что россиянам, въезжающим с целями работы, учебы или посещения родственников, продолжат выдавать визы, однако для владельцев недвижимости облегченный порядок получения виз будет отменен.',
    //         'isPrivate' => false
    //     ],
    //     20 => [
    //         'id' => 20,
    //         'category_id' => 5,
    //         'title' => 'Определено самое популярное у российских туристов новогоднее направление',
    //         'text' => 'Этой зимой для россиян Таиланд может войти в топ-5 популярных направлений для отдыха, составив конкуренцию Турции, Египту, ОАЭ и Мальдивам. Об этом сообщили в Ассоциации туроператоров России (АТОР).

    //         «Настолько большого всплеска продаж, как в годы, когда на Таиланд в зимний период приходилось 70 процентов годовых бронирований, сейчас ожидать нельзя. Однако и недооценивать потенциал направления не стоит», — подчеркнули в ассоциации.',
    //         'isPrivate' => false
    //     ],
    // ];

    public function getNews(): array
    {
        return json_decode(Storage::disk('local')->get('news.json'), true);
    }

    public function getCategoryNews($categoryId): ?array
    {
        $news = [];
        foreach ($this->getNews() as $item) {
            if ($item['category_id'] == $categoryId) {
                $news[] = $item;
            }
        }
        return $news;
    }

    public function getNewsById($id): ?array
    {
        $news = $this->getNews();
        if (array_key_exists($id, $news)) {
            return $news[$id];
        } else {
            return null;
        }
    }
}
