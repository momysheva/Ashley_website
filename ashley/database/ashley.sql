-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Окт 10 2020 г., 09:33
-- Версия сервера: 10.4.11-MariaDB
-- Версия PHP: 7.2.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `ashley`
--

-- --------------------------------------------------------

--
-- Структура таблицы `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `UserName` varchar(100) NOT NULL,
  `Password` varchar(100) NOT NULL,
  `updationDate` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Дамп данных таблицы `admin`
--

INSERT INTO `admin` (`id`, `UserName`, `Password`, `updationDate`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', '2017-07-05 11:02:08');

-- --------------------------------------------------------

--
-- Структура таблицы `tblbooking`
--

CREATE TABLE `tblbooking` (
  `id` int(11) NOT NULL,
  `userEmail` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `productId` int(11) DEFAULT NULL,
  `FromDate` varchar(20) CHARACTER SET utf8 DEFAULT NULL,
  `ToDate` varchar(20) CHARACTER SET utf8 DEFAULT NULL,
  `message` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `Status` int(11) DEFAULT NULL,
  `PostingDate` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Дамп данных таблицы `tblbooking`
--

INSERT INTO `tblbooking` (`id`, `userEmail`, `productId`, `FromDate`, `ToDate`, `message`, `Status`, `PostingDate`) VALUES
(6, 'aliza@gmail.com', 15, '23/04/2020', '30/04/2020', 'хочу заказать ', 0, '2020-04-23 14:24:52'),
(7, 'aliza@gmail.com', 15, '23/04/2020', '30/04/2020', 'хочу заказать ', 1, '2020-04-23 14:32:12'),
(8, 'aliza@gmail.com', 15, '05/05/2020', '10/052020', 'хочу купить', 0, '2020-05-05 03:31:17'),
(9, 'aliza@gmail.com', 19, '05/05/2020', '10/052020', 'хочу купить', 1, '2020-05-05 03:43:03'),
(10, NULL, 15, '23/04/2020', '30/04/2020', 'gyyifukyfuky', 0, '2020-08-25 14:39:05');

-- --------------------------------------------------------

--
-- Структура таблицы `tblbrands`
--

CREATE TABLE `tblbrands` (
  `id` int(11) NOT NULL,
  `BrandName` varchar(120) CHARACTER SET utf8 NOT NULL,
  `CreationDate` timestamp NULL DEFAULT current_timestamp(),
  `UpdationDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Дамп данных таблицы `tblbrands`
--

