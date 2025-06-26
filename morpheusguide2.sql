-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 26/06/2025 às 02:52
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
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Despejando dados para a tabela `diarios`
--

INSERT INTO `diarios` (`id`, `Usuario_id`, `titulo`, `criado_em`, `conteudo`) VALUES
(29, 6, 'au', '2025-06-26 01:28:00', 'ui'),
(30, 6, 'oii', '2025-06-26 01:31:00', 'sksks'),
(31, 6, 'uyy', '2025-06-26 01:32:00', 'kkkk');

-- --------------------------------------------------------

--
-- Estrutura para tabela `rotinas`
--

DROP TABLE IF EXISTS `rotinas`;
CREATE TABLE IF NOT EXISTS `rotinas` (
  `id` int NOT NULL AUTO_INCREMENT,
  `Usuario_id` int DEFAULT NULL,
  `hora_de_acordar` time NOT NULL,
  `horario_de_dormir_escolhido` time NOT NULL,
  PRIMARY KEY (`id`),
  KEY `Usuario_id` (`Usuario_id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Despejando dados para a tabela `rotinas`
--

INSERT INTO `rotinas` (`id`, `Usuario_id`, `hora_de_acordar`, `horario_de_dormir_escolhido`) VALUES
(19, 6, '08:56:00', '00:56:00');

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
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Despejando dados para a tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `email`, `senha`) VALUES
(1, 'teste123@gmail.com', 'teste123'),
(2, 'dskjfsdkfdsk@g.com', '$2y$10$25mHf4Tg3G6n7gkn1YTYz.0V/DCKpNhOd8jwXbGYN6SDDDvK7Wlz.'),
(3, 'pedro.oliveira.ncd@gmail.com', '$2y$10$bNPU.Tq.0FOIAJ9cP/S5.ev5jPPQcOfCxFqK4b1xqnXhLWaUObCl6'),
(4, 'teste12@gmail.com', '$2y$10$pDBH/nBZGbuewEJg5WtQ4urw8etsOlVZNXeasCe2.BnrKEe5Let5S'),
(5, 'sougay@gmail.com', '$2y$10$fwEWrij8E5MYMebjPRs4g.TtlFO8VXsJ2/JSspfac1dy3MA8Kdj.W'),
(6, 'teste23@gmail.com', '$2y$10$p36R4mqnvZM17ri2zX7OxOUysElfYav01a25J8FdYZxS0gXG.UCNa'),
(7, 'soulindo@gmail.com', '$2y$10$JNdaWItinSRFNwGA1Aj8je5dNUdtLzFJ96e8urIaZVk.4kgb92f8W'),
(8, 'pedro.oliveira.cnm@gmail.com', '$2y$10$/IWBcWrTvZBIgbcTGxA4IukGtB8IJ.Pc7BrISquFXnWlex6xa3yci'),
(9, 'renanelindo@gmail.com', '$2y$10$BIjBhvFnctL7kjMZZHXiCeRAhITfuwkvtTu7r9/fXFy0UaEY27AFq'),
(10, 'sla@gmail.com', '$2y$10$j1hgRCU/SelBjJFwZ2pQN.agUvqqJd1NGEfSstonhOli0S9d1ijC2'),
(11, 'euteamo@gmail.com', '$2y$10$jdC2I6M.0LckGmpQlttoU.YeGtZ/X8ICAHcUDV8OBhRKtEa/lZMdG'),
(12, 'cico.costa@gmail.com', '$2y$10$anINy3XMyFFuYRKt7gsYTe5vCw4jqPrKZpZSEvfDNUq2Cya54V1Qe'),
(13, 'pepe@gmail.com', '$2y$10$.DqARZZPNuUHU3CQuYnmAOayVLMcTj9dQit/SzN5rEI/LcJr5KneG'),
(14, 'vixi@gmail.com', '$2y$10$CfR.ZGo16wwzE2Nk06R7tOmPD.7GitmHdw69CBIxL1kVzIv3xpdae'),
(15, 'teste231@gmail.com', '$2y$10$FkGo5ZX2qR7EGS43fcvY4et03ppr.apgKlx08NFhV220xTjhIxayG'),
(16, 'pedro2@gmail.com', '$2y$10$vBpj1HtvgqoJGrSub9vnY.cGRQIgc264Cc4l.LiS0UZt316BA26Oq');

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `diarios`
--
ALTER TABLE `diarios`
  ADD CONSTRAINT `diarios_ibfk_1` FOREIGN KEY (`Usuario_id`) REFERENCES `usuarios` (`id`) ON DELETE SET NULL;

--
-- Restrições para tabelas `rotinas`
--
ALTER TABLE `rotinas`
  ADD CONSTRAINT `rotinas_ibfk_1` FOREIGN KEY (`Usuario_id`) REFERENCES `usuarios` (`id`) ON DELETE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
