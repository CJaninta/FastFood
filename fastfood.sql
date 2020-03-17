-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Sep 24, 2019 at 08:25 AM
-- Server version: 8.0.17
-- PHP Version: 7.3.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fastfood`
--

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `Customer_ID` int(20) NOT NULL,
  `Password` varchar(20) NOT NULL,
  `First_name` varchar(50) NOT NULL,
  `Last_name` varchar(50) NOT NULL,
  `Tel` varchar(12) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `IDcard` varchar(20) NOT NULL,
  `Address` varchar(150) NOT NULL,
  `Ban_Customer` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`Customer_ID`, `Password`, `First_name`, `Last_name`, `Tel`, `Email`, `IDcard`, `Address`, `Ban_Customer`) VALUES
(10001, '1234', 'สมาธิ', 'จิตพิศวง', '1234567889', 'samathi@hotmail.com', '213213546', 'ลาดพร้าว 60 แขวง วังทองหลาง เขตวังทองหลาง กรุงเทพมหานคร 1310', 'ระงับการใช้งาน'),
(10002, '1234', 'ชนาเมธ', 'ธนูสิทธิ์', '0988934665', 'nenge@hotmail.com', '123456', 'ท่าข้าม 8 แยก 16-18 แขวงแสมดำ เขตบางขุนเทียน กรุงเทพ 10150', ''),
(10003, '789456', 'ปันปัน', 'สนุกสนาน', '0985544523', 'punpun@hotmall.com', '1245687952201', 'สุขสวัสดิ์ 21แขวง บางปะกอก เขตราษฎร์บูรณะ กรุงเทพมหานคร 10150', ''),
(10004, 'des2222', 'พิมพา', 'องคมนตรี', '0954412359', 'pimpa@gmail.com', '3001452221478', 'วงศ์สว่าง 19แขวง วงศ์สว่าง เขตบางซื่อ กรุงเทพมหานคร 10800\r\n', ''),
(10005, 'rrr777888', 'รุ้งรัตน์', 'จันทร์สว่าง', '0645587952', 'rungza555@gmail.com', '5001254123655', 'บางบอน 5 แขวง บางบอน เขตบางบอน กรุงเทพ 10150', ''),
(10006, 'exo45623', 'สุดา', 'นารากิจ', '099666331', 'suda@hotmail.com', '1100254698754', 'สะแกงาม 20 แขวง แสมดำ เขตบางขุนเทียน กรุงเทพมหานคร 10150', ''),
(10007, 'olo456789', 'พรมเทพ', 'เพชรนิลจินดา', '0655552367', 'promtep@gmail.com', '3025569877856', 'ลาดพร้าว 104 แขวง วังทองหลาง เขตวังทองหลาง กรุงเทพมหานคร 10310', ''),
(10008, '123456000', 'ชุติมา', 'ใจแกร่ง', '0886532214', 'chutima@hotmail.com', '1205422036997', 'ลาดพร้าว 15 แขวง วังทองหลาง เขตวังทองหลาง กรุงเทพมหานคร 10310', ''),
(10009, 'tu112036', 'พายุ', 'วัฒนกิจ', '0996322547', 'payu@hotmail.com', '1200300547896', 'วงศ์สว่าง 5 แขวง วงศ์สว่าง เขตบางซื่อ กรุงเทพมหานคร 10800\r\n', ''),
(10010, '7890', 'เสี่ย', 'จันทร์อังคารพุธ', '0811002132', 'chawalit_mac@hotmail.com', '1104200092163', 'ประชาชื่น 2 แขวง วงศ์สว่าง เขตบางซื่อ กรุงเทพมหานคร 10800\r\n', ''),
(10011, '123', 'ตัวอยู่ที่ไทย', 'ใจอยู่เยอรมัน', '0956122345', 'neng15@hotmail.com', '1102003007151', 'ประชาชนคนตาดำดำ', ''),
(50003, '1234', 'sud', 'test', '0896523145', 'test@email.com', '1123456789658', 'com', '');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `Employee_ID` int(20) NOT NULL,
  `Password` varchar(20) NOT NULL,
  `First_name` varchar(50) NOT NULL,
  `Last_name` varchar(50) NOT NULL,
  `Tel` varchar(12) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `IDcard` varchar(20) NOT NULL,
  `Address` varchar(150) NOT NULL,
  `Brand_Motorcycle` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `License_plate` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `Status` varchar(20) NOT NULL,
  `Ban_Employee` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`Employee_ID`, `Password`, `First_name`, `Last_name`, `Tel`, `Email`, `IDcard`, `Address`, `Brand_Motorcycle`, `License_plate`, `Status`, `Ban_Employee`) VALUES
(4001, '1234', 'อัยภัทร', 'อิอิ', '08111111111', 'toki.mac001@gmail.com', '1104200092163', 'เอกชัย 56 แขวงบางพราน เขตบางบอน กรุงเทพ 10150', 'yamaha', 'ก10007', 'ว่าง', ''),
(4002, '1234', 'ชนาวีร์', 'แซ่อึ้ง', '0991812724', 'chanawee@hotmail.com', '1102003045236', 'วงศ์สว่าง 10 แขวง วงศ์สว่าง เขตบางซื่อ กรุงเทพมหานคร 10800\r\n', 'honda', 'ฏ10012', 'กำลังส่ง', ''),
(4003, '123', 'โหน่ง', 'ชะชะช่า', '02255978', 'nong@hotmail.com', '1102035556978', 'ลาดพร้าว 74  แขวง วังทองหลาง เขตวังทองหลาง กรุงเทพมหานคร 10310', 'honda', 'ก10150', 'ว่าง', ''),
(4004, '753951', 'สนทนา', 'ธรรมดี', '0956325574', 'sontana@hotmail.com', '3015872522149', 'ประชาชื่น 11 แขวง วงศ์สว่าง เขตบางซื่อ กรุงเทพมหานคร 10800\r\n', 'kawasaki', 'ส12069', 'ว่าง', ''),
(4005, 'ma12345', 'มานะ', 'ยิ่งรวย', '0999999999', 'mana@hotmail.com', '1100245585556', 'ประชาชื่น 16 แขวง วงศ์สว่าง เขตบางซื่อ กรุงเทพมหานคร 10800\r\n', 'ducati', 'ก-99999', 'ว่าง', ''),
(4006, 'iu2200145', 'ชาญชัย', 'ขายหมอน', '0952214596', 'chanchai@hotmail.com', '2103665699947', 'ลาดพร้าว 4  แขวง วังทองหลาง เขตวังทองหลาง กรุงเทพมหานคร 10310', 'vespa', 'พ77512', 'ว่าง', ''),
(4007, 'yu7888745', 'พลัง', 'มหาศาล', '0911102325', 'palang@hotmail.com', '1102452110336', 'วงศ์สว่าง 11 แขวง วงศ์สว่าง เขตบางซื่อ กรุงเทพมหานคร 10800\r\n', 'honda', 'ด11021', 'ว่าง', ''),
(4008, 'ookk4521', 'โอชา', 'รัตนชัย', '0965521474', 'ocha@hotmail.com', '1200045788977', 'ประชาชื่น 5 แขวง วงศ์สว่าง เขตบางซื่อ กรุงเทพมหานคร 10800\r\n', 'yamaha', 'ฟ52302', 'ว่าง', ''),
(4009, 'pp2709', 'ศักดา', 'นิลแข็ง', '0998842561', 'sakda@hotmail.com', '110050036687', 'สะแกงาม 14 แขวง แสมดำ เขตบางขุนเทียน กรุงเทพมหานคร 10150', 'harley davidson', 'ม00102', 'ว่าง', ''),
(4010, 'password', 'สุรชัย', 'สมบัติไม่มี', '0966321457', 'surachai@hotmail.com', '2201455217854', 'เอกชัย 56 แขวงบางพราน เขตบางบอน กรุงเทพ 10150', 'vespa', 'ว33345', 'ว่าง', '');

-- --------------------------------------------------------

--
-- Table structure for table `menu_foods`
--

CREATE TABLE `menu_foods` (
  `Menu_ID` int(20) NOT NULL,
  `Menu_Name` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `Menu_Price` float NOT NULL,
  `Menu_img` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `menu_foods`
--

INSERT INTO `menu_foods` (`Menu_ID`, `Menu_Name`, `Menu_Price`, `Menu_img`) VALUES
(2001, 'เเกงส้มชะอมไข่-กุ้งสด', 140, 'http://localhost/food/img/menu/m1.jpg'),
(2002, 'ต้มยำขาหมู', 120, 'http://localhost/food/img/menu/m2.jpg'),
(2003, 'ปลาหมึกผัดไข่เค็ม', 160, 'http://localhost/food/img/menu/m3.jpg'),
(2004, 'ปลากะพงทอดน้ำปลา', 400, 'http://localhost/food/img/menu/m4.jpg'),
(2005, 'หมูซ่อนเล็บ', 150, 'http://localhost/food/img/menu/m5.jpg'),
(2006, 'ปีกไก่ทอด', 140, 'http://localhost/food/img/menu/m6.jpg'),
(2007, 'สปาเกตตี้ขี้เมาทะเล', 150, 'http://localhost/food/img/menu/c1.jpg'),
(2008, 'ข้าวคลุกน้ำพริกกะปิ', 69, 'http://localhost/food/img/menu/c2.jpg'),
(2009, 'หมูบดก้อนกระเทียมพริกไทย', 109, 'http://localhost/food/img/menu/c3.jpg'),
(2010, 'แกงเนื้อปูใบชะพลู หมี่ฮุ่น ', 340, 'http://localhost/food/img/menu/c4.jpg'),
(2011, 'ก๋วยเตี๋ยวคั่วไก่', 59, 'http://localhost/food/img/menu/c5.jpg'),
(2012, 'กะหล่ำปลีผัดน้ำปลา หมูกรอบ', 95, 'http://localhost/food/img/menu/c6.jpg'),
(2013, 'Chocolate Toast With Strawberry', 235, 'http://localhost/food/img/menu/a1.jpg'),
(2014, 'ขนมปังเนยโสด', 100, 'http://localhost/food/img/menu/a2.jpg'),
(2015, 'ขนมปังนมโสด', 100, 'http://localhost/food/img/menu/a3.jpg'),
(2016, 'Chocolate Lava', 165, 'http://localhost/food/img/menu/a4.jpg'),
(2017, 'Queen B Fudge Cake', 165, 'http://localhost/food/img/menu/a5.jpg'),
(2018, 'Banana Nutella Mille Crepe', 145, 'http://localhost/food/img/menu/a6.jpg\r\n'),
(2019, 'Mango Yuzu Roll Set', 359, 'http://localhost/food/img/menu/kyo1.jpg'),
(2020, 'Kohaku', 329, 'http://localhost/food/img/menu/kyo2.jpg'),
(2021, 'Hojicha Mille-Crepe Roll Set', 225, 'http://localhost/food/img/menu/kyo3.jpg'),
(2022, 'Rain drop mizu mochi', 135, 'http://localhost/food/img/menu/kyo4.jpg'),
(2023, 'Matcha Monaga Ice-Cream', 115, 'http://localhost/food/img/menu/kyo5.jpg'),
(2024, 'Zen Roll', 429, 'http://localhost/food/img/menu/kyo6.jpg'),
(2025, 'ข้าวหน้าหมูผัดซอสสไตล์ญี่ปุ่นและไข่เทมปุระ', 99, 'http://localhost/food/img/menu/ten1.jpg'),
(2026, 'ข้าวหน้าหมูชุบแป้งทอดและไข่ออนเซ็น', 99, 'http://localhost/food/img/menu/ten2.jpg'),
(2027, 'ข้าวแกงกะหรี่กุ้งเทมปุระ', 169, 'http://localhost/food/img/menu/ten3.jpg'),
(2028, 'ข้าวหน้าปลาชุบแป้งทอดและไข่ออนเซ็น', 99, 'http://localhost/food/img/menu/ten4.jpg'),
(2029, 'ข้าวหน้าทะเลรวมเทมปุระ', 189, 'http://localhost/food/img/menu/ten5.jpg'),
(2030, 'ไอศกรีมชาเขียวเทมปุระ', 59, 'http://localhost/food/img/menu/ten6.jpg'),
(2031, 'ชุดอาหารกล่องฟูจิพิเศษ ปลาดิบ', 350, 'http://localhost/food/img/menu/fu1.jpg'),
(2032, 'ชุดสเต๊กปลาแซลมอน', 320, 'http://localhost/food/img/menu/fu2.jpg'),
(2033, 'ชุดข้าวห่อสาหร่ายรวม', 280, 'http://localhost/food/img/menu/fu3.jpg'),
(2034, 'ชุดข้าวหน้าปลาดิบ', 330, 'http://localhost/food/img/menu/fu4.jpg'),
(2035, 'ข้าวหน้าปลาซาบะย่างซีอิ๊ว', 150, 'http://localhost/food/img/menu/fu5.jpg'),
(2036, 'ข้าวหน้าปลาแซลมอนย่างกับไข่ปลาแซลมอน', 320, 'http://localhost/food/img/menu/fu6.jpg'),
(2037, 'Angus XT Steakhouse Set', 289, 'http://localhost/food/img/menu/bk1.jpg'),
(2038, 'Cowboy Burger Value Meal', 149, 'http://localhost/food/img/menu/bk2.jpg'),
(2039, 'Mentaiko Fish N\'Crisp Value Meal', 139, 'http://localhost/food/img/menu/bk3.jpg'),
(2040, 'Mentaiko Chic N\'Crisp Value Meal', 139, 'http://localhost/food/img/menu/bk4.png'),
(2041, 'Whopper Value Meal', 219, 'http://localhost/food/img/menu/bk5.png'),
(2042, 'Whopper Bacon Cheese Value Meal', 285, 'http://localhost/food/img/menu/bk6.png'),
(2043, 'Chicken Teriyaki', 129, 'http://localhost/food/img/menu/sub1.jpg'),
(2044, 'Steak & Cheese', 198, 'http://localhost/food/img/menu/sub2.jpg'),
(2045, 'Spicy Italian', 109, 'http://localhost/food/img/menu/sub3.jpg'),
(2046, 'Slice Chicken and Ham', 79, 'http://localhost/food/img/menu/sub4.jpg'),
(2047, 'Roast Beef', 129, 'http://localhost/food/img/menu/sub5.jpg'),
(2048, 'Subway melt', 139, 'http://localhost/food/img/menu/sub6.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `menu_foods_on_restaurant_composite_entity`
--

CREATE TABLE `menu_foods_on_restaurant_composite_entity` (
  `Menu_ID` int(20) NOT NULL,
  `Restaurant_ID` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `menu_foods_on_restaurant_composite_entity`
--

INSERT INTO `menu_foods_on_restaurant_composite_entity` (`Menu_ID`, `Restaurant_ID`) VALUES
(2001, 701),
(2002, 701),
(2003, 701),
(2004, 701),
(2005, 701),
(2006, 701),
(2007, 702),
(2008, 702),
(2009, 702),
(2010, 702),
(2011, 702),
(2012, 702),
(2013, 703),
(2014, 703),
(2015, 703),
(2016, 703),
(2017, 703),
(2018, 703),
(2019, 704),
(2020, 704),
(2021, 704),
(2022, 704),
(2023, 704),
(2024, 704),
(2025, 705),
(2026, 705),
(2027, 705),
(2028, 705),
(2029, 705),
(2030, 705),
(2031, 706),
(2032, 706),
(2033, 706),
(2034, 706),
(2035, 706),
(2036, 706),
(2037, 707),
(2038, 707),
(2039, 707),
(2040, 707),
(2041, 707),
(2042, 707),
(2043, 708),
(2044, 708),
(2045, 708),
(2046, 708),
(2047, 708),
(2048, 708);

-- --------------------------------------------------------

--
-- Table structure for table `menu_on_order_composite_entity`
--

CREATE TABLE `menu_on_order_composite_entity` (
  `Order_ID` int(20) NOT NULL,
  `Menu_ID` int(20) NOT NULL,
  `Menu_Amount` int(20) NOT NULL,
  `Total` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `menu_on_order_composite_entity`
--

INSERT INTO `menu_on_order_composite_entity` (`Order_ID`, `Menu_ID`, `Menu_Amount`, `Total`) VALUES
(127, 2001, 2, 252),
(128, 2002, 2, 240),
(128, 2003, 5, 800),
(128, 2004, 4, 1600),
(129, 2001, 2, 252),
(129, 2005, 1, 120),
(130, 2002, 1, 126),
(131, 2001, 1, 126),
(132, 2002, 1, 126),
(133, 2001, 1, 126),
(134, 2013, 1, 235),
(135, 2006, 1, 140),
(136, 2001, 1, 126),
(156, 2001, 1, 140),
(158, 2001, 1, 126),
(181, 2032, 1, 298),
(182, 2033, 1, 280);

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `Order_ID` int(20) NOT NULL,
  `Order_date_time` datetime NOT NULL,
  `Customer_ID` int(20) NOT NULL,
  `Employee_ID` int(20) NOT NULL,
  `Order_Status` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`Order_ID`, `Order_date_time`, `Customer_ID`, `Employee_ID`, `Order_Status`) VALUES
(127, '2019-09-10 06:24:34', 10010, 4001, 'จัดส่งแล้ว'),
(128, '2019-09-10 06:25:04', 10010, 4001, 'จัดส่งแล้ว'),
(129, '2019-09-10 06:25:04', 10010, 4001, 'จัดส่งแล้ว'),
(130, '2019-09-10 06:37:54', 10010, 4001, 'จัดส่งแล้ว'),
(131, '2019-09-10 06:37:54', 10010, 4001, 'จัดส่งแล้ว'),
(132, '2019-09-10 07:36:09', 10010, 4001, 'จัดส่งแล้ว'),
(133, '2019-09-10 07:36:09', 10010, 4001, 'จัดส่งแล้ว'),
(134, '2019-09-17 03:11:32', 10001, 4001, 'จัดส่งแล้ว'),
(135, '2019-09-17 03:22:06', 10010, 4001, 'จัดส่งแล้ว'),
(136, '2019-09-18 07:53:21', 10010, 4001, 'จัดส่งแล้ว'),
(156, '2019-09-21 02:07:03', 10010, 4001, 'ยกเลิก'),
(158, '2019-09-22 03:46:04', 10010, 4003, 'ยกเลิก'),
(181, '2019-09-24 03:23:39', 10010, 4001, 'จัดส่งแล้ว'),
(182, '2019-09-24 03:24:26', 50003, 4002, 'กำลังส่ง');

-- --------------------------------------------------------

--
-- Table structure for table `promotion`
--

CREATE TABLE `promotion` (
  `Promotion_ID` int(20) NOT NULL,
  `Discount` varchar(10) NOT NULL,
  `Start_date` date NOT NULL,
  `Stop_date` date NOT NULL,
  `Menu_ID` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `promotion`
--

INSERT INTO `promotion` (`Promotion_ID`, `Discount`, `Start_date`, `Stop_date`, `Menu_ID`) VALUES
(100001, '10', '2019-09-10', '2019-09-25', 2001),
(100002, '5', '2019-09-22', '2019-09-29', 2004),
(100003, '10', '2019-09-22', '2019-09-29', 2007),
(100004, '10', '2019-09-22', '2019-09-29', 2010),
(100005, '5', '2019-09-22', '2019-09-29', 2014),
(100006, '20', '2019-09-22', '2019-09-29', 2017),
(100007, '12', '2019-09-22', '2019-09-29', 2020),
(100008, '7', '2019-09-22', '2019-09-29', 2024),
(100009, '10', '2019-09-22', '2019-09-29', 2025),
(100010, '15', '2019-09-22', '2019-09-29', 2030),
(100011, '7', '2019-09-22', '2019-09-29', 2032),
(100012, '12', '2019-09-22', '2019-09-29', 2034),
(100013, '8', '2019-09-22', '2019-09-29', 2037),
(100014, '16', '2019-09-22', '2019-09-29', 2042),
(100015, '10', '2019-09-22', '2019-09-29', 2044),
(100016, '5', '2019-09-22', '2019-09-29', 2047);

-- --------------------------------------------------------

--
-- Table structure for table `promotion_at_order`
--

CREATE TABLE `promotion_at_order` (
  `Order_ID` int(20) NOT NULL,
  `Promotion_ID` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `promotion_at_order`
--

INSERT INTO `promotion_at_order` (`Order_ID`, `Promotion_ID`) VALUES
(127, 100001),
(128, 100002),
(181, 100011);

-- --------------------------------------------------------

--
-- Table structure for table `recommend_of_ restaurants`
--

CREATE TABLE `recommend_of_ restaurants` (
  `Recommend_ID` int(20) NOT NULL,
  `Restaurant_ID` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `recommend_of_ restaurants`
--

INSERT INTO `recommend_of_ restaurants` (`Recommend_ID`, `Restaurant_ID`) VALUES
(8001, 701),
(8002, 706),
(8003, 708);

-- --------------------------------------------------------

--
-- Table structure for table `restaurant`
--

CREATE TABLE `restaurant` (
  `Restaurant_ID` int(20) NOT NULL,
  `Restaurant_Name` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `Restaurant_Address` varchar(150) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `Restaurant_Start_Contract` date NOT NULL,
  `Restaurant_End_Contract` date NOT NULL,
  `Restaurant_Tel` varchar(11) NOT NULL,
  `Type_ID` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `restaurant`
--

INSERT INTO `restaurant` (`Restaurant_ID`, `Restaurant_Name`, `Restaurant_Address`, `Restaurant_Start_Contract`, `Restaurant_End_Contract`, `Restaurant_Tel`, `Type_ID`) VALUES
(701, 'โอยั๊วะ รีเวอร์เทอเรส', '1353 ถนนประชาราษฎร์ 1 แขวง วงศ์สว่าง เขตบางซื่อ กรุงเทพมหานคร', '2019-09-01', '2019-12-30', '02222222', 3),
(702, 'ชิมเกาหลี', '812/21 ซอย ประชาชื่น 24 แขวง วงศ์สว่าง เขตบางซื่อ กรุงเทพมหานคร', '2019-09-04', '2019-09-30', '02333333', 3),
(703, 'After You', '7/222 ถนน บรมราชชนนี, แขวง อรุณอมรินทร์ เขตบางกอกน้อย กรุงเทพมหานคร 10700', '2019-09-07', '2020-01-15', '021011017', 2),
(704, 'Kyo Roll En', '7/222 ถนน บรมราชชนนี, แขวง อรุณอมรินทร์ เขตบางกอกน้อย กรุงเทพมหานคร 10700', '2019-09-05', '2019-12-18', '0651719019', 2),
(705, 'Tenya', '7/222 ถนน บรมราชชนนี, แขวง อรุณอมรินทร์ เขตบางกอกน้อย กรุงเทพมหานคร 10700', '2019-09-11', '2020-01-15', '026633888', 1),
(706, 'Fuji', '7/222 ถนน บรมราชชนนี, แขวง อรุณอมรินทร์ เขตบางกอกน้อย กรุงเทพมหานคร 10700', '2019-09-18', '2019-11-14', '028338704', 1),
(707, 'Burger King', 'Rest Area ซอย ประชาชื่น แขวง วงศ์สว่าง เขตบางซื่อ\r\nกรุงเทพมหานคร 10800', '2019-09-10', '2019-12-19', '023333364', 4),
(708, 'Subway', 'Rest Area ซอย ประชาชื่น แขวง วงศ์สว่าง เขตบางซื่อ\r\nกรุงเทพมหานคร 10800', '2019-09-11', '2019-11-20', '028585455', 4);

-- --------------------------------------------------------

--
-- Table structure for table `type_of_restaurants`
--

CREATE TABLE `type_of_restaurants` (
  `Type_ID` int(20) NOT NULL,
  `Type_Name_Restaurant` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `type_of_restaurants`
--

INSERT INTO `type_of_restaurants` (`Type_ID`, `Type_Name_Restaurant`) VALUES
(1, 'อาหารญี่ปุ่น'),
(2, 'ของหวาน'),
(3, 'อาหารตามสั่ง'),
(4, 'ฟาสต์ฟู้ด');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`Customer_ID`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`Employee_ID`);

--
-- Indexes for table `menu_foods`
--
ALTER TABLE `menu_foods`
  ADD PRIMARY KEY (`Menu_ID`);

--
-- Indexes for table `menu_foods_on_restaurant_composite_entity`
--
ALTER TABLE `menu_foods_on_restaurant_composite_entity`
  ADD PRIMARY KEY (`Menu_ID`,`Restaurant_ID`),
  ADD UNIQUE KEY `Menu_ID` (`Menu_ID`),
  ADD KEY `Restaurant_ID` (`Restaurant_ID`);

--
-- Indexes for table `menu_on_order_composite_entity`
--
ALTER TABLE `menu_on_order_composite_entity`
  ADD PRIMARY KEY (`Order_ID`,`Menu_ID`),
  ADD KEY `Order_ID` (`Order_ID`),
  ADD KEY `Menu_ID` (`Menu_ID`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`Order_ID`),
  ADD KEY `Customer_ID` (`Customer_ID`) USING BTREE,
  ADD KEY `Employee_ID` (`Employee_ID`);

--
-- Indexes for table `promotion`
--
ALTER TABLE `promotion`
  ADD PRIMARY KEY (`Promotion_ID`),
  ADD UNIQUE KEY `Menu_id` (`Menu_ID`);

--
-- Indexes for table `promotion_at_order`
--
ALTER TABLE `promotion_at_order`
  ADD PRIMARY KEY (`Order_ID`,`Promotion_ID`),
  ADD KEY `Order_ID` (`Order_ID`) USING BTREE,
  ADD KEY `Promotion_ID` (`Promotion_ID`) USING BTREE;

--
-- Indexes for table `recommend_of_ restaurants`
--
ALTER TABLE `recommend_of_ restaurants`
  ADD PRIMARY KEY (`Recommend_ID`),
  ADD UNIQUE KEY `Restaurant_ID` (`Restaurant_ID`);

--
-- Indexes for table `restaurant`
--
ALTER TABLE `restaurant`
  ADD PRIMARY KEY (`Restaurant_ID`),
  ADD KEY `Type_ID` (`Type_ID`) USING BTREE;

--
-- Indexes for table `type_of_restaurants`
--
ALTER TABLE `type_of_restaurants`
  ADD PRIMARY KEY (`Type_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `Customer_ID` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50004;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `Employee_ID` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4012;

