-- --------------------------------------------------------
-- Хост:                         127.0.0.1
-- Версия сервера:               5.6.37 - MySQL Community Server (GPL)
-- Операционная система:         Win32
-- HeidiSQL Версия:              9.4.0.5125
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Дамп структуры базы данных library
CREATE DATABASE IF NOT EXISTS `library` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `library`;

-- Дамп структуры для таблица library.authors
CREATE TABLE IF NOT EXISTS `authors` (
  `id_author` int(6) NOT NULL AUTO_INCREMENT,
  `name` text,
  PRIMARY KEY (`id_author`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- Дамп данных таблицы library.authors: ~3 rows (приблизительно)
/*!40000 ALTER TABLE `authors` DISABLE KEYS */;
INSERT INTO `authors` (`id_author`, `name`) VALUES
	(1, 'Крылов'),
	(2, 'Ланин'),
	(3, 'Демидов');
/*!40000 ALTER TABLE `authors` ENABLE KEYS */;

-- Дамп структуры для таблица library.books
CREATE TABLE IF NOT EXISTS `books` (
  `id_book` int(6) NOT NULL AUTO_INCREMENT,
  `name` text,
  PRIMARY KEY (`id_book`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

-- Дамп данных таблицы library.books: ~12 rows (приблизительно)
/*!40000 ALTER TABLE `books` DISABLE KEYS */;
INSERT INTO `books` (`id_book`, `name`) VALUES
	(1, 'Добрые дела'),
	(2, 'Четыре'),
	(3, 'Компот'),
	(5, 'Мои года'),
	(6, 'Тринадцать'),
	(7, 'Когда - нибудь'),
	(8, 'Капибары'),
	(9, 'Минор'),
	(10, 'Карусель жизни'),
	(11, 'Лучше не бывает'),
	(12, 'Порез'),
	(13, '20');
/*!40000 ALTER TABLE `books` ENABLE KEYS */;

-- Дамп структуры для таблица library.exemplar
CREATE TABLE IF NOT EXISTS `exemplar` (
  `id_exam` int(6) NOT NULL AUTO_INCREMENT,
  `id_book` int(6) NOT NULL,
  `id_author` int(6) NOT NULL,
  PRIMARY KEY (`id_exam`),
  KEY `id_book` (`id_book`),
  KEY `id_author` (`id_author`),
  CONSTRAINT `exemplar_ibfk_1` FOREIGN KEY (`id_book`) REFERENCES `books` (`id_book`) ON UPDATE CASCADE,
  CONSTRAINT `exemplar_ibfk_2` FOREIGN KEY (`id_author`) REFERENCES `authors` (`id_author`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;

-- Дамп данных таблицы library.exemplar: ~14 rows (приблизительно)
/*!40000 ALTER TABLE `exemplar` DISABLE KEYS */;
INSERT INTO `exemplar` (`id_exam`, `id_book`, `id_author`) VALUES
	(1, 1, 1),
	(2, 2, 2),
	(3, 2, 3),
	(4, 3, 2),
	(5, 3, 3),
	(8, 5, 2),
	(9, 6, 2),
	(10, 7, 2),
	(11, 8, 2),
	(12, 9, 3),
	(13, 10, 3),
	(14, 11, 3),
	(15, 12, 3),
	(16, 13, 3);
/*!40000 ALTER TABLE `exemplar` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
