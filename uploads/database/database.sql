-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Дек 03 2021 г., 17:58
-- Версия сервера: 8.0.24
-- Версия PHP: 7.4.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

`
/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `ais_library`
--
CREATE DATABASE IF NOT EXISTS `ais_library` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci;
USE `ais_library`;

-- --------------------------------------------------------

--
-- Структура таблицы `book`
--

CREATE TABLE `book` (
  `book_id` int NOT NULL,
  `book_name` varchar(255) DEFAULT NULL,
  `book_author` varchar(255) DEFAULT NULL,
  `book_description` text,
  `category_id` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `book`
--

INSERT INTO `book` (`book_id`, `book_name`, `book_author`, `book_description`, `category_id`) VALUES
(17, 'Чистый код', 'Мартин Р. ', 'Даже плохой программный код может работать. Однако если код не является «чистым», это всегда будет мешать развитию проекта и компании-разработчика, отнимая значительные ресурсы на его поддержку и «укрощение».\r\n\r\nЭта книга посвящена хорошему программированию. Она полна реальных примеров кода. Мы будем рассматривать код с различных направлений: сверху вниз, снизу вверх и даже изнутри. Прочитав книгу, вы узнаете много нового о коде. Более того, вы научитесь отличать хороший код от плохого. Вы узнаете, как писать хороший код и как преобразовать плохой код в хороший.\r\n\r\nКнига состоит из трех частей. В первой части излагаются принципы, паттерны и приемы написания чистого кода; приводится большой объем примеров кода. Вторая часть состоит из практических сценариев нарастающей сложности. Каждый сценарий представляет собой упражнение по чистке кода или преобразованию проблемного кода в код с меньшим количеством проблем. Третья часть книги – концентрированное выражение ее сути. Она состоит из одной главы с перечнем эвристических правил и «запахов кода», собранных во время анализа. Эта часть представляет собой базу знаний, описывающую наш путь мышления в процессе чтения, написания и чистки кода.', 1),
(18, 'Сам себе программист', 'Альтхофф К.', 'Как за год научиться программировать и устроиться разработчиком в Ebay? Кори Альтхофф, автор книги «Сам себе программист», на собственном опыте знает, что это возможно, и делится знаниями с читателями. Альтхофф создал универсальный самоучитель, не похожий ни на один другой. На примере языка Python автор показывает, как буквально с первого урока можно приступить к созданию собственной небольшой программы, а к концу книги уверенно писать код. Помимо этого, вы узнаете, как успешно проходить собеседования на должность программиста в любой IT-компании и перестать сомневаться в собственных силах. Это прекрасное пособие для тех, кто хочет научиться программировать и планирует заниматься этим профессионально.', 1),
(19, 'Программирование на C++ в примерах и задачах', 'Васильев А. Н.', 'Книга влючает в себя полный набор сведений о языке С++, необходимых для успешного анализа и составления эффективных программных кодов. Материал излагается последовательно и дополняется большим количеством примеров, практических задач и детальным разбором их решений. К каждому разделу прилагается обширный список задач для самостоятельного решения.\r\n', 1),
(20, 'Python Великое программирование в Minecraft', 'Корягин А.', 'Книга «Python. Великое программирование в Minecraft» расскажет вам, как научиться программировать на языке Python, используя игру Minecraft. Изучать языки программирования не всегда тяжело и скучно. Программирование - это магия. Зная, как программировать, вы будете создавать по мановению руки не только отдельные объекты в Minecraft, но и целые миры со своими законами. Если вы давно мечтали построить в Minecraft целый город с транспортом и персонажами, перемещаться за доли секунды по всему миру, разработать настоящую компьютерную игру, научиться проектировать и создавать сложные архитектурные сооружения и программировать, то эта книга для вас. В книге рассмотрены основы языка Python, принцип работы с Minecraft API, основы математической логики, а также основы в области прикладной математики и черчения. Подробно и пошагово показан процесс изучения языка программирования Python на примере создания программ, связанных с Minecraft. Книга предназначена для новичков в области программирования', 1),
(21, 'Системное администрирование на 100%', 'Бормотов С.', 'Книга посвящена системному администрированию локальных сетей на базе операционной системы Windows XP. В ней детально рассмотрены практические задачи, с которыми ежедневно сталкивается системный администратор: от настройки сети, организации антивирусной защиты и обновления системы до защиты информации.Основной упор сделан на решение практических задач, однако приводятся и необходимые теоретические сведения для понимания вопроса. Книга написана таким образом, что может быть использована в качестве справочного пособия, то есть главы не зависят друг от друга, что позволяет получить информацию по требуемому вопросу прочитав только соответствующий раздел или главу.', 2),
(22, 'Unix и Linux руководство системного администратора', 'Немет Э. и Снейдер Г.', 'Админство - это набор практик. И как всякая прикладная дисциплина, вне конкретных задач она не существует. И все руководства на эту тему - это просто более-менее связное изложение этих практик - как поставить ось, как настроить то, как настроить се, как сделать то, как сделать это, \"и почему енот и крот танцуют танго и фокстрот\"... Да, есть некий образовательный минимум - но для него Вам надо не Немет сотоварищи читать, а Олиферов. Если же Вы знаете кто такие Олиферы и о чем они пишут - значит ничего читать не надо, нужно ставить задачу и начинать ее решать. И вопросы, возникающие по ходу решения, изучать.', 2),
(23, 'Нескучные финансы', 'Афанасьев А. О. Бодрейший А. Д.', 'Сотни бизнесов открываются каждый год, но 97% из них закрываются на третий год жизни. Почему? Мы не знаем. Но умные люди считают, что одна из причин — это неумение обращаться с финансами. Мы не говорим, что маркетинг, продажи, наем, производство — это не\r\n', 4),
(24, 'Грокаем алгоритмы', 'Бхаргава А.', 'Алгоритмы - это всего лишь последовательность решения задач, и большинство таких задач уже были кем-то решены, протестированы и проверены. Можно, конечно, погрузиться в глубокую философию гениального Кнута, изучить многостраничные фолианты с доказательствами и обоснованиями, но хотите ли вы тратить на это свое время? Откройте великолепно иллюстрированную книгу и вы сразу поймете, что алгоритмы - это просто. А грокать алгоритмы - это\r\nвеселое и увлекательное занятие.', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `book_request`
--

CREATE TABLE `book_request` (
  `book_request_id` int NOT NULL,
  `user_login` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `book_request_name` varchar(255) DEFAULT NULL,
  `book_request_author` varchar(255) DEFAULT NULL,
  `book_request_link` varchar(255) DEFAULT NULL,
  `book_request_comment` text,
  `is_checked` int DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `book_request`
--

INSERT INTO `book_request` (`book_request_id`, `user_login`, `book_request_name`, `book_request_author`, `book_request_link`, `book_request_comment`, `is_checked`) VALUES
(14, 'kiselevnikitos228', 'Тест', 'тест ', 'https://www.youtube.com/', 'test', 0);

-- --------------------------------------------------------

--
-- Структура таблицы `category`
--

CREATE TABLE `category` (
  `category_id` int NOT NULL,
  `category_name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `category`
