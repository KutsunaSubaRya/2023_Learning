-- --------------------------------------------------------
-- 主機:                           140.122.184.125:3307
-- 伺服器版本:                      10.3.38-MariaDB-1:10.3.38+maria~ubu2004 
-- 伺服器操作系統:                   Win64
-- HeidiSQL 版本:                  9.5.0.5196
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- 傾印 db_class 的資料庫結構
CREATE DATABASE IF NOT EXISTS `db_class` /*!40100 DEFAULT CHARACTER SET utf8 COLLATE utf8_bin */;
USE `db_class`;

-- 傾印  表格 db_class.student 結構
CREATE TABLE IF NOT EXISTS `student` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `StuName` char(50) COLLATE utf8_bin NOT NULL,
  `StuNum` int(11) NOT NULL,
  `passwd` char(50) COLLATE utf8_bin DEFAULT NULL,
  `gender` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- 正在傾印表格  db_class.student 的資料：~2 rows (大約)
/*!40000 ALTER TABLE `student` DISABLE KEYS */;
INSERT INTO `student` (`id`, `StuName`, `StuNum`, `passwd`, `gender`) VALUES
	(2, 'Bryant', 24, '123345fff', 1),
	(3, 'Robert Baratheon', 55, '123456', 1),
	(4, 'Jaime Lannister', 56, '123456', 1),
	(5, 'Catelyn Stark', 57, '123456', 0),
	(6, 'Cersei Lannister', 58, '123456', 0),
	(7, 'Daenerys Targaryen', 59, '123456', 0),
	(8, 'Joran Mormonthi', 60, '123456', 1),
	(9, 'Viserys Targaryen', 61, '123456', 0),
	(10, 'Jon Snow', 62, '123456', 1),
	(11, 'Sansa Stark', 63, '123456', 0),
	(12, 'Arya Stark', 64, '123456', 0),
	(13, 'Robb Stark', 65, '123456', 1),
	(14, 'Theon Greyjoy', 66, '123456', 1),
	(15, 'Bran Stark', 67, '123456', 1),
	(16, 'Joffrey Baratheon', 68, '123456', 1),
	(17, 'Tyrion Lannister', 69, '123456', 1),
	(18, 'Petyr Baelish', 70, '123456', 1),
	(19, 'Samwell Tarly', 71, '123456', 1),
	(20, 'Jeor Mormont', 72, '123456', 1),
	(21, 'Bronn', 73, '123456', 1),
	(22, 'Varys', 74, '123456', 1),
	(23, 'Shae', 75, '123456', 0),
	(24, 'Tywin Lannisterhi', 76, '123456', 1),
	(25, 'Gendry', 77, '123456', 1),
	(26, 'Tommen Baratheon', 78, '123456', 1),
	(27, 'James', 23, '12345678', 1);

