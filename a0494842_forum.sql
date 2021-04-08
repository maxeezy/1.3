-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Хост: 10.0.0.246
-- Время создания: Апр 08 2021 г., 09:14
-- Версия сервера: 5.7.31-34
-- Версия PHP: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `a0494842_forum`
--

-- --------------------------------------------------------

--
-- Структура таблицы `answer`
--

CREATE TABLE `answer` (
  `id` int(11) NOT NULL,
  `theme_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `text` text COLLATE utf8_unicode_ci NOT NULL,
  `date` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `answer`
--

INSERT INTO `answer` (`id`, `theme_id`, `user_id`, `text`, `date`) VALUES
(1, 2, 2, 'Круто!', 1617138833),
(2, 2, 2, 'Правда крута!', 1617139223),
(3, 2, 2, 'Нереальна', 1617139252),
(4, 2, 2, 'Joker', 1617139330),
(5, 2, 2, '!!!!!', 1617645614);

-- --------------------------------------------------------

--
-- Структура таблицы `status`
--

CREATE TABLE `status` (
  `id` int(11) NOT NULL,
  `name` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `status`
--

INSERT INTO `status` (`id`, `name`) VALUES
(1, 'На модерации'),
(2, 'Одобрено'),
(3, 'Отклонено');

-- --------------------------------------------------------

--
-- Структура таблицы `theme`
--

CREATE TABLE `theme` (
  `id` int(11) NOT NULL,
  `title` text COLLATE utf8_unicode_ci NOT NULL,
  `text` text COLLATE utf8_unicode_ci NOT NULL,
  `date` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `theme`
--

INSERT INTO `theme` (`id`, `title`, `text`, `date`, `user_id`, `status`) VALUES
(2, 'Джокер', 'Сбежал из психушки', 1617129376, 1, 2),
(3, 'Новая рабочая неделя начнется в Астрахани с тепла и дождя', 'В течение дня ожидается слабый дождь. Температура воздуха в городе днем составит +16…+18°C. Ветер подует южный, юго-восточный со скоростью 8-13 м/с', 1617650287, 2, 2),
(4, 'В АСТРАХАНСКОЙ ОБЛАСТИ ВВЕДЕНО ОГРАНИЧЕНИЕ ПРЕБЫВАНИЯ ГРАЖДАН В ЛЕСАХ', 'В Астраханской области установились погодные условия, способствующие возникновению и распространению природных пожаров. Наиболее сложная обстановка сохраняется в южной части региона. Ежедневно спутниковый мониторинг фиксирует на дельтовых участках значительное количество термических аномалий.\r\n\r\nВ условиях неблагоприятной пожароопасной обстановки с 5 апреля введено ограничение пребывания граждан в лесах и въезда в них транспортных средств. Соответствующий приказ опубликован региональной службой природопользования. Расположение участков лесного фонда, на которых действует ограничение, представлено на соответствующей карте-схеме.', 1617652604, 2, 2),
(5, 'В Наримановском районе в ДТП с тремя автомобилями погиб мужчина Подробнее на сайте: https://astrakhan.su/news/accidents/v-narimanovskom-rajone-v-dtp-s-tremja-avtomobiljami-pogib-muzhchina/', 'Происшествие случилось накануне вечером, 4 апреля в 21.40 минут на 1334‑м километре трассы Р‑22 «Каспий». 43-летний водитель автомобиля «Лада Приора» выехал на встречную полосу и столкнулся с автомобилями Volkswagen Passat и ВАЗ-2110. Мужчину госпитализировали с ушибом головного мозга и тупой травмой живота. Спасти предполагаемого виновника аварии не удалось: несколько часов назад он скончался в больнице. За рулём «десятки» находился 55-летний житель села Замьяны, он был доставлен в больницу с закрытой черепно-мозговой травмой, открытым переломом бедра, закрытыми переломами костей предплечья и рваной раной коленного сустава. Жительница Калмыкии 1979 года рождения, управлявшая иномаркой, серьёзных травм в ДТП не получила, судя по имеющейся информации.\r\nПодробнее на сайте: https://astrakhan.su/news/accidents/v-narimanovskom-rajone-v-dtp-s-tremja-avtomobiljami-pogib-muzhchina/', 1617653069, 2, 3),
(6, 'В АСТРАХАНИ ПРИСТУПИЛИ К ПЕРВОМУ ПОКОСУ ГАЗОНА ВОКРУГ КРЕМЛЯ', 'Весенние работы по благоустройству в Астрахани идут полным ходом. Затянувшаяся на весь март зима наконец-то отступила. Сотрудники МБУ «Зелёный город» приступили к первым работам на откосах вдоль стен астраханского кремля. \r\n\r\nПроцесс осложняется тем, что откосы, засеянные газоном, довольно крутые. В некоторых местах угол наклона достигает примерно 40 градусов. Протяжённость (внешний периметр) кремлёвских стен составляет более полутора километров. Газон шириной от 10 до 50 метров окружает его практически со всех сторон. \r\n\r\nПервый покос газона после зимнего периода на зеленой зоне вдоль стен астраханского кремля стартовал со стороны улицы Тредиаковского.', 1617653158, 2, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `type_user`
--

CREATE TABLE `type_user` (
  `id` int(11) NOT NULL,
  `name` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `type_user`
--

INSERT INTO `type_user` (`id`, `name`) VALUES
(3, 'Пользователь'),
(4, 'Админ');

-- --------------------------------------------------------

--
-- Структура таблицы `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `email` text COLLATE utf8_unicode_ci NOT NULL,
  `name` text COLLATE utf8_unicode_ci NOT NULL,
  `last_name` text COLLATE utf8_unicode_ci NOT NULL,
  `password` text COLLATE utf8_unicode_ci NOT NULL,
  `type_id` int(11) NOT NULL,
  `blocked` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `user`
--

INSERT INTO `user` (`id`, `email`, `name`, `last_name`, `password`, `type_id`, `blocked`) VALUES
(1, 'test@mail.ru', 'Тест', 'Тестовый', '$2y$13$wRtzA.979z55dyE1BZZnnO2T9TXdxBGX7IZDwQUH64LqikoHD1pIu', 3, 1),
(2, 'test2@mail.ru', 'Тест', 'Тестовый', '$2y$13$nXCdER4nfBVjB/Jrb4XDwOJLnzH2QFBY2BEAMQdcmq36POSqQXANq', 3, 0),
(4, 'admin@mail.ru', 'admin', 'admin', '$2y$13$OFDWadCo1Bc5QrdlTTz9peoDYrDbV4/7PLE38r0LmhkeGXFvZiHF.', 4, 0);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `answer`
--
ALTER TABLE `answer`
  ADD PRIMARY KEY (`id`),
  ADD KEY `theme_id` (`theme_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Индексы таблицы `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `theme`
--
ALTER TABLE `theme`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `status` (`status`);

--
-- Индексы таблицы `type_user`
--
ALTER TABLE `type_user`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `type_user` (`type_id`),
  ADD KEY `blocked` (`blocked`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `answer`
--
ALTER TABLE `answer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблицы `status`
--
ALTER TABLE `status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `theme`
--
ALTER TABLE `theme`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT для таблицы `type_user`
--
ALTER TABLE `type_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `answer`
--
ALTER TABLE `answer`
  ADD CONSTRAINT `answer_ibfk_1` FOREIGN KEY (`theme_id`) REFERENCES `theme` (`id`),
  ADD CONSTRAINT `answer_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

--
-- Ограничения внешнего ключа таблицы `theme`
--
ALTER TABLE `theme`
  ADD CONSTRAINT `theme_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `theme_ibfk_2` FOREIGN KEY (`status`) REFERENCES `status` (`id`);

--
-- Ограничения внешнего ключа таблицы `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`type_id`) REFERENCES `type_user` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
