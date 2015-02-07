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
-- Estrutura da tabela `pro_modulos`
--

CREATE TABLE IF NOT EXISTS `pro_modulos` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `curso_id` varchar(255) NOT NULL,
  `modulo` varchar(255) DEFAULT NULL,
  `conteudo` tinytext,
  `ordem` int(4) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Extraindo dados da tabela `pro_modulos`
--

INSERT INTO `pro_modulos` (`id`, `curso_id`, `modulo`, `conteudo`, `ordem`) VALUES
(1, '2', 'Introdução ao PHP', 'PHP é uma linguagem poderosa e um interpretador, seja incluído em um servidor web como um módulo ou executado separadamente como binário CGI, é possível acessar arquivos, executar comandos e abrir conexões de rede no servidor. Essas propriedades fazem qua', 1),
(2, '2', 'Arrays', 'Um array no PHP é atualmente um mapa ordenado. Um mapa é um tipo que relaciona valores para chaves. Este tipo é otimizado de várias maneiras, então você pode usá-lo como um array real, ou uma lista (vetor), hashtable (que é uma implementação de mapa), dic', 2),
(3, '3', 'Introdução a Redes', 'A primeira coisa que devemos entender ao começar a estudar redes é a sua definição. Quando falamos em redes de computadores, a maioria das pessoas pensa em uma série de computadores ligados entre si por meio de cabos para trocarem dados ou então pensa em ', 1);
