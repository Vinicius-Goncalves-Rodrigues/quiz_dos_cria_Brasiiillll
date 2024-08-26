-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 26/08/2024 às 16:08
-- Versão do servidor: 10.4.32-MariaDB
-- Versão do PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `meubrasilbrasileiro`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `quiz`
--

CREATE TABLE `quiz` (
  `id` int(11) NOT NULL,
  `tipo` varchar(9) NOT NULL,
  `texto_pergunta` text DEFAULT NULL,
  `resposta_certa` varchar(1) DEFAULT NULL,
  `opcao_1` varchar(255) DEFAULT NULL,
  `opcao_2` varchar(255) DEFAULT NULL,
  `opcao_3` varchar(255) DEFAULT NULL,
  `opcao_4` varchar(255) DEFAULT NULL,
  `total_perguntas` int(11) DEFAULT NULL,
  `pergunta_atual_id` int(11) DEFAULT NULL,
  `pontuacao_time_1` int(11) DEFAULT NULL,
  `pontuacao_time_2` int(11) DEFAULT NULL,
  `perguntas_restantes` text DEFAULT NULL,
  `vencedor` varchar(255) DEFAULT NULL,
  `pontucao_final_time_1` int(11) DEFAULT NULL,
  `pontucao_final_time_2` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `quiz`
--
ALTER TABLE `quiz`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `quiz`
--
ALTER TABLE `quiz`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