--

INSERT INTO `category` (`category_id`, `category_name`) VALUES
(1, 'Программирование'),
(2, 'Системное администрирование'),
(3, 'Маркетинг'),
(4, 'Продажи'),
(5, 'Саморазвитие'),
(6, 'Компьютерное железо');

-- --------------------------------------------------------

--
-- Структура таблицы `recording`
--

CREATE TABLE `recording` (
  `recording_id` int NOT NULL,
  `user_id` int DEFAULT NULL,
  `book_id` int DEFAULT NULL,
  `recording_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `recording`
--

INSERT INTO `recording` (`recording_id`, `user_id`, `book_id`, `recording_date`) VALUES
(1, 1, 17, '2021-12-03 16:52:23');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `user_id` int NOT NULL,
  `user_name` varchar(255) DEFAULT NULL,
  `user_birthday` date DEFAULT NULL,
  `user_login` varchar(30) DEFAULT NULL,
  `user_email` varchar(255) DEFAULT NULL,
  `user_password` varchar(500) DEFAULT NULL,
  `user_avatar` int DEFAULT NULL,
  `user_role` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `user_birthday`, `user_login`, `user_email`, `user_password`, `user_avatar`, `user_role`) VALUES
(1, 'Киселёв Никита Владимирович', '2004-02-10', 'kiselevnikitos', 'kiselevnikita@gmail.com', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3', 1, 3),
(2, 'Шарипов Тимур Ильярович', '2004-03-24', 'timur228', 'asdad@mail.ru', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3', 0, 1),
(3, 'Большая Бэбра', '2001-02-03', ' bebra_esports', 'bebra2004@gmail.com', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3', 0, 1),
(4, 'Большущая бэбра', '2001-03-22', 'nikitos', 'pedringho@gmail.com', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3', 1, 1),
(5, 'Огромная Бэбра', '2001-02-02', 'libra', 'sobakakiselev222@mail.ru', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3', 1, 1),
(6, 'Никитос Большая Бэбра', '2001-02-22', 'bigbebra', 'bigbebranikita@mail.com', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3', 1, 1),
(7, 'Нюхай Бэбру', '2001-02-02', 'nikitos33', 'sobakakiselev22231@mail.ru', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3', 1, 1),
(8, 'Киселёв Никита Владимирович', '2003-01-03', 'igorek772', 'igorek772@gmail.com', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3', 0, 1),
(9, 'Киселёв Никита Владимирович', '2001-02-02', 'igorek77222222222', 'sobakakise11lev@mail.ru', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3', 0, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `user_roles`
--

CREATE TABLE `user_roles` (
  `role_id` int NOT NULL,
  `role_name` char(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `user_roles`
--

INSERT INTO `user_roles` (`role_id`, `role_name`) VALUES
(1, 'Читатель'),
(2, 'Библиотекарь'),
(3, 'Администратор');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `book`
--
ALTER TABLE `book`
  ADD PRIMARY KEY (`book_id`);

--
-- Индексы таблицы `book_request`
--
ALTER TABLE `book_request`
  ADD PRIMARY KEY (`book_request_id`);

--
-- Индексы таблицы `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- Индексы таблицы `recording`
--
ALTER TABLE `recording`
  ADD PRIMARY KEY (`recording_id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- Индексы таблицы `user_roles`
--
ALTER TABLE `user_roles`
  ADD PRIMARY KEY (`role_id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `book`
--
ALTER TABLE `book`
  MODIFY `book_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT для таблицы `book_request`
--
ALTER TABLE `book_request`
  MODIFY `book_request_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT для таблицы `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT для таблицы `recording`
--
ALTER TABLE `recording`
  MODIFY `recording_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT для таблицы `user_roles`
--
ALTER TABLE `user_roles`
  MODIFY `role_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
