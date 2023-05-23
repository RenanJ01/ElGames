-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: 23-Maio-2023 às 13:32
-- Versão do servidor: 5.7.23
-- versão do PHP: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `elgames`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_fases`
--

DROP TABLE IF EXISTS `tb_fases`;
CREATE TABLE IF NOT EXISTS `tb_fases` (
  `id_fases` int(11) NOT NULL AUTO_INCREMENT,
  `title_fases` varchar(60) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `desc_fases` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `data_fases` date NOT NULL,
  PRIMARY KEY (`id_fases`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `tb_fases`
--

INSERT INTO `tb_fases` (`id_fases`, `title_fases`, `desc_fases`, `data_fases`) VALUES
(1, 'Progressão da historia', 'Essa é a 1° fases de desenvolvimento publicado neste site, ElGames, para divulgar o termino do primeiro capitulo de nossa historia e a criação de personagens, cenários, dentre outros design do nosso jogo já estão sendo executados.', '2023-04-26'),
(2, 'Reorganização do Grupo', 'desc', '2023-05-07'),
(3, 'Site Funcional', 'O site do jogo está funcional e pronto para ser colocado online', '2023-06-08');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_usuarios`
--

DROP TABLE IF EXISTS `tb_usuarios`;
CREATE TABLE IF NOT EXISTS `tb_usuarios` (
  `id_users` int(11) NOT NULL AUTO_INCREMENT,
  `nome_users` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username_users` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `senha_users` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `genero_users` char(1) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'O',
  `idade_users` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id_users`),
  UNIQUE KEY `username_users` (`username_users`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `tb_usuarios`
--

INSERT INTO `tb_usuarios` (`id_users`, `nome_users`, `username_users`, `senha_users`, `genero_users`, `idade_users`) VALUES
(1, 'N7ivD46zkabZG8nn/H9QobLBTZdj73eXtpDeVDRp+XE=', 'Gab', '$2y$10$I0ZsbGSn7FYlq/kWKsMOQeB5NqCjEc9PH.gAREi2.OOY3jLdEsMeC', 'O', 1),
(2, 'Er/RrJks3DJUnBZGc37HgRpQHrUvUsQ3bSXFSHvdGIgqsH2wultHrepdw3UzEhZmc5cx53NIyHkmU/t4K9+7sw==', 'RenanJ', '$2y$10$WEkipxhY3T1GncfV9Paw4Of1zRJPQJ/xiy3vjtc0DH9CiQNqlkQoi', 'M', 18);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_usuarios_img`
--

DROP TABLE IF EXISTS `tb_usuarios_img`;
CREATE TABLE IF NOT EXISTS `tb_usuarios_img` (
  `id_users_img` int(11) NOT NULL AUTO_INCREMENT,
  `caminho_users_img` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_users` int(11) NOT NULL,
  PRIMARY KEY (`id_users_img`),
  KEY `fk_users_img` (`id_users`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_visualiz`
--

DROP TABLE IF EXISTS `tb_visualiz`;
CREATE TABLE IF NOT EXISTS `tb_visualiz` (
  `data_vils` date NOT NULL,
  `cont_vils` int(11) NOT NULL,
  PRIMARY KEY (`data_vils`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `tb_visualiz`
--

INSERT INTO `tb_visualiz` (`data_vils`, `cont_vils`) VALUES
('2023-05-10', 4),
('2023-05-11', 1),
('2023-05-13', 1),
('2023-05-16', 2),
('2023-05-20', 1),
('2023-05-22', 1),
('2023-05-23', 1);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
