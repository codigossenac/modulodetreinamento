-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: 07-Fev-2015 às 19:19
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
-- Estrutura da tabela `cursos`
--

CREATE TABLE IF NOT EXISTS `cursos` (
`curso_id` int(4) NOT NULL,
  `curso_nome` varchar(255) NOT NULL,
  `curso_area` varchar(255) DEFAULT NULL,
  `curso_descricao` text
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `cursos`
--

INSERT INTO `cursos` (`curso_id`, `curso_nome`, `curso_area`, `curso_descricao`) VALUES
(1, 'Fotografia', 'Artes', 'Curso de Fotografia askdkjadkjaas'),
(2, 'Programação PHP', 'TI - Programação', 'Aprenda a programar PHP'),
(3, 'Redes', 'TI - Infraestrutura', 'Aprenda a configurar rede');

-- --------------------------------------------------------

--
-- Estrutura da tabela `licoes`
--

CREATE TABLE IF NOT EXISTS `licoes` (
  `licao_id` int(11) NOT NULL,
  `licao_nome` int(11) NOT NULL,
  `licao_tipo` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

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
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `modulos`
--

INSERT INTO `modulos` (`modulo_id`, `modulo_curso_id`, `modulo_nome`, `modulo_ordem`) VALUES
(1, '2', 'Introdução ao PHP', 1),
(2, '2', 'Arrays', 2),
(3, '3', 'Introdução a Redes', 1);

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cursos`
--
ALTER TABLE `cursos`
 ADD PRIMARY KEY (`curso_id`);

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
-- AUTO_INCREMENT for table `cursos`
--
ALTER TABLE `cursos`
MODIFY `curso_id` int(4) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `matriculas`
--
ALTER TABLE `matriculas`
MODIFY `matricula_id` int(4) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `modulos`
--
ALTER TABLE `modulos`
MODIFY `modulo_id` int(4) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
MODIFY `usuario_id` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
