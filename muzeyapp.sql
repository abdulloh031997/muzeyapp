-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Май 10 2021 г., 01:27
-- Версия сервера: 10.3.13-MariaDB-log
-- Версия PHP: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `muzeyapp`
--

-- --------------------------------------------------------

--
-- Структура таблицы `about`
--

CREATE TABLE `about` (
  `id` int(11) NOT NULL,
  `language` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content_id` int(11) DEFAULT NULL,
  `name` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) DEFAULT 1,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `about`
--

INSERT INTO `about` (`id`, `language`, `content_id`, `name`, `image`, `status`, `created_at`, `updated_at`) VALUES
(1, 'ru', 40, '<p><strong>&nbsp;</strong><strong>Ўзбекистон амалий санъат ва ҳунармандчилик&nbsp;</strong><strong>тарихи давлат музейи</strong></p><p>&ldquo;Ўзбекистон амалий санъат ва ҳунармандчилик тарихи давлат музейи&rdquo; тарихи дастлаб 1927 йилдан, Тошкентда &ldquo;Ўзбекистон халқ усталарининг сара асарлари кўргазмаси&rdquo; ташкил этилгандан бошланади. Кейинчалик мазкур кўргазма &ldquo;Ўзбекистон халқ хўжалиги кўргазмаси&rdquo; номи остида доимий тарзда ташкиллаштирилиб борилган.</p><p>1937 йил 7 июлда &ldquo;Хунармадчилик музейи&rdquo; сифатида фаолият кўрсата бошлади.</p><p>Унинг биринчи директори рассом В.Развaдовский булган. У турли даврларда Москва ва Санкт-Петербургнинг Шарқ маданияти ва этнографияси музейи, Қуроллар палатаси музейи сингарилар фондини тўлдирган.</p><p><img src=\"https://lh3.googleusercontent.com/proxy/DUocmD3IpJ7msv_i__Htp-BBzsL1k0e4BnhzWfgmikpSA5TiCEyC0kJwJLFEHQaobOisn_zwrbCzN6EoOGwJxgo4SBEazMZ8HrNvIl5h\" alt=\"GO Tashkent | Amaliy san\'at muzeyi\" /></p><p><strong>1942 йилдаги ҳолати</strong></p><p>1938 йилда музей Шпильков кўчаси, 15 &ndash; уйдаги маданий мерос объектига, яъни рус дипломати А.А.Половцевнинг собиқ саройига жойлаштирилди. Музей биноси 1870 йилда курилган бўлиб, бу бинода 1896 &ndash; 1904 йиллари баддий безаш ишларида Тошкент ва Фарғоналик кулоллар, ёғоч ва ганч уймакор усталари қатнашди. Таъмир ишларида тошкентлик усталар Шералихужа Хасанов, Арслонкул Назаров, Тошпулат Арслонколов, Олимжон Косимжонов, қўқонлик уста Норкузи Нурматов, Риштонлик уста Абдулло ва марғилонлик уста Умурзок Ахмедов иштирок этишди. Барча бадиий пардоз бериш ишларига А.А.Половцевнинг шахсий котиби, Ўрта Осиё халқлари этнографияси бўйича профессори М.С.Андреев раҳбарлик қилди.</p><p>1960 йилдан музей номи &ldquo;Амалий санъатнинг доимий фаолиятдаги кургазмаси&rdquo; тарзида ўзгартирилди. 1970 йилда музейнинг экспозициялар майдонини кенгайтириш максадида эски бино ховлиси айланасига янги иморатлар билан тўлдирилди.</p><p>Музейнинг марказий зали (меҳмонхона) архитектура жиҳатидан жуда ҳам серҳашам қилиб безатилган. Унинг деворлари ўймакор ганч бўлиб устидан темпера бўёқлар берилган. Залнинг нақшкор шипини тўрт томондан моҳирона безатилган гулдор ва ўймакор устунлар ушлаб туради. Шипнинг қоқ ўртасида ва бурчакларида умумий композицияга мос тушадиган ховзаклар бор. Уларнинг атрофидан ўтказилган (планка) мураккаб геометрик чизиқли ховзак ичидаги гулларга қўшилиб кетади.</p><p><img src=\"https://lh3.googleusercontent.com/proxy/DUocmD3IpJ7msv_i__Htp-BBzsL1k0e4BnhzWfgmikpSA5TiCEyC0kJwJLFEHQaobOisn_zwrbCzN6EoOGwJxgo4SBEazMZ8HrNvIl5h\" alt=\"GO Tashkent | Amaliy san\'at muzeyi\" /></p><p><strong>Марказий зал</strong></p><p>Залнинг шипи &ldquo;кундал&rdquo; услубида нақшдор қилиб ишланган бўлиб унда юпқа олтин зарҳал қоғозлар жуда усталик билан ёпиштирилган.</p><p>Меҳмонхонанинг тўрида ва этагида иккитадан токча, бошқа бир томонида меҳроб бор. Токча нақшдор ганч панжара билан тўсилган.</p><p>Залнинг тўрида ва шимол томонида бир ҳилда, ўймакорлик билан ишланган иккита катта эшик бор. Буларнинг ўзини ўзбек амалий санъатининг энг яхши намуналаридан бири дейиш мумкин. Бу эшикларни кўздан кечирган ҳар бир киши устанинг санъатига, нафосатига қойил қолади.</p><p>&nbsp;</p><p><strong>&ldquo;Калонхона&rdquo;</strong></p><p>&ldquo;Калонхона&rdquo; эшигининг пештоқига &ndash; китоба ўрнатилган бўлиб, араб ёзувида шарқ ҳикматли рубоийи форсий тилда битилган. Каломхона деворлари ганч ўймакорлиги билан ишланиб, тўқ ранглар ва зархал билан сайқалланган. Калонхона шипи ҳам ёғочдан ишланиб, алоҳида бўлакларга бўлиниб пардозланган. Шип марказига хаузак ишланиб кейинчалик у ерга ганч қандил осилган.</p><p>Калонхона деворларида 1985-1991 йиллар давомида Ўзбекистон ҳалқ рассоми Чингиз Ахмаровнинг шарқ миниатюраси асосида ишланган &ldquo;Афсона&rdquo;, &ldquo;Наврўз&rdquo;, &ldquo;Сўзана&rdquo;, &ldquo;Кулол&rdquo;, &ldquo;Олимлар&rdquo; номли асарлари холстга темпер бўёқлар билан чизилган.</p><p>Мустақиллик даврига келиб музей коллекцияси ноёб амалий санъат буюмлари билан тўлдирила бошланди. Ўзбекистон Республикаси Вазирлар Маҳкамасининг 1997 йил 18 августдаги 405-сон қарори билан &ldquo;Амалий санъатнинг доимий фаолиятдаги кургазмаси&rdquo;га &ldquo;Ўзбекистон амалий санъат музейи&rdquo; номи берилиб, Ўзбекистон Республикаси Маданият вазирлиги тасарруфига ўтказилди.</p><p>Айни пайтда, Ўзбекистон амалий санъат музейи ўзбек халқининг бадиий ва декоратив санъати коллекциялари тўпланган &ldquo;хазина&rdquo;га айланган. Унинг фондида 7500 тадан зиёд экспонатлар мавжуд бўлиб, улардан 1000 га яқини экспозицияда ўрин олган.</p><p>Музей фондида ёғоч ўймакорлиги, ганч ўймакорлиги, бадиий кулолчилик, мисгарлик, заргарлик, зардўзлик, каштачилик, лак миниатюраси, газламачиликнинг турли хиллари (читгарлик, атлас, адрас, беқасам, кимхоб, бахмал ва бошқалар) каби нодир буюмлар коллекциялари сақланмоқда. Бу бадиий асарлар ичида машҳур халқ усталари-хоразмлик ёғоч ўймакор устаси Ота Полвонов, бухоролик ганчкор уста Усто Ширин Муродов, самарқандлик уста Болта Жўраев, Умарқул Жўрақулов, қўқонлик уста Қодиржон Ҳайдаров, Лутфулла Фозилов, Тошкентлик уста Муҳиддин Рахимов, уста Усмон Зуфаров ва яна юзлаб ўзбек усталарининг ишлари ўзбек бадиий ҳунармандчилигини жаҳонга танитган асарлари сақланиб келинмоқда. Бу ноёб асарларни музей хазинасида музейшунос мутахассилари аввайлаб асраб келмоқдалар.</p><p>Музей ўзининг фаолияти давомида Ватанимизнинг йирик маданий ва маърифий марказларидан бирига айланди. 2017 йилнинг июль-ноябрь ойларида Ўзбекистон амалий санъат музейи раҳбарияти Ўзбекистон Республикаси туризмни ривожлантириш давлат қўмитаси билан ҳамкорликда 20 мингдан ортиқ хорижий туристларни музейга жалб қилиш ва уларга сервис хизмат кўрсатиш орқали Давлат бюджетига 145 615 сўм туширилди. Ачинарлиси шундаки, 2017 йил январь ойидан ноябрь ойига қадар жами 966 нафар маҳаллий аҳоли ташриф буюрган.</p><p>Айни пайтда, Ўзбекистон амалий санъат музейи, Ўзбекистон Республикаси туризмни ривожлантириш давлат қўмитаси, Ўзбекистон давлат санъат ва маданият институти билан ҳамкорликда Ўзбекистон халқларининг маданий-тарихий меросини, урф-одатларини оммавийлаштириш мақсадида чет эллик туристларга фольклор жамоалари томонидан миллий ўйинлар, анаъавий йўналишдаги созанда ва раққосалар мусиқий дастурларини, шунингдек миллий либослар намойиши хорижлик меҳмонлар эътиборларига ҳавола қилмоқда.</p><p><img src=\"https://storage.kun.uz/source/thumbnails/_medium/3/kl8agasBcJJ0AWE7jabT-aP8TYKb-Iqz_medium.jpg\" alt=\"Ўзбекистон амалий санъат ва ҳунармандчилик тарихи давлат музейи трендда!\" /></p><p><strong>Миллий либослар намойиши.</strong></p><p><img src=\"https://lh3.googleusercontent.com/proxy/DUocmD3IpJ7msv_i__Htp-BBzsL1k0e4BnhzWfgmikpSA5TiCEyC0kJwJLFEHQaobOisn_zwrbCzN6EoOGwJxgo4SBEazMZ8HrNvIl5h\" alt=\"GO Tashkent | Amaliy san\'at muzeyi\" /></p><p><strong>Фолклор жамоаларининг мусиқий дастурлари</strong></p><p>Музейда турли йиллар давомида А.И.Сидоренко (1965-1970), С.М.Абдураззоқова (1970-1978 ва 1982-1986), Ғ.И.Шоробогатов (1979-1980), Ш.Г.Ганиева (1986-1988), И.Тохтахожаев (1988), М.С.Расулова (1990-1992), Ғ.Н.Насриддинов (1992-1994), Ғ.М.Читкаускина (1994-1998), Т.Д.Дўстаев (1998-2009), Н.Н.Талипова (2009-2012), З.Г.Холикова (2013-2015), Г.Каримов (2016-2017). А.Ш.Мирзорахимов (2017-2018)директор лавозимида фаолият юритганлар.</p><p>2018 йилнинг 23 октябрдан Юсупов Исмат Искандарович музейга раҳбарлик қилмоқда.</p>', NULL, 1, '2021-05-07 18:29:35', NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `banner`
--

CREATE TABLE `banner` (
  `id` int(11) NOT NULL,
  `language` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content_id` int(11) DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sort` int(11) DEFAULT 0,
  `status` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `banner`
--

INSERT INTO `banner` (`id`, `language`, `content_id`, `name`, `image`, `sort`, `status`) VALUES
(1, 'ru', 12, 'Create Banner', 'uploads/banner/1619808491.8446.png', 1, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `language` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content_id` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `category`
--

INSERT INTO `category` (`id`, `name`, `language`, `content_id`, `status`) VALUES
(1, 'Yangiliklar', 'ru', 2, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `collection`
--

CREATE TABLE `collection` (
  `id` int(11) NOT NULL,
  `collection_category_id` int(11) DEFAULT NULL,
  `language` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content_id` int(11) DEFAULT NULL,
  `author` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `technique` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `materials` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `size` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) DEFAULT 1,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `collection`
--

INSERT INTO `collection` (`id`, `collection_category_id`, `language`, `content_id`, `author`, `technique`, `materials`, `size`, `status`, `created_at`, `updated_at`, `image`, `name`) VALUES
(1, 1, 'ru', 35, 'asda', 'asda', 'dsad', 'asd', 1, '2021-05-03 18:36:13', NULL, 'uploads/collection/1620589908.762.jpg', 'asdasdasasd'),
(2, 2, 'ru', 52, 'Create Collection', 'Create Collection', 'Create CollectionCreate Collection', 'Create Collection', 1, '2021-05-09 20:15:06', NULL, 'uploads/collection/1620591371.7709.jpg', 'Create    ');

-- --------------------------------------------------------

--
-- Структура таблицы `collection_category`
--

CREATE TABLE `collection_category` (
  `id` int(11) NOT NULL,
  `language` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content_id` int(11) DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) DEFAULT 1,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `collection_category`
--

INSERT INTO `collection_category` (`id`, `language`, `content_id`, `name`, `image`, `status`, `created_at`, `updated_at`) VALUES
(1, 'ru', 29, 'Кулолчилик', 'uploads/collection_category/1619992604.2389.png', 1, '2021-05-02 21:56:44', NULL),
(2, 'ru', 30, 'Майда пластика', 'uploads/collection_category/1619992776.6306.jpg', 1, '2021-05-02 21:59:36', NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `impressions`
--

CREATE TABLE `impressions` (
  `id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `language` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content_id` int(11) DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `body` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) DEFAULT 1,
  `date` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `impressions`
--

INSERT INTO `impressions` (`id`, `title`, `language`, `content_id`, `description`, `body`, `image`, `status`, `date`, `created_at`, `updated_at`) VALUES
(2, '“Анъаналар этади давом” туркум кўргазмаси', 'ru', 10, '“Анъаналар этади давом” туркум кўргазмаси', '“Анъаналар этади давом” туркум кўргазмаси', 'uploads/impressions/1619983091.363.jpg', 1, '2021-05-21 00:00:00', '2021-04-29 17:03:24', NULL),
(3, '«Халқаро саёҳат ва туризм» кўргазмаси', 'ru', 26, '«Халқаро саёҳат ва туризм» кўргазмаси', '«Халқаро саёҳат ва туризм» кўргазмаси', 'uploads/impressions/1619983808.1487.jpg', 1, '2021-05-28 00:00:00', '2021-05-02 19:30:08', NULL),
(4, '“Кандакорликда нақшлар мўъжизаси” номли кўргазма', 'ru', 27, '“Кандакорликда нақшлар мўъжизаси” номли кўргазма', '“Кандакорликда нақшлар мўъжизаси” номли кўргазма', 'uploads/impressions/1619983832.1984.jpg', 1, '2021-05-29 00:00:00', '2021-05-02 19:30:32', NULL),
(5, 'Нақшлардаги баҳор жилоси', 'ru', 28, 'Нақшлардаги баҳор жилоси', 'Нақшлардаги баҳор жилоси\r\n', 'uploads/impressions/1619983854.6435.jpg', 1, '2021-05-21 00:00:00', '2021-05-02 19:30:54', NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `language`
--

CREATE TABLE `language` (
  `id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lang_code` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `locale` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rtl` smallint(6) DEFAULT 0,
  `default` smallint(6) DEFAULT 0,
  `sort` int(11) DEFAULT 0,
  `status` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `language`
--

INSERT INTO `language` (`id`, `name`, `lang_code`, `locale`, `rtl`, `default`, `sort`, `status`) VALUES
(1, 'Deutsch', 'de', 'de_DE', 0, 0, 0, 0),
(2, 'English', 'en', 'en_GB', 0, 0, 0, 0),
(3, 'Español', 'es', 'es_ES', 0, 0, 0, 0),
(4, 'Français', 'fr', 'fr_FR', 0, 0, 0, 0),
(5, 'Italiano', 'it', 'it_IT', 0, 0, 0, 0),
(6, 'O\'zbekcha', 'uz', 'uz_UZ', 0, 0, 0, 0),
(7, 'Türkçe', 'tr', 'tr_TR', 0, 0, 0, 0),
(8, 'Русский', 'ru', 'ru_RU', 0, 0, 0, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `logo`
--

CREATE TABLE `logo` (
  `id` int(11) NOT NULL,
  `language` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content_id` int(11) DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) DEFAULT 1,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `menu`
--

CREATE TABLE `menu` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `language` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content_id` int(11) DEFAULT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `c_order` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `target_blank` int(11) DEFAULT NULL,
  `visible_top` int(11) DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `menu`
--

INSERT INTO `menu` (`id`, `name`, `language`, `content_id`, `parent_id`, `link`, `c_order`, `target_blank`, `visible_top`, `slug`, `status`) VALUES
(11, 'Главная', 'ru', 53, 0, '/', '1', NULL, NULL, NULL, 1),
(12, 'О нас', 'ru', 54, 0, 'site/about', '2', NULL, NULL, NULL, 1),
(13, 'Коллекции', 'ru', 55, 0, 'site/call', '3', NULL, NULL, NULL, 1),
(14, 'Выставка', 'ru', 56, 0, 'site/exhibition', '', NULL, NULL, NULL, 1),
(15, 'Новости', 'ru', 57, 0, 'site/news', '', NULL, NULL, NULL, 1),
(16, 'Статьи', 'ru', 58, 0, 'site/article', '', NULL, NULL, NULL, 1),
(17, 'Контакты', 'ru', 59, 0, '/#contact', '', NULL, NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `migration`
--

CREATE TABLE `migration` (
  `version` varchar(180) COLLATE utf8mb4_unicode_ci NOT NULL,
  `apply_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `migration`
--

INSERT INTO `migration` (`version`, `apply_time`) VALUES
('m000000_000000_base', 1619459413),
('m130524_201442_init', 1619459416),
('m190124_110200_add_verification_token_column_to_user_table', 1619459416),
('m210226_070723_create_cours_table', 1619459416),
('m210427_045101_create_site_content_table', 1619548598),
('m210502_194712_create_collection_table', 1619986646),
('m210503_170322_add_image_column_to_collection_table', 1620063287),
('m210504_062433_add_name_column_to_collection_table', 1620494377),
('m210507_191304_create_pages_table', 1620494377),
('m210509_161959_add_value_to_column_setting_table', 1620578121);

-- --------------------------------------------------------

--
-- Структура таблицы `page`
--

CREATE TABLE `page` (
  `id` int(11) NOT NULL,
  `language` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `body` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) DEFAULT 1,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `page`
--

INSERT INTO `page` (`id`, `language`, `content_id`, `user_id`, `title`, `image`, `body`, `status`, `created_at`, `updated_at`) VALUES
(1, 'ru', 43, NULL, '7788', 'uploads/page/1620569910.7674.png', '78', 1, '2021-05-09 14:18:30', NULL),
(2, 'ru', 44, NULL, 'Update Page: asd', NULL, 'asdUpdate Page: asd\r\n', 1, '2021-05-09 14:18:41', NULL),
(3, 'ru', 45, 1, 'asdasdas', NULL, 'dasdasd', 1, '2021-05-09 15:21:11', NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `partner`
--

CREATE TABLE `partner` (
  `id` int(11) NOT NULL,
  `language` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content_id` int(11) DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `partner`
--

INSERT INTO `partner` (`id`, `language`, `content_id`, `name`, `image`, `status`) VALUES
(2, 'ru', 19, 'Организации-партнеры', 'uploads/partner/1619981080.9907.png', 1),
(3, 'ru', 20, 'Организации-партнеры', 'uploads/partner/1619981095.1085.png', 1),
(4, 'ru', 21, 'Организации-партнеры', 'uploads/partner/1619981110.6289.png', 1),
(5, 'ru', 22, 'Организации-партнеры', 'uploads/partner/1619981122.8407.png', 1),
(6, 'ru', 23, 'Организации-партнеры', 'uploads/partner/1619981142.0506.png', 1),
(7, 'ru', 24, 'Организации-партнеры', 'uploads/partner/1619981152.6245.png', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `post`
--

CREATE TABLE `post` (
  `id` int(11) NOT NULL,
  `category_id` int(11) DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `language` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content_id` int(11) DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `body` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) DEFAULT 1,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `post`
--

INSERT INTO `post` (`id`, `category_id`, `title`, `language`, `content_id`, `description`, `body`, `image`, `status`, `created_at`, `updated_at`, `user_id`) VALUES
(2, 1, 'Маданий меросни асраб-авайлаш ва унинг контрабандасини олдини олиш', 'ru', 5, 'Маданий меросни асраб-авайлаш ва унинг контрабандасини олдини олиш', 'Маданий меросни асраб-авайлаш ва унинг контрабандасини олдини олиш', 'uploads/post/1619979881.6037.png', 1, '2021-04-27 18:54:19', NULL, NULL),
(3, 1, 'Ўзбекистон амалий санъат ва ҳунармандчилик тарихи давлат музейи', 'ru', 6, 'Ўзбекистон амалий санъат ва ҳунармандчилик тарихи давлат музейи', 'Ўзбекистон амалий санъат ва ҳунармандчилик тарихи давлат музейи', 'uploads/post/1619979986.9944.png', 1, '2021-04-27 18:58:25', NULL, NULL),
(4, 1, 'Анъанавий каштачилик буйича махорат-дарслари', 'ru', 7, 'Анъанавий каштачилик буйича махорат-дарслари', '<p>Анъанавий каштачилик буйича махорат-дарслари<a href=\"https://www.google.com/url?sa=i&amp;url=https%3A%2F%2Fen.wikipedia.org%2Fwiki%2FFile%3AIMG_logo_(2017).svg&amp;psig=AOvVaw3WIjPaRtisLb3QtPWyr8sa&amp;ust=1620674646978000&amp;source=images&amp;cd=vfe&amp;ved=0CAIQjRxqFwoTCNiy09epvfACFQAAAAAdAAAAABAD\" target=\"_blank\" rel=\"noopener\">https://www.google.com/url?sa=i&amp;url=https%3A%2F%2Fen.wikipedia.org%2Fwiki%2FFile%3AIMG_logo_(2017).svg&amp;psig=AOvVaw3WIjPaRtisLb3QtPWyr8sa&amp;ust=1620674646978000&amp;source=images&amp;cd=vfe&amp;ved=0CAIQjRxqFwoTCNiy09epvfACFQAAAAAdAAAAABAD</a></p>\r\n<p>&nbsp;</p>', 'uploads/post/1620588280.825.jpg', 1, '2021-04-27 19:07:36', NULL, NULL),
(5, 1, '«МЕХРИБОНЛИК» болалар учун тадбир', 'ru', 8, '«МЕХРИБОНЛИК» болалар учун тадбир', '<p>&laquo;МЕХРИБОНЛИК&raquo; болалар учун тадбир</p>\r\n<p><img src=\"https://images2.boardingschoolreview.com/photo/1122x864/1000/593/img-academy-Kiq7qm.jpg\" alt=\"IMG Academy Profile (2021) | Bradenton, FL\" width=\"335\" height=\"189\" /></p>', 'uploads/post/1620588423.1298.jpg', 1, '2021-04-29 15:53:48', NULL, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `role`
--

CREATE TABLE `role` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `role`
--

INSERT INTO `role` (`id`, `name`) VALUES
(1, 'admin');

-- --------------------------------------------------------

--
-- Структура таблицы `setting`
--

CREATE TABLE `setting` (
  `id` int(11) NOT NULL,
  `key` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `language` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) DEFAULT 1,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL,
  `value` text COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `setting`
--

INSERT INTO `setting` (`id`, `key`, `language`, `content_id`, `user_id`, `title`, `image`, `status`, `created_at`, `updated_at`, `value`) VALUES
(1, NULL, 'ru', 47, 1, 'AD', NULL, 1, '2021-05-09 18:10:06', NULL, NULL),
(2, 'asdasda', 'ru', 48, 1, 'asdasda', NULL, 1, '2021-05-09 18:37:46', NULL, 'qweqweq');

-- --------------------------------------------------------

--
-- Структура таблицы `site_content`
--

CREATE TABLE `site_content` (
  `id` int(11) NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `site_content`
--

INSERT INTO `site_content` (`id`, `type`, `status`, `created_by`) VALUES
(1, 'Post', NULL, 1),
(2, 'category', NULL, 1),
(3, 'Post', NULL, 1),
(4, 'Post', NULL, 1),
(5, 'Post', NULL, 1),
(6, 'Post', NULL, 1),
(7, 'Post', NULL, 1),
(8, 'Post', NULL, 1),
(9, 'impressions', NULL, NULL),
(10, 'impressions', NULL, NULL),
(11, 'category', NULL, NULL),
(12, 'Banner', NULL, 1),
(13, 'Menu', NULL, NULL),
(14, 'Menu', NULL, NULL),
(15, 'Menu', NULL, NULL),
(16, 'Menu', NULL, NULL),
(17, 'Menu', NULL, NULL),
(18, 'Menu', NULL, NULL),
(19, 'category', NULL, NULL),
(20, 'category', NULL, NULL),
(21, 'category', NULL, NULL),
(22, 'category', NULL, NULL),
(23, 'category', NULL, NULL),
(24, 'category', NULL, NULL),
(25, 'category', NULL, NULL),
(26, 'impressions', NULL, NULL),
(27, 'impressions', NULL, NULL),
(28, 'impressions', NULL, NULL),
(29, 'collection_category', NULL, NULL),
(30, 'collection_category', NULL, NULL),
(31, 'Collection', NULL, 1),
(32, 'Collection', NULL, 1),
(33, 'Collection', NULL, 1),
(34, 'Collection', NULL, 1),
(35, 'Collection', NULL, 1),
(36, 'team', NULL, NULL),
(37, 'team', NULL, NULL),
(38, 'team', NULL, NULL),
(39, 'team', NULL, NULL),
(40, 'About', NULL, 1),
(41, 'Menu', NULL, 1),
(42, 'Menu', NULL, 1),
(43, 'Post', NULL, 1),
(44, 'Post', NULL, 1),
(45, 'Post', NULL, 1),
(46, 'titlelang', NULL, 1),
(47, 'page', NULL, 1),
(48, 'page', NULL, 1),
(49, 'Post', NULL, 1),
(50, 'Post', NULL, 1),
(51, 'Post', NULL, 1),
(52, 'Collection', NULL, NULL),
(53, 'Menu', NULL, 1),
(54, 'Menu', NULL, 1),
(55, 'Menu', NULL, 1),
(56, 'Menu', NULL, 1),
(57, 'Menu', NULL, 1),
(58, 'Menu', NULL, 1),
(59, 'Menu', NULL, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `slider`
--

CREATE TABLE `slider` (
  `id` int(11) NOT NULL,
  `language` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `body` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) DEFAULT 1,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `team`
--

CREATE TABLE `team` (
  `id` int(11) NOT NULL,
  `language` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content_id` int(11) DEFAULT NULL,
  `fio` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `position` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `about` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `twitter` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `facebook` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `instagram` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `linkedin` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `telegram` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `team`
--

INSERT INTO `team` (`id`, `language`, `content_id`, `fio`, `image`, `position`, `about`, `twitter`, `facebook`, `instagram`, `linkedin`, `telegram`, `status`) VALUES
(1, 'ru', 36, 'Abruraxmonov Abduraxmon Abduraxmonovich', 'uploads/team/1620315004.2417.jpg', 'Lorem Ipsum#', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.', '#', '#', '#', '#', '#', 1),
(2, 'ru', 37, 'Abruraxmonov Abduraxmon Abduraxmonovich', 'uploads/team/1620315113.751.jpg', 'Lorem Ipsum#', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.', '#', '#', '#', '#', '#', 1),
(3, 'ru', 38, 'Abruraxmonov Abduraxmon Abduraxmonovich', 'uploads/team/1620315121.1391.jpg', 'Lorem Ipsum#', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.', '#', '#', '#', '#', '#', 1),
(4, 'ru', 39, 'Abruraxmonov Abduraxmon Abduraxmonovich', 'uploads/team/1620315128.8446.jpg', 'Lorem Ipsum#', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.', '#', '#', '#', '#', '#', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `title_lang`
--

CREATE TABLE `title_lang` (
  `id` int(11) NOT NULL,
  `language` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `body` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) DEFAULT 1,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `title_lang`
--

INSERT INTO `title_lang` (`id`, `language`, `content_id`, `user_id`, `title`, `image`, `body`, `status`, `created_at`, `updated_at`) VALUES
(1, 'ru', 46, 1, 'ЯНГИЛИКЛАР', NULL, '', 1, '2021-05-09 16:57:30', NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `role_id` int(11) DEFAULT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT 10,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  `verification_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `user`
--

INSERT INTO `user` (`id`, `username`, `role_id`, `auth_key`, `password_hash`, `password_reset_token`, `email`, `status`, `created_at`, `updated_at`, `verification_token`) VALUES
(1, 'muzeyapp', 1, '5oLp8fDzGUte4EouWxpf', '$2y$13$Gm2i9NTPxP9r/CfiVyBMaO7HCtUU6jn0jUmYgt4a0h7sq6UtI52bm', NULL, 'muzey@art.uz', 10, 1619459416, 1619459416, NULL);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `about`
--
ALTER TABLE `about`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `banner`
--
ALTER TABLE `banner`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `collection`
--
ALTER TABLE `collection`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx-collection-collection_category_id` (`collection_category_id`);

--
-- Индексы таблицы `collection_category`
--
ALTER TABLE `collection_category`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `impressions`
--
ALTER TABLE `impressions`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `language`
--
ALTER TABLE `language`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx-setting-lang_code` (`lang_code`);

--
-- Индексы таблицы `logo`
--
ALTER TABLE `logo`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `migration`
--
ALTER TABLE `migration`
  ADD PRIMARY KEY (`version`);

--
-- Индексы таблицы `page`
--
ALTER TABLE `page`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `partner`
--
ALTER TABLE `partner`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx-post-category_id` (`category_id`);

--
-- Индексы таблицы `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Индексы таблицы `setting`
--
ALTER TABLE `setting`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `site_content`
--
ALTER TABLE `site_content`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx-site_content-created_by` (`created_by`);

--
-- Индексы таблицы `slider`
--
ALTER TABLE `slider`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `team`
--
ALTER TABLE `team`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `title_lang`
--
ALTER TABLE `title_lang`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `password_reset_token` (`password_reset_token`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `about`
--
ALTER TABLE `about`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `banner`
--
ALTER TABLE `banner`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `collection`
--
ALTER TABLE `collection`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `collection_category`
--
ALTER TABLE `collection_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `impressions`
--
ALTER TABLE `impressions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблицы `language`
--
ALTER TABLE `language`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT для таблицы `logo`
--
ALTER TABLE `logo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT для таблицы `page`
--
ALTER TABLE `page`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `partner`
--
ALTER TABLE `partner`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT для таблицы `post`
--
ALTER TABLE `post`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT для таблицы `role`
--
ALTER TABLE `role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `setting`
--
ALTER TABLE `setting`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `site_content`
--
ALTER TABLE `site_content`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT для таблицы `slider`
--
ALTER TABLE `slider`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `team`
--
ALTER TABLE `team`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `title_lang`
--
ALTER TABLE `title_lang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `collection`
--
ALTER TABLE `collection`
  ADD CONSTRAINT `fk-collection-collection_category_id` FOREIGN KEY (`collection_category_id`) REFERENCES `collection_category` (`id`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `post`
--
ALTER TABLE `post`
  ADD CONSTRAINT `fk-post-category_id` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `site_content`
--
ALTER TABLE `site_content`
  ADD CONSTRAINT `fk-site_content-created_by` FOREIGN KEY (`created_by`) REFERENCES `user` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
