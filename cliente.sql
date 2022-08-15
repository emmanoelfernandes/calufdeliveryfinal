-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 18-Jun-2022 às 07:58
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
-- Estrutura da tabela `cliente`
--

CREATE TABLE `cliente` (
  `id_cliente` int(11) NOT NULL,
  `nome_cliente` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `senha_cliente` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `login_cliente` varchar(33) COLLATE utf8_unicode_ci NOT NULL,
  `email_cliente` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `celular_cliente` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `endereco_cliente` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `cliente_complemento` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `numeroCasa_cliente` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `ponto_cliente` varchar(233) COLLATE utf8_unicode_ci NOT NULL,
  `estado_cliente` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `cidade_cliente` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `cep_cliente` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `bairro_cliente` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `forma_pg_cliente` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `tipo_cliente` int(11) NOT NULL DEFAULT '2'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `cliente`
--

INSERT INTO `cliente` (`id_cliente`, `nome_cliente`, `senha_cliente`, `login_cliente`, `email_cliente`, `celular_cliente`, `endereco_cliente`, `cliente_complemento`, `numeroCasa_cliente`, `ponto_cliente`, `estado_cliente`, `cidade_cliente`, `cep_cliente`, `bairro_cliente`, `forma_pg_cliente`, `tipo_cliente`) VALUES
(1, 'Wesley da Silva Caluf', '123', 'wesleycaluf', 'wes@ws', '76676767', 'Rya Ujae', 'YBSA', '633', 'cauta', 'Uara', 'Bejen', '666666', 'Gyana', '', 2),
(2, 'Emmanoel Lopes Fernandes ', '211018', 'emmanoelfernandes', 'emmanoelfernandes@hotmail.com', '(91)98462-0807', 'Avenida Roberto Camelier', 'Entre Fernando Guilhon e S?o Miguel', '1023', '', 'Par?', 'Bel?m', '66033-640', 'Batista Campos', '', 2),
(3, 'Jennifer da silva caluf', '123456', 'Jennifer', 'jennifercaluf@hotmail.com', '(91)98276-0887', 'Rua', 'Antes da unidade de saude', '980', '', 'Pará', 'Belém', '66079-051', 'Guamá', '', 2),
(5, 'Voldmort Caputo', '123', 'voldmort', 'voldmort@gmail.com', '(91)98234-5466', 'Roberto Camelier', 'Perto da China Móveis', '1023', '', 'Pará', 'Belém', '66033-640', 'Guamá', '', 2),
(6, 'Abiner Luzi Cardoso', '', '', '', '(91) 48299-3939', 'Avenida Roberto Camelier', 'Mudurucus e Tamoios', '617', 'Igreja Universal', 'PA', 'Belém', '66033-640', 'Jurunas', '', 2),
(7, 'Emmanoel Lopes Fernandessssssss', '123', '', 'emmanoelfernandes@gmail.com2', '(91) 98462-0807', 'Avenida Roberto Camelier', 'Mudurucus e Tamoios', '1234', 'Vila Fernandes', 'PA', 'Belém', '66033-640', 'Jurunas', '', 2),
(8, 'sky- referente ao uso de março', '123', '', 'emmanoelfernandes@gmail.com24', '(91) 98462-0807', 'Rua Gaspar Viana', '4444', '617', 'Vila Fernandes', 'PA', 'Belém', '66010-060', 'Campina', '', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`id_cliente`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cliente`
--
ALTER TABLE `cliente`
  MODIFY `id_cliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