--
-- AUTO_INCREMENT for table `menu_foods`
--
ALTER TABLE `menu_foods`
  MODIFY `Menu_ID` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2056;

--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `Order_ID` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=183;

--
-- AUTO_INCREMENT for table `promotion`
--
ALTER TABLE `promotion`
  MODIFY `Promotion_ID` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1000215;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `menu_foods_on_restaurant_composite_entity`
--
ALTER TABLE `menu_foods_on_restaurant_composite_entity`
  ADD CONSTRAINT `menu_foods_on_restaurant_composite_entity_ibfk_1` FOREIGN KEY (`Restaurant_ID`) REFERENCES `restaurant` (`Restaurant_ID`),
  ADD CONSTRAINT `menu_foods_on_restaurant_composite_entity_ibfk_2` FOREIGN KEY (`Menu_ID`) REFERENCES `menu_foods` (`Menu_ID`);

--
-- Constraints for table `menu_on_order_composite_entity`
--
ALTER TABLE `menu_on_order_composite_entity`
  ADD CONSTRAINT `menu_on_order_composite_entity_ibfk_1` FOREIGN KEY (`Order_ID`) REFERENCES `order` (`Order_ID`),
  ADD CONSTRAINT `menu_on_order_composite_entity_ibfk_2` FOREIGN KEY (`Menu_ID`) REFERENCES `menu_foods` (`Menu_ID`);

