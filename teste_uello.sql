-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 17-Ago-2022 às 20:04
-- Versão do servidor: 8.0.27
-- versão do PHP: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `teste_uello`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `csv_upload`
--

DROP TABLE IF EXISTS `csv_upload`;
CREATE TABLE IF NOT EXISTS `csv_upload` (
  `id_csv` int NOT NULL AUTO_INCREMENT,
  `original_name` varchar(100) DEFAULT NULL,
  `formated_name` varchar(100) DEFAULT NULL,
  `url_csv` varchar(200) DEFAULT NULL,
  `registration_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_csv`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Estrutura da tabela `customer_one_shipping`
--

DROP TABLE IF EXISTS `customer_one_shipping`;
CREATE TABLE IF NOT EXISTS `customer_one_shipping` (
  `id_shipping` int NOT NULL AUTO_INCREMENT,
  `from_postcode` varchar(10) DEFAULT NULL,
  `to_postcode` varchar(10) DEFAULT NULL,
  `from_weight` varchar(10) DEFAULT NULL,
  `to_weight` varchar(10) DEFAULT NULL,
  `cost` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`id_shipping`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
