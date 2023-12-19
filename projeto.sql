-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 09-Out-2021 às 12:46
-- Versão do servidor: 10.4.13-MariaDB
-- versão do PHP: 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `projeto`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `atividades`
--

CREATE TABLE `atividades` (
  `id_atividade` int(10) NOT NULL,
  `nomeAtividade` varchar(50) NOT NULL,
  `outros` text NOT NULL,
  `id_usuario` int(10) NOT NULL,
  `id_processo` int(10) NOT NULL,
  `id_etapa` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `atividades`
--

INSERT INTO `atividades` (`id_atividade`, `nomeAtividade`, `outros`, `id_usuario`, `id_processo`, `id_etapa`) VALUES
(5, 'Carvajal', 'apenas testando', 1, 20, 23),
(6, 'Casemiro', 'apenas testando', 1, 20, 23),
(7, 'Modric', 'apenas testando', 1, 20, 23),
(8, 'Kross', 'apenas testando', 1, 20, 23),
(12, 'Marquinhos', 'apenas testando', 1, 21, 38),
(13, 'Sergio Ramos', 'apenas testando', 1, 21, 38),
(14, 'Messi', 'apenas testando', 1, 21, 38),
(15, 'Oblack', 'apenas testando', 1, 20, 24),
(16, 'Munir El Haddadi', 'apenas testando', 1, 20, 26),
(17, 'Óliver Torres', 'apenas testando', 1, 20, 26),
(18, 'Joan Jordán', 'apenas testando', 1, 20, 26),
(19, 'Nemanja Gudelj', 'apenas testando', 1, 20, 26),
(20, 'Karim Rekik', 'apenas testando', 1, 20, 26),
(22, 'Sergi roberto', 'apenas testando', 1, 20, 25),
(23, 'Jordi Alba', 'apenas testando', 1, 20, 25),
(24, 'Sergio Busquets', 'apenas testando', 1, 20, 25),
(26, 'Fender', 'apenas testando', 1, 32, 46),
(29, 'evan', 'apenas testando', 1, 31, 45),
(30, 'pear', 'apenas testando', 1, 31, 45),
(31, 'tagima', 'apenas testando', 1, 32, 46),
(32, 'Gibons', 'apenas testando', 1, 32, 46),
(34, 'Caixa', 'apenas testando', 1, 31, 45),
(35, 'Gabigol', 'apenas testando', 1, 26, 41),
(60, 'Ferland Mendy', 'apenas testando', 1, 20, 23),
(67, 'for', 'apenas testando', 1, 28, 43),
(68, 'David Luiz 32', 'apenas testando', 1, 26, 41),
(76, 'inversa', 'apenas testando', 1, 34, 47),
(78, 'Gabriel Jesus', 'apenas testando', 1, 22, 28),
(80, 'NECADA', 'apenas testando', 1, 20, 23),
(97, 'guti', 'apenas testando', 1, 20, 23);

-- --------------------------------------------------------

--
-- Estrutura da tabela `etapas`
--

CREATE TABLE `etapas` (
  `id_etapa` int(10) NOT NULL,
  `nomeEtapa` varchar(50) NOT NULL,
  `observacao` text NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `id_processo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `etapas`
--

INSERT INTO `etapas` (`id_etapa`, `nomeEtapa`, `observacao`, `id_usuario`, `id_processo`) VALUES
(23, 'Real Madrid', ' 13 vezes campeão da maior competição de clubes', 1, 20),
(24, 'Atletico', '', 1, 20),
(25, 'Barcelona', '', 1, 20),
(26, 'Servilla', '', 1, 20),
(27, 'Real Sociedad', '', 1, 20),
(28, 'City', '', 1, 22),
(29, 'Manchester U', '', 1, 22),
(30, 'Liverpool', '', 1, 22),
(31, 'Chelsea', '', 1, 22),
(32, 'Leicester City', '', 1, 22),
(33, 'Bayern', '', 1, 23),
(34, 'Rb Leipzig', '', 1, 23),
(35, 'Borussia Dortmund', '', 1, 23),
(36, 'Wolfsburg', '', 1, 23),
(37, 'Lille', '', 1, 21),
(38, 'PSG', '', 1, 21),
(39, 'Lyon', '', 1, 21),
(40, 'Mônaco', '', 1, 21),
(41, 'Flamengo', '', 1, 26),
(42, 'Internacional', '', 1, 26),
(43, 'Algoritmo', '', 1, 28),
(44, 'Juiz', '', 1, 29),
(45, 'Felipe', '', 1, 31),
(46, 'Juninho', '', 1, 32),
(47, 'Regra de três', '', 1, 34),
(84, 'Vasco', '', 1, 26);

-- --------------------------------------------------------

--
-- Estrutura da tabela `itens`
--

CREATE TABLE `itens` (
  `id_item` int(10) NOT NULL,
  `id_atividade` int(10) NOT NULL,
  `item` varchar(50) NOT NULL,
  `iniciais` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `itens`
--

INSERT INTO `itens` (`id_item`, `id_atividade`, `item`, `iniciais`) VALUES
(2, 22, 'Particulas sólidas', ' PCZZZMRAZZZZ'),
(3, 23, 'Particulas sólidas', ' ZZ'),
(4, 24, 'Particulas sólidas', ' ZZ'),
(6, 26, 'Particulas sólidas', ' ZZZZZZZZZZZZ'),
(9, 29, 'Particulas sólidas', ' ZZZZZZZZZZZZ'),
(10, 29, 'Gases e sapores', ' PTMIRBLPNMMI'),
(11, 29, 'Contaminação da água', ' PCGIRBLPAMMI'),
(12, 29, 'Contaminação do solo', ' NZZZZZZZZZZZ'),
(13, 29, 'Redução da diversidade', ' ZTZZZZZZZZZZ'),
(14, 29, 'Economia Local', ' ZZPZZZZZZZZZ'),
(15, 29, 'Infraestrutura', ' ZZZDZZZZZZZZ'),
(16, 29, 'Tecnologia', ' ZZZZZZZZALZZ'),
(17, 29, 'Qualidade de vida', ' PCGIZZZZNCFZ'),
(18, 29, 'Saúde', ' ZZZIZZRAZZZZ'),
(19, 29, 'Desenvolvimento Regional', ' NCPZRMEAAMMM'),
(20, 29, 'Paisagimos', ' NZGZRBLAAMZM'),
(21, 29, 'Qualidade do Produto Final', ' PTZZRZRZAMMM'),
(22, 30, 'Particulas sólidas', ' ZZZZZZZZZZZZ'),
(23, 30, 'Gases e sapores', ' ZZZZZZZZZZFZ'),
(24, 30, 'Contaminação da água', ' ZZZZZZZZZZFZ'),
(25, 30, 'Contaminação do solo', ' ZZZZZZZZZZFZ'),
(26, 30, 'Redução da diversidade', ' ZZZZZZZZZZZE'),
(27, 30, 'Economia Local', ' ZZZZZZZZZLZZ'),
(28, 30, 'Infraestrutura', ' ZZZZZZZZAZZZ'),
(29, 30, 'Tecnologia', ' ZZZZZZZZZZZI'),
(30, 30, 'Qualidade de vida', ' ZZZZZZZZZZMZ'),
(31, 30, 'Saúde', ' ZZZZZZZZZZZI'),
(32, 30, 'Desenvolvimento Regional', ' ZZPZZZZZZZZZ'),
(33, 30, 'Paisagimos', ' ZZPZZZZZZZZZ'),
(34, 30, 'Qualidade do Produto Final', ' ZZZDZZZZZZZZ'),
(35, 31, 'Particulas sólidas', ' ZZZZZZZZZZFZ'),
(36, 31, 'Gases e sapores', ' ZZZZZZZZZZFZ'),
(37, 31, 'Contaminação da água', ' ZZZZZZZZZZMZ'),
(38, 31, 'Contaminação do solo', ' ZZZZZZZZZZZE'),
(39, 31, 'Redução da diversidade', ' ZZZZZZZZZMZZ'),
(40, 31, 'Economia Local', ' ZZZZZZEZZZZZ'),
(41, 31, 'Infraestrutura', ' ZZZZZZZAZZZZ'),
(42, 31, 'Tecnologia', ' ZZZZIZZZZZZZ'),
(43, 31, 'Qualidade de vida', ' ZPGZZZZZZZZZ'),
(44, 31, 'Saúde', ' ZPGIZZZZZZZZ'),
(45, 31, 'Desenvolvimento Regional', ' ZZZZZZZZZZZZ'),
(46, 31, 'Paisagimos', ' ZZZZZZZZZCFE'),
(47, 31, 'Qualidade do Produto Final', ' NZZZZZZZZZZZ'),
(48, 32, 'Particulas sólidas', ' ZZZZZZZZZZZZ'),
(50, 34, 'Particulas sólidas', ' ZZZZZZZZZZZZ'),
(51, 35, 'Particulas sólidas', ' ZZZZZZZZZZZZ'),
(52, 35, 'Gases e sapores', ' ZZZZZZZZZMMM'),
(158, 5, 'Particulas sólidas', ' ZZZZZZZZZZZZ'),
(159, 5, 'Gases e sapores', ' ZTMZZBRZNMOZ'),
(170, 60, 'Particulas sólidas', ' ZZZZZZZZZZZZ'),
(171, 60, 'Gases e sapores', ' PTPDRBLPNCFI'),
(172, 60, 'Contaminação da água', ' NCMIZZZZZZZZ'),
(173, 60, 'Qualidade do Produto Final', ' ZZZZIMRZNMMM'),
(185, 67, 'Particulas sólidas', ' ZZZZZZZZZZZZ'),
(186, 67, 'Gases e sapores', ' PTPDRBLPNCFI'),
(187, 68, 'Particulas sólidas', ' ZZZZZZZZZZZZ'),
(188, 68, 'Gases e sapores', ' PTPIZZZAAMMM'),
(189, 68, 'Contaminação da água', ' NTMIIMEANMMI'),
(190, 68, 'Contaminação do solo', ' NCGIIMEPNMOE'),
(191, 68, 'Redução da diversidade', ' NCMIIMEPNLMI'),
(192, 68, 'Economia Local', ' NTMDZZZPALOM'),
(193, 68, 'Infraestrutura', ' ZZZZZZZZZZZZ'),
(194, 68, 'Tecnologia', ' ZZZZZZZZZZZZ'),
(195, 68, 'Qualidade de vida', ' ZZZZZZZZAMZZ'),
(196, 68, 'Saúde', ' ZZZZZZRZZZZI'),
(197, 68, 'Desenvolvimento Regional', ' NTPIZZZAAMOM'),
(198, 68, 'Paisagimos', ' NTZIRMRAZMME'),
(199, 68, 'Qualidade do Produto Final', ' NCGDZZZZZZOE'),
(215, 60, 'Particulas sólidas', ' ZZZZZZZZZZZZ'),
(216, 60, 'Particulas sólidas', ' ZZZZZZZZZZZZ'),
(217, 60, 'Particulas sólidas', ' ZZZZZZZZZZZZ'),
(220, 76, 'Particulas sólidas', ' ZZZZZZZZZZZZ'),
(221, 76, 'Gases e sapores', ' PTPDRBLPNCFI'),
(223, 78, 'Particulas sólidas', ' ZZZZZZZZZZZZ'),
(224, 78, 'Contaminação da água', ' ZZMZZZRPZZFZ'),
(225, 78, 'Gases e sapores', ' ZZMZRMRPAZZZ'),
(227, 60, 'Particulas sólidas', ' ZZZZZZZZZZZZ'),
(228, 60, 'Particulas sólidas', ' ZZZZZZZZZZZZ'),
(229, 60, 'Particulas sólidas', ' ZZZZZZZZZZZZ'),
(230, 60, 'Particulas sólidas', ' ZZZZZZZZZZZZ'),
(231, 80, 'Particulas sólidas', ' ZZZZZZZZZZZZ'),
(232, 80, 'Particulas sólidas', ' ZZZZZZZZZZZZ'),
(233, 80, 'Particulas sólidas', ' ZZZZZZZZZZZZ'),
(234, 12, 'Qualidade de vida', ' ZZZZZZZZZZZZ'),
(284, 97, 'Particulas sólidas', ' ZZZZZZZZZZZZ'),
(285, 97, 'Gases e sapores', ' ZZZDZZZZZZZZ');

-- --------------------------------------------------------

--
-- Estrutura da tabela `processos`
--

CREATE TABLE `processos` (
  `id_processo` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `nomeProcesso` varchar(50) NOT NULL,
  `observacao` text NOT NULL,
  `chavePE` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `processos`
--

INSERT INTO `processos` (`id_processo`, `id_usuario`, `nomeProcesso`, `observacao`, `chavePE`) VALUES
(20, 1, 'La liga', 'campeonato espanhol', 1),
(21, 1, 'Liga 1', 'campeonato Franceis', 1),
(22, 1, 'Premier league', '', 1),
(23, 1, 'Bundesliga', '', 1),
(26, 1, 'Brasileirão', '', 1),
(27, 1, 'Argentino', '', 0),
(28, 1, 'Ciencia da Computação', '', 1),
(29, 1, 'Direito', '', 1),
(31, 1, 'Bateria', '', 1),
(32, 1, 'Guitarra', '', 1),
(34, 1, 'Matemática', '', 1),
(35, 1, 'História', '', 0),
(36, 1, 'Ciências', '', 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int(10) NOT NULL,
  `usuario` varchar(50) NOT NULL,
  `senha` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `usuario`, `senha`) VALUES
(1, 'Daniel', '202cb962ac59075b964b07152d234b70');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `atividades`
--
ALTER TABLE `atividades`
  ADD PRIMARY KEY (`id_atividade`),
  ADD KEY ` id_usuario` (`id_usuario`),
  ADD KEY `id_processo` (`id_processo`),
  ADD KEY `id_etapa` (`id_etapa`);

--
-- Índices para tabela `etapas`
--
ALTER TABLE `etapas`
  ADD PRIMARY KEY (`id_etapa`),
  ADD KEY `id_usuario_fk` (`id_usuario`),
  ADD KEY `id_processo_fk` (`id_processo`);

--
-- Índices para tabela `itens`
--
ALTER TABLE `itens`
  ADD PRIMARY KEY (`id_item`),
  ADD KEY `id_atividade` (`id_atividade`);

--
-- Índices para tabela `processos`
--
ALTER TABLE `processos`
  ADD PRIMARY KEY (`id_processo`),
  ADD KEY `id_usuario_fk` (`id_usuario`);

--
-- Índices para tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `atividades`
--
ALTER TABLE `atividades`
  MODIFY `id_atividade` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=99;

--
-- AUTO_INCREMENT de tabela `etapas`
--
ALTER TABLE `etapas`
  MODIFY `id_etapa` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=86;

--
-- AUTO_INCREMENT de tabela `itens`
--
ALTER TABLE `itens`
  MODIFY `id_item` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=288;

--
-- AUTO_INCREMENT de tabela `processos`
--
ALTER TABLE `processos`
  MODIFY `id_processo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=104;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `atividades`
--
ALTER TABLE `atividades`
  ADD CONSTRAINT `id_etapaAtividade` FOREIGN KEY (`id_etapa`) REFERENCES `etapas` (`id_etapa`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `id_processoAtividade` FOREIGN KEY (`id_processo`) REFERENCES `processos` (`id_processo`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `id_usuarioAtividade` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `etapas`
--
ALTER TABLE `etapas`
  ADD CONSTRAINT `id_processoetapa_fk` FOREIGN KEY (`id_processo`) REFERENCES `processos` (`id_processo`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `id_usuarioetapa_fk` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `itens`
--
ALTER TABLE `itens`
  ADD CONSTRAINT `id_atividade_pk` FOREIGN KEY (`id_atividade`) REFERENCES `atividades` (`id_atividade`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `processos`
--
ALTER TABLE `processos`
  ADD CONSTRAINT `id_usuario_fk` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
