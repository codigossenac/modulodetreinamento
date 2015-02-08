-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: 08-Fev-2015 às 02:01
-- Versão do servidor: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `teste`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `areas`
--

CREATE TABLE IF NOT EXISTS `areas` (
`area_id` int(11) NOT NULL,
  `area_nome` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `areas`
--

INSERT INTO `areas` (`area_id`, `area_nome`) VALUES
(1, 'Programação'),
(6, 'Desenvolvimento de sistemas'),
(7, 'Artes'),
(8, 'Gestão');

-- --------------------------------------------------------

--
-- Estrutura da tabela `cursos`
--

CREATE TABLE IF NOT EXISTS `cursos` (
`curso_id` int(4) NOT NULL,
  `curso_nome` varchar(255) NOT NULL,
  `curso_area_id` int(11) NOT NULL,
  `curso_descricao` text
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `cursos`
--

INSERT INTO `cursos` (`curso_id`, `curso_nome`, `curso_area_id`, `curso_descricao`) VALUES
(1, 'Fotografia', 7, 'Curso de Fotografia adsfadf'),
(2, 'Programação PHP', 1, 'Aprenda a programar PHP'),
(3, 'Redes', 8, 'Aprenda a configurar rede'),
(4, 'Programação JAVA', 1, 'este curso tem como objetivo ensinar java');

-- --------------------------------------------------------

--
-- Estrutura da tabela `licoes`
--

CREATE TABLE IF NOT EXISTS `licoes` (
`licao_id` int(11) NOT NULL,
  `licao_nome` varchar(255) NOT NULL,
  `licao_tipo` varchar(255) NOT NULL,
  `licao_ordem` int(11) NOT NULL,
  `licao_modulo_id` int(11) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `licoes`
--

INSERT INTO `licoes` (`licao_id`, `licao_nome`, `licao_tipo`, `licao_ordem`, `licao_modulo_id`) VALUES
(1, 'Apresentação', 'Video', 1, 1),
(2, 'Apresentação - continuação', 'Texto', 2, 1),
(3, 'Apresentação - Fase 3', 'Imagem', 3, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `matriculas`
--

CREATE TABLE IF NOT EXISTS `matriculas` (
`matricula_id` int(4) NOT NULL,
  `matricula_data` date NOT NULL,
  `matricula_curso_id` int(4) NOT NULL,
  `usuario_id` int(4) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `matriculas`
--

INSERT INTO `matriculas` (`matricula_id`, `matricula_data`, `matricula_curso_id`, `usuario_id`) VALUES
(1, '2015-01-28', 2, 1),
(2, '2015-01-28', 3, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `modulos`
--

CREATE TABLE IF NOT EXISTS `modulos` (
`modulo_id` int(4) NOT NULL,
  `modulo_curso_id` varchar(255) NOT NULL,
  `modulo_nome` varchar(255) NOT NULL,
  `modulo_ordem` int(4) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `modulos`
--

INSERT INTO `modulos` (`modulo_id`, `modulo_curso_id`, `modulo_nome`, `modulo_ordem`) VALUES
(1, '2', 'Introdução ao PHP', 1),
(2, '2', 'Arrays', 2),
(3, '3', 'Introdução a Redes', 1),
(6, '1', 'fase 1', 1),
(5, '1', 'fase2', 2);

-- --------------------------------------------------------

--
-- Estrutura da tabela `progresso`
--

CREATE TABLE IF NOT EXISTS `progresso` (
  `progresso_licao_id` int(4) NOT NULL,
  `usuario_id` int(4) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `progresso`
--

INSERT INTO `progresso` (`progresso_licao_id`, `usuario_id`) VALUES
(2, 1),
(3, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
`usuario_id` int(11) NOT NULL,
  `usuario_nome` varchar(255) NOT NULL,
  `usuario_login` varchar(255) NOT NULL,
  `usuario_senha` varchar(255) NOT NULL,
  `usuario_tipo` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`usuario_id`, `usuario_nome`, `usuario_login`, `usuario_senha`, `usuario_tipo`) VALUES
(1, 'Carlos Alberto', 'carlosr', 'carlos', 'Administrador'),
(2, 'teste', 'teste', 'teste', 'Funcionario');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `areas`
--
ALTER TABLE `areas`
 ADD PRIMARY KEY (`area_id`);

--
-- Indexes for table `cursos`
--
ALTER TABLE `cursos`
 ADD PRIMARY KEY (`curso_id`);

--
-- Indexes for table `licoes`
--
ALTER TABLE `licoes`
 ADD PRIMARY KEY (`licao_id`);

--
-- Indexes for table `matriculas`
--
ALTER TABLE `matriculas`
 ADD PRIMARY KEY (`matricula_id`);

--
-- Indexes for table `modulos`
--
ALTER TABLE `modulos`
 ADD PRIMARY KEY (`modulo_id`);

--
-- Indexes for table `progresso`
--
ALTER TABLE `progresso`
 ADD PRIMARY KEY (`progresso_licao_id`,`usuario_id`);

--
-- Indexes for table `usuarios`
--
ALTER TABLE `usuarios`
 ADD PRIMARY KEY (`usuario_id`), ADD UNIQUE KEY `usuario_login` (`usuario_login`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `areas`
--
ALTER TABLE `areas`
MODIFY `area_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `cursos`
--
ALTER TABLE `cursos`
MODIFY `curso_id` int(4) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `licoes`
--
ALTER TABLE `licoes`
MODIFY `licao_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `matriculas`
--
ALTER TABLE `matriculas`
MODIFY `matricula_id` int(4) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `modulos`
--
ALTER TABLE `modulos`
MODIFY `modulo_id` int(4) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
MODIFY `usuario_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
