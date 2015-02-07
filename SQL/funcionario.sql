-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tempo de Geração: Jan 29, 2015 as 05:32 PM
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
-- Estrutura da tabela `funcionario`
--

CREATE TABLE IF NOT EXISTS `funcionario` (
  `idfuncionario` int(4) NOT NULL AUTO_INCREMENT,
  `funcionario_usuario` varchar(30) NOT NULL,
  `funcionario_nome` varchar(30) NOT NULL,
  `funcionario_email` varchar(50) NOT NULL,
  `funcionario_senha` varchar(50) NOT NULL,
  PRIMARY KEY (`idfuncionario`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Extraindo dados da tabela `funcionario`
--

INSERT INTO `funcionario` (`idfuncionario`, `funcionario_usuario`, `funcionario_nome`, `funcionario_email`, `funcionario_senha`) VALUES
(1, 'henrique', 'Henrique CS', 'hcs@hotmail.com', 'teste');