--
-- Constraints for table `order`
--
ALTER TABLE `order`
  ADD CONSTRAINT `order_ibfk_2` FOREIGN KEY (`Customer_ID`) REFERENCES `customer` (`Customer_ID`),
  ADD CONSTRAINT `order_ibfk_4` FOREIGN KEY (`Employee_ID`) REFERENCES `employee` (`Employee_ID`);

--
-- Constraints for table `promotion`
--
ALTER TABLE `promotion`
  ADD CONSTRAINT `promotion_ibfk_1` FOREIGN KEY (`Menu_ID`) REFERENCES `menu_foods` (`Menu_ID`);

--
-- Constraints for table `promotion_at_order`
--
ALTER TABLE `promotion_at_order`
  ADD CONSTRAINT `promotion_at_order_ibfk_1` FOREIGN KEY (`Promotion_ID`) REFERENCES `promotion` (`Promotion_ID`),
  ADD CONSTRAINT `promotion_at_order_ibfk_2` FOREIGN KEY (`Order_ID`) REFERENCES `order` (`Order_ID`);

--
-- Constraints for table `recommend_of_ restaurants`
--
ALTER TABLE `recommend_of_ restaurants`
  ADD CONSTRAINT `recommend_of_ restaurants_ibfk_1` FOREIGN KEY (`Restaurant_ID`) REFERENCES `restaurant` (`Restaurant_ID`);

--
-- Constraints for table `restaurant`
--
ALTER TABLE `restaurant`
  ADD CONSTRAINT `restaurant_ibfk_1` FOREIGN KEY (`Type_ID`) REFERENCES `type_of_restaurants` (`Type_ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
