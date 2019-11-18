-- version 4.7.0
-- phpMyAdmin SQL Dump
-- https://www.phpmyadmin.net/
--
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";

--
-- Database: `prunners`
--
-- --------------------------------------------------------
--
-- Estrutura da tabela `usuario`
--
CREATE TABLE `usuario` (
  `id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `senha` varchar(32) NOT NULL,
  `permissao` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
--
-- Estrutura da tabela `cidade`
--
CREATE TABLE `cidade` (
  `idcidade` int(11) NOT NULL,
  `nome` varchar(150) NOT NULL,
  `idestado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
--
-- Estrutura da tabela `estado`
--
CREATE TABLE `estado` (
  `idestado` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `uf` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
--
-- Estrutura da tabela `categoria`
--
CREATE TABLE `categoria` (
  `idcategoria` int(11) NOT NULL,
  `categoria` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
--
-- Estrutura da tabela `equipe`
--
CREATE TABLE `equipe` (
  `idequipe` int(11) NOT NULL,
  `equipe` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
--
-- Estrutura da tabela `atleta`
--
CREATE TABLE `atleta` (
  `idatleta` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `idequipe` int(11) NOT NULL,
  `idcategoria` int(11) NOT NULL,
  `documento` varchar(255) NOT NULL,
  `infoadicionais` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
--
-- Estrutura da tabela `corrida`
--
CREATE TABLE `corrida` (
  `idcorrida` int(11) NOT NULL,
  `nomecorrida` varchar(255) NOT NULL,
  `data` date NOT NULL,
  `kilometragem` varchar(255) NOT NULL,
  `regiao` varchar(255) NOT NULL,
  `infoadicionais` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
--
-- Estrutura da tabela `evento`
--
CREATE TABLE `evento` (
  `idevento` int(11) NOT NULL,
  `idatleta` int(11) NOT NULL,
  `idcorrida` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



--
-- Indexes for dumped tables
--

--
-- Indexes for table `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`idcategoria`);

--
-- Indexes for table `cidade`
--
ALTER TABLE `cidade`
  ADD PRIMARY KEY (`idcidade`),
  ADD KEY `estado_cidade_fk` (`idestado`);

--
-- Indexes for table `estado`
--
ALTER TABLE `estado`
  ADD PRIMARY KEY (`idestado`);
--
-- Indexes for table `corrida`
--
ALTER TABLE `corrida`
  ADD PRIMARY KEY (`idcorrida`);
--
-- Indexes for table `equipe`
--
ALTER TABLE `equipe`
  ADD PRIMARY KEY (`idequipe`);
--
-- Indexes for table `atleta`
--
ALTER TABLE `atleta`
  ADD PRIMARY KEY (`idatleta`),
  ADD KEY `FK_atleta_equipe` (`idequipe`),
  ADD KEY `FK_atleta_categoria` (`idcategoria`) USING BTREE;
--
-- Indexes for table `evento`
--
ALTER TABLE `evento`
  ADD PRIMARY KEY (`idevento`),
  ADD KEY `FK_evento_atleta` (`idatleta`),
  ADD KEY `FK_evento_corrida` (`idcorrida`);
--
-- Indexes for table `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`);
--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `atleta`
--
ALTER TABLE `atleta`
  MODIFY `idatleta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `categoria`
--
ALTER TABLE `categoria`
  MODIFY `idcategoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `cidade`
--
ALTER TABLE `cidade`
  MODIFY `idcidade` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `corrida`
--
ALTER TABLE `corrida`
  MODIFY `idcorrida` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `equipe`
--
ALTER TABLE `equipe`
  MODIFY `idequipe` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `estado`
--
ALTER TABLE `estado`
  MODIFY `idestado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `evento`
--
ALTER TABLE `evento`
  MODIFY `idevento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `cidade`
--
ALTER TABLE `cidade`
  ADD CONSTRAINT `estado_cidade_fk` FOREIGN KEY (`idestado`) REFERENCES `estado` (`idestado`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;
