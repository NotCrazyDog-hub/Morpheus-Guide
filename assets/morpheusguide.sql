-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 01/06/2025 às 22:26
-- Versão do servidor: 8.0.42
-- Versão do PHP: 8.3.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `morpheusguide`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `diarios`
--

DROP TABLE IF EXISTS `diarios`;
CREATE TABLE IF NOT EXISTS `diarios` (
  `id` int NOT NULL AUTO_INCREMENT,
  `Usuario_id` int DEFAULT NULL,
  `titulo` varchar(50) DEFAULT NULL,
  `criado_em` datetime NOT NULL,
  `conteudo` text,
  PRIMARY KEY (`id`),
  KEY `Usuario_id` (`Usuario_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `horarios_ideais`
--

DROP TABLE IF EXISTS `horarios_ideais`;
CREATE TABLE IF NOT EXISTS `horarios_ideais` (
  `id` int NOT NULL AUTO_INCREMENT,
  `Rotinas_id` int DEFAULT NULL,
  `horarios_para_dormir` time NOT NULL,
  PRIMARY KEY (`id`),
  KEY `Rotinas_id` (`Rotinas_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `rotinas`
--

DROP TABLE IF EXISTS `rotinas`;
CREATE TABLE IF NOT EXISTS `rotinas` (
  `id` int NOT NULL AUTO_INCREMENT,
  `Usuario_id` int DEFAULT NULL,
  `titulo` varchar(50) DEFAULT NULL,
  `hora_de_acordar` time NOT NULL,
  `criado_em` date NOT NULL,
  `horario_de_dormir_escolhido` time NOT NULL,
  PRIMARY KEY (`id`),
  KEY `Usuario_id` (`Usuario_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` int NOT NULL AUTO_INCREMENT,
  `email` varchar(100) NOT NULL,
  `senha` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `email`, `senha`) VALUES
(1, 'teste123@gmail.com', 'teste123');

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `diarios`
--
ALTER TABLE `diarios`
  ADD CONSTRAINT `diarios_ibfk_1` FOREIGN KEY (`Usuario_id`) REFERENCES `usuarios` (`id`) ON DELETE SET NULL;

--
-- Restrições para tabelas `horarios_ideais`
--
ALTER TABLE `horarios_ideais`
  ADD CONSTRAINT `horarios_ideais_ibfk_1` FOREIGN KEY (`Rotinas_id`) REFERENCES `rotinas` (`id`);

--
-- Restrições para tabelas `rotinas`
--
ALTER TABLE `rotinas`
  ADD CONSTRAINT `rotinas_ibfk_1` FOREIGN KEY (`Usuario_id`) REFERENCES `usuarios` (`id`) ON DELETE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