INSERT INTO `tblbrands` (`id`, `BrandName`, `CreationDate`, `UpdationDate`) VALUES
(9, 'Столовая', '2020-04-15 05:43:39', '2020-04-27 15:03:30'),
(10, 'Гостинная', '2020-04-15 10:13:05', NULL),
(11, 'Спальни', '2020-05-01 08:49:03', NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `tblcontactusinfo`
--

CREATE TABLE `tblcontactusinfo` (
  `id` int(11) NOT NULL,
  `Address` tinytext CHARACTER SET utf8 DEFAULT NULL,
  `EmailId` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `ContactNo` char(11) CHARACTER SET utf8 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Дамп данных таблицы `tblcontactusinfo`
--

INSERT INTO `tblcontactusinfo` (`id`, `Address`, `EmailId`, `ContactNo`) VALUES
(1, 'г. Шымкент, Тамерлановское шоссе 26/3, Ashley HomeStore', 'ashleyfurniture@gmail.com', '+7775232442');

-- --------------------------------------------------------

--
-- Структура таблицы `tblcontactusquery`
--

CREATE TABLE `tblcontactusquery` (
  `id` int(11) NOT NULL,
  `name` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `EmailId` varchar(120) CHARACTER SET utf8 DEFAULT NULL,
  `ContactNumber` char(11) CHARACTER SET utf8 DEFAULT NULL,
  `Message` longtext CHARACTER SET utf8 DEFAULT NULL,
  `PostingDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Дамп данных таблицы `tblcontactusquery`
--

INSERT INTO `tblcontactusquery` (`id`, `name`, `EmailId`, `ContactNumber`, `Message`, `PostingDate`, `status`) VALUES
(2, 'Aliza Momysheva', 'aliza@gmail.com', '+7775232442', 'hello', '2020-04-20 08:42:54', 1),
(3, 'Aliza Momysheva', 'aliza@gmail.com', '+7775232442', '?', '2020-05-05 03:44:35', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `tblpages`
--

CREATE TABLE `tblpages` (
  `id` int(11) NOT NULL,
  `PageName` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `type` varchar(255) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `detail` longtext CHARACTER SET utf8 NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Дамп данных таблицы `tblpages`
--

INSERT INTO `tblpages` (`id`, `PageName`, `type`, `detail`) VALUES
(1, 'Terms and Conditions', 'terms', '										<p align=\"justify\"><font size=\"2\"><strong><font color=\"#990000\">(1) ACCEPTANCE OF TERMS</font><br><br></strong><br></font></p>\r\n										'),
(2, 'Privacy Policy', 'privacy', '<span style=\"color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px; text-align: justify;\">At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus. Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe eveniet ut et voluptates repudiandae sint et molestiae non recusandae. Itaque earum rerum hic tenetur a sapiente delectus, ut aut reiciendis voluptatibus maiores alias consequatur aut perferendis doloribus asperiores repellat</span>'),
(3, 'About Us ', 'aboutus', '																				<p class=\"MsoNormal\" style=\"margin-bottom: 1rem; color: rgb(57, 63, 70);\"><span style=\"font-size: x-large; font-family: &quot;times new roman&quot;;\">В наших магазинах выставлена мебель разных по своей наполненности стилей и направлений: модерн, урбанистический стиль,</span></p><p class=\"MsoNormal\" style=\"margin-bottom: 1rem; color: rgb(57, 63, 70);\"><span style=\"font-size: x-large; font-family: &quot;times new roman&quot;;\">винтажная и традиционная классика, а также семейная мебель.</span></p><p class=\"MsoNormal\" style=\"margin-bottom: 1rem; color: rgb(57, 63, 70);\"><span style=\"font-size: x-large; font-family: &quot;times new roman&quot;;\">Представлены винтажные комоды в разной цветовой гамме и стилей, роскошные кровати, более 40 видов диванов и многое другое.</span></p><p class=\"MsoNormal\" style=\"margin-bottom: 1rem; color: rgb(57, 63, 70);\"><span style=\"font-size: x-large; font-family: &quot;times new roman&quot;;\">Столовые группы заслуживают отдельного внимания: это столы с выдвижными ящиками для салфеток и</span></p><p class=\"MsoNormal\" style=\"margin-bottom: 1rem; color: rgb(57, 63, 70);\"><span style=\"font-size: x-large; font-family: &quot;times new roman&quot;;\">столовых приборов, со скамьями и высокими акцентными стульями, с интересными крутящимися табуретками.</span></p><div class=\"blogpost-content text-body html-editor-content\" style=\"margin-bottom: 1.5rem; color: rgb(57, 63, 70);\"><p class=\"MsoNormal\" style=\"margin-bottom: 1rem;\"><span style=\"font-size: x-large; font-family: &quot;times new roman&quot;;\">Все они изготовлены из массива дерева.</span></p><p class=\"MsoNormal\" style=\"margin-bottom: 1rem;\"><span style=\"font-size: x-large; font-family: &quot;times new roman&quot;;\">Очень много журнальных и кофейных столиков, консолей, зеркал.<o:p></o:p></span></p><p class=\"MsoNormal\" style=\"margin-bottom: 1rem;\"><span style=\"font-size: x-large; font-family: &quot;times new roman&quot;;\">У нас в&nbsp;<span lang=\"EN-US\">Ashley</span><span lang=\"EN-US\">&nbsp;</span>вы найдете именно, то, что поможет достойно украсит ваше пространство и прослужит долгие годы.<o:p></o:p></span></p><p class=\"MsoNormal\" style=\"margin-bottom: 1rem;\"><span style=\"font-family: &quot;times new roman&quot;; font-size: x-large; font-weight: bold;\">Добро пожаловать в Ashley!</span></p><p style=\"margin-bottom: 1rem;\"></p><p class=\"MsoNormal\" style=\"margin-bottom: 1rem;\"><br></p></div><div class=\"row\" style=\"display: flex; flex-wrap: wrap; color: rgb(57, 63, 70); font-family: Roboto;\"><div class=\"col-12\" style=\"position: relative; width: 1025.45px; min-height: 1px; padding-right: 15px; padding-left: 15px; -webkit-box-flex: 0; flex: 0 0 100%; max-width: 100%;\"><div class=\"block blog-comment-form mt-5\" style=\"margin-top: 3rem !important;\"><fieldset class=\"blog-comment-form content-group mt-5\" style=\"margin-bottom: 2rem; margin-top: 3rem !important;\"></fieldset></div></div></div><div><br></div>\r\n										\r\n										'),
(11, 'FAQs', 'faqs', '																																								<span style=\"color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px; text-align: justify;\">Часто задаваемые вопросы</span>');

-- --------------------------------------------------------

--
-- Структура таблицы `tblproducts`
--

CREATE TABLE `tblproducts` (
  `id` int(11) NOT NULL,
  `Title` varchar(150) CHARACTER SET utf8 DEFAULT NULL,
  `Brand` int(11) DEFAULT NULL,
  `Overview` longtext CHARACTER SET utf8 DEFAULT NULL,
  `Price` int(11) DEFAULT NULL,
  `Type` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `color` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `Vimage1` varchar(120) CHARACTER SET utf8 DEFAULT NULL,
  `Vimage2` varchar(120) CHARACTER SET utf8 DEFAULT NULL,
  `Vimage3` varchar(120) CHARACTER SET utf8 DEFAULT NULL,
  `Vimage4` varchar(120) CHARACTER SET utf8 DEFAULT NULL,
  `Vimage5` varchar(120) CHARACTER SET utf8 DEFAULT NULL,
  `garantia` int(11) DEFAULT NULL,
  `skidka` int(11) DEFAULT NULL,
  `dostavka` int(11) DEFAULT NULL,
  `othercolors` int(11) DEFAULT NULL,
  `ustanovka` int(11) DEFAULT NULL,
  `dopolnenie` int(11) DEFAULT NULL,
  `izseri` int(11) DEFAULT NULL,
  `podarok` int(11) DEFAULT NULL,
  `bonus` int(11) DEFAULT NULL,
  `odin` int(11) DEFAULT NULL,
  `production` int(11) DEFAULT NULL,
  `RegDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `UpdationDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Дамп данных таблицы `tblproducts`
--

INSERT INTO `tblproducts` (`id`, `Title`, `Brand`, `Overview`, `Price`, `Type`, `color`, `Vimage1`, `Vimage2`, `Vimage3`, `Vimage4`, `Vimage5`, `garantia`, `skidka`, `dostavka`, `othercolors`, `ustanovka`, `dopolnenie`, `izseri`, `podarok`, `bonus`, `odin`, `production`, `RegDate`, `UpdationDate`) VALUES
(15, 'Стол обеденный из серии Marsilona', 9, 'D712-25 Стол обеденный из серии Marsilona бесспорно станет украшением вашей столовой', 365000, 'Основной', 'белый', 'd712-25-marsilona.jpg', 'd712-25-marsilona.jpg', 'd712-25-marsilona.jpg', 'd712-25-marsilona (1).jpg', '', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, NULL, '2020-04-15 09:50:22', '2020-04-27 16:08:37'),
(17, 'Диван', 10, 'МЯгкий диван из Америки', 235600, 'Второстепнный', 'серый', '-nandero.jpg', '-nandero.jpg', '-nandero.jpg', '-nandero.jpg', '', NULL, 1, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, '2020-05-01 07:17:51', NULL),
(19, 'Кровать KING', 11, 'B518 Кровать urbanology Broshtan', 453000, 'Основной', 'коричневый ', '1.jpg', '1.jpg', '1.jpg', '1.jpg', '', NULL, 1, 1, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, '2020-05-01 08:50:56', NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `tblsubscribers`
--

CREATE TABLE `tblsubscribers` (
  `id` int(11) NOT NULL,
  `SubscriberEmail` varchar(120) CHARACTER SET utf8 DEFAULT NULL,
  `PostingDate` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Дамп данных таблицы `tblsubscribers`
--

INSERT INTO `tblsubscribers` (`id`, `SubscriberEmail`, `PostingDate`) VALUES
(2, 'aliza@gmail.com', '2020-05-03 08:47:30');

-- --------------------------------------------------------

--
-- Структура таблицы `tbltestimonial`
--

CREATE TABLE `tbltestimonial` (
  `id` int(11) NOT NULL,
  `UserEmail` varchar(100) CHARACTER SET utf8 NOT NULL,
  `Testimonial` mediumtext CHARACTER SET utf8 NOT NULL,
  `PostingDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Дамп данных таблицы `tbltestimonial`
--

INSERT INTO `tbltestimonial` (`id`, `UserEmail`, `Testimonial`, `PostingDate`, `status`) VALUES
(4, 'aliza@gmail.com', 'Очень довольна', '2020-05-01 06:53:35', 1),
(5, 'aliza@gmail.com', 'Мне нравиться ', '2020-05-05 03:44:08', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `tblusers`
--

CREATE TABLE `tblusers` (
  `id` int(11) NOT NULL,
  `FullName` varchar(120) CHARACTER SET utf8 DEFAULT NULL,
  `EmailId` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `Password` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `ContactNo` char(11) CHARACTER SET utf8 DEFAULT NULL,
  `dob` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `Address` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `City` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `Country` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `RegDate` timestamp NULL DEFAULT current_timestamp(),
  `UpdationDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Дамп данных таблицы `tblusers`
--

INSERT INTO `tblusers` (`id`, `FullName`, `EmailId`, `Password`, `ContactNo`, `dob`, `Address`, `City`, `Country`, `RegDate`, `UpdationDate`) VALUES
(7, 'Aliza Momysheva', 'aliza@gmail.com', 'c4de9fe96832a877668d0dced80657b8', '5486', '', '', 'Shymkent', 'Казахстан', '2020-04-23 13:48:00', '2020-05-05 03:43:40'),
(8, 'Aimena Momysheva', 'aimena@gmail.com', '202cb962ac59075b964b07152d234b70', '8775658936', NULL, NULL, NULL, NULL, '2020-05-07 05:34:03', NULL),
(9, 'Test ', 'test@gmail.com', '2e65f2f2fdaf6c699b223c61b1b5ab89', '8775658937', NULL, NULL, NULL, NULL, '2020-05-07 05:36:47', NULL),
(10, 'Ashley', 'ashley@gmail.com', 'a709909b1ea5c2bee24248203b1728a5', '5486852', NULL, NULL, NULL, NULL, '2020-05-07 05:51:26', NULL);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `tblbooking`
--
ALTER TABLE `tblbooking`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `tblbrands`
--
ALTER TABLE `tblbrands`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `tblcontactusinfo`
--
ALTER TABLE `tblcontactusinfo`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `tblcontactusquery`
--
ALTER TABLE `tblcontactusquery`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `tblpages`
--
ALTER TABLE `tblpages`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `tblproducts`
--
ALTER TABLE `tblproducts`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `tblsubscribers`
--
ALTER TABLE `tblsubscribers`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `tbltestimonial`
--
ALTER TABLE `tbltestimonial`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `tblusers`
--
ALTER TABLE `tblusers`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `tblbooking`
--
ALTER TABLE `tblbooking`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT для таблицы `tblbrands`
--
ALTER TABLE `tblbrands`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT для таблицы `tblcontactusinfo`
--
ALTER TABLE `tblcontactusinfo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `tblcontactusquery`
--
ALTER TABLE `tblcontactusquery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `tblpages`
--
ALTER TABLE `tblpages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT для таблицы `tblproducts`
--
ALTER TABLE `tblproducts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT для таблицы `tblsubscribers`
--
ALTER TABLE `tblsubscribers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `tbltestimonial`
--
ALTER TABLE `tbltestimonial`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблицы `tblusers`
--
ALTER TABLE `tblusers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
