-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Mar 16, 2022 at 06:55 AM
-- Server version: 5.7.31
-- PHP Version: 8.0.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `xpeedstudio`
--

-- --------------------------------------------------------

--
-- Table structure for table `buyer_info`
--

DROP TABLE IF EXISTS `buyer_info`;
CREATE TABLE IF NOT EXISTS `buyer_info` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `amount` int(10) NOT NULL,
  `buyer` varchar(255) NOT NULL,
  `receipt_id` varchar(20) NOT NULL,
  `items` varchar(255) NOT NULL,
  `buyer_email` varchar(50) NOT NULL,
  `buyer_ip` varchar(20) NOT NULL,
  `note` text NOT NULL,
  `city` varchar(20) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `hash_key` varchar(255) NOT NULL,
  `entry_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `entry_by` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `buyer_info`
--

INSERT INTO `buyer_info` (`id`, `amount`, `buyer`, `receipt_id`, `items`, `buyer_email`, `buyer_ip`, `note`, `city`, `phone`, `hash_key`, `entry_at`, `entry_by`) VALUES
(1, 95, 'Eum quaerat id sit ', 'Sunt commodo eiusmod', 'itemA,itemB', 'mapycor@mailinator.com', '127.0.0.1', 'Magnam rerum qui com', 'Laboriosam in in es', '+884976', 'f0c26cd128eaf43ed1f30eaa46f53abe4c265aca22b565eedc93fb5cec78824054990a7b824d3e2bdb8cf9e6c909456b19eefd42c00a5df2a6236514e2e83794', '2022-03-15 16:30:50', 8),
(2, 65, 'Corrupti dolore nos', 'Temporibus deserunt ', 'itemA,itemB', 'jemakoc@mailinator.com', '127.0.0.1', 'Beatae nisi ut atque', 'Consequuntur earum N', '+885388', 'f0c26cd128eaf43ed1f30eaa46f53abe4c265aca22b565eedc93fb5cec78824054990a7b824d3e2bdb8cf9e6c909456b19eefd42c00a5df2a6236514e2e83794', '2022-03-15 16:32:07', 21),
(3, 26, 'Ad aspernatur iusto ', 'Fugiat aut harum nat', 'itemA,itemB', 'wyjihyk@mailinator.com', '127.0.0.1', 'Necessitatibus moles', 'Tempora eu minima ci', '+884683', 'f0c26cd128eaf43ed1f30eaa46f53abe4c265aca22b565eedc93fb5cec78824054990a7b824d3e2bdb8cf9e6c909456b19eefd42c00a5df2a6236514e2e83794', '2022-03-15 16:34:21', 50),
(4, 3, 'Sed eligendi quia ex', 'Consequatur consequ', 'itemA,itemB', 'joqotahaq@mailinator.com', '127.0.0.1', 'Similique velit eum ', 'Vero qui consequatur', '+889989', 'f0c26cd128eaf43ed1f30eaa46f53abe4c265aca22b565eedc93fb5cec78824054990a7b824d3e2bdb8cf9e6c909456b19eefd42c00a5df2a6236514e2e83794', '2022-03-15 16:35:25', 76),
(5, 80, 'Sint aut omnis ab m', 'Veritatis Nam offici', 'itemA,itemB,itemC', 'fuco@mailinator.com', '127.0.0.1', 'Enim explicabo Quia', 'Adipisicing et et du', '+889826', 'f0c26cd128eaf43ed1f30eaa46f53abe4c265aca22b565eedc93fb5cec78824054990a7b824d3e2bdb8cf9e6c909456b19eefd42c00a5df2a6236514e2e83794', '2022-03-15 18:34:04', 58),
(6, 69, 'In et ut nulla rem', 'Et est suscipit aut', 'itemA,itemB', 'rupi@mailinator.com', '127.0.0.1', 'Sapiente iusto ipsum', 'Delectus ipsum rer', '+887932', 'f0c26cd128eaf43ed1f30eaa46f53abe4c265aca22b565eedc93fb5cec78824054990a7b824d3e2bdb8cf9e6c909456b19eefd42c00a5df2a6236514e2e83794', '2022-03-16 12:45:10', 30),
(7, 58, 'Modi nulla exercitat', 'Harum delectus est ', 'itemA,itemB', 'pywosehi@mailinator.com', '127.0.0.1', 'Dolorem quisquam eni', 'Porro quibusdam dolo', '+885319', 'f0c26cd128eaf43ed1f30eaa46f53abe4c265aca22b565eedc93fb5cec78824054990a7b824d3e2bdb8cf9e6c909456b19eefd42c00a5df2a6236514e2e83794', '2022-03-16 12:47:22', 3),
(8, 58, 'Voluptas ipsum vitae', 'Enim facere alias qu', 'itemA,itemB', 'vokojuki@mailinator.com', '127.0.0.1', 'Temporibus voluptatu', 'Consectetur assumen', '+888238', 'f0c26cd128eaf43ed1f30eaa46f53abe4c265aca22b565eedc93fb5cec78824054990a7b824d3e2bdb8cf9e6c909456b19eefd42c00a5df2a6236514e2e83794', '2022-03-16 12:49:07', 30),
(9, 36, 'Est quidem repellen', 'Dolores obcaecati en', 'itemA', 'lepipuh@mailinator.com', '127.0.0.1', 'Qui tempora laudanti', 'Doloribus velit qui', '+888664', 'f0c26cd128eaf43ed1f30eaa46f53abe4c265aca22b565eedc93fb5cec78824054990a7b824d3e2bdb8cf9e6c909456b19eefd42c00a5df2a6236514e2e83794', '2022-03-16 12:50:09', 58),
(10, 70, 'Totam quis labore cu', 'Sequi aut enim magni', 'itemA,itemB', 'poloho@mailinator.com', '127.0.0.1', 'Repudiandae est num', 'Beatae exercitatione', '+888731', 'f0c26cd128eaf43ed1f30eaa46f53abe4c265aca22b565eedc93fb5cec78824054990a7b824d3e2bdb8cf9e6c909456b19eefd42c00a5df2a6236514e2e83794', '2022-03-16 12:51:41', 72);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
