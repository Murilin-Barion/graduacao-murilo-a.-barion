-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 27-Ago-2022 às 22:49
-- Versão do servidor: 10.4.24-MariaDB
-- versão do PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `bd_graduacao`
--
CREATE DATABASE IF NOT EXISTS `bd_graduacao` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `bd_graduacao`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_graduacao`
--

CREATE TABLE `tb_graduacao` (
  `cod_graduacao` int(255) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `cpf` varchar(50) NOT NULL,
  `graduacao` varchar(200) NOT NULL,
  `curso_superiorYN` varchar(200) NOT NULL,
  `mini_cursos` varchar(150) NOT NULL,
  `disciplinas_adicionais` varchar(200) NOT NULL,
  `horario` varchar(10) NOT NULL,
  `termosYN` varchar(5) NOT NULL,
  `vlr_total` double(10,2) NOT NULL,
  `vlr_mini_cursos` double(15,4) NOT NULL,
  `vlr_cursos` tinyint(1) NOT NULL,
  `ativo` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `tb_graduacao`
--

INSERT INTO `tb_graduacao` (`cod_graduacao`, `nome`, `email`, `cpf`, `graduacao`, `curso_superiorYN`, `mini_cursos`, `disciplinas_adicionais`, `horario`, `termosYN`, `vlr_total`, `vlr_mini_cursos`, `vlr_cursos`, `ativo`) VALUES
(1, 'Murilo A. Barion', 'murilo.antonio.barion@gmail.com', '457.212.538-43', 'Ciência da Computação', 'Não', 'Java com Oracle, Desenho Industrial, Direito Administrativo', 'Estrutura de Dados, Cálculo 3, Direito Tributário', 'Diurno', 'Sim', 1850.00, 950.0000, 127, 1);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `tb_graduacao`
--
ALTER TABLE `tb_graduacao`
  ADD PRIMARY KEY (`cod_graduacao`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `tb_graduacao`
--
ALTER TABLE `tb_graduacao`
  MODIFY `cod_graduacao` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
