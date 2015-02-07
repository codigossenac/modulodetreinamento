-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tempo de Geração: Jan 29, 2015 as 05:31 PM
-- Versão do Servidor: 5.1.66
-- Versão do PHP: 5.2.17

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Banco de Dados: `kdicas1_1`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `pro_cursos`
--

CREATE TABLE IF NOT EXISTS `pro_cursos` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `curso` varchar(255) NOT NULL,
  `area` varchar(255) DEFAULT NULL,
  `descricao` text,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Extraindo dados da tabela `pro_cursos`
--

INSERT INTO `pro_cursos` (`id`, `curso`, `area`, `descricao`) VALUES
(1, 'Fotografia', 'Artes', 'Curso de Fotografia askdkjadkjaas'),
(2, 'Programação PHP', 'TI - Programação', 'Aprenda a programar PHP'),
(3, 'Redes', 'TI - Infraestrutura', 'Aprenda a configurar rede');
