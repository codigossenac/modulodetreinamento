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
-- Estrutura da tabela `pro_progresso`
--

CREATE TABLE IF NOT EXISTS `pro_progresso` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `curso_id` int(4) NOT NULL,
  `usuario_id` int(4) NOT NULL,
  `modulo_id` int(4) NOT NULL,
  `progresso` int(2) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Extraindo dados da tabela `pro_progresso`
--

INSERT INTO `pro_progresso` (`id`, `curso_id`, `usuario_id`, `modulo_id`, `progresso`) VALUES
(1, 2, 1, 2, 0),
(2, 3, 1, 1, 0);
