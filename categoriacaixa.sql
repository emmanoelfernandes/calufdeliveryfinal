-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 18-Jun-2022 às 09:22
-- Versão do servidor: 10.1.31-MariaDB
-- PHP Version: 7.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fluxcaluf`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `categoriacaixa`
--

CREATE TABLE `categoriacaixa` (
  `categoriacaixa_id` int(11) NOT NULL,
  `categoriacaixa_nome` varchar(222) COLLATE utf8mb4_unicode_ci NOT NULL,
  `categoriacaixaId_usuarioid` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `categoriacaixa`
--

INSERT INTO `categoriacaixa` (`categoriacaixa_id`, `categoriacaixa_nome`, `categoriacaixaId_usuarioid`) VALUES
(1, 'net', '3'),
(2, 'sky- referente ao uso de março', '3'),
(3, 'paguei na planilha', '3');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categoriacaixa`
--
ALTER TABLE `categoriacaixa`
  ADD PRIMARY KEY (`categoriacaixa_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categoriacaixa`
--
ALTER TABLE `categoriacaixa`
  MODIFY `categoriacaixa_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
