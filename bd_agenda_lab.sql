-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Tempo de geração: 16-Set-2022 às 17:25
-- Versão do servidor: 10.4.24-MariaDB
-- versão do PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `bd_agenda_lab`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_agendamento`
--

CREATE TABLE `tb_agendamento` (
  `id_agendamento` int(11) NOT NULL,
  `data_pedido` date NOT NULL,
  `data_agendamento` date NOT NULL,
  `hora_inicio` int(11) NOT NULL,
  `hora_fim` int(11) NOT NULL,
  `id_professor` int(11) NOT NULL,
  `id_laboratorio` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_laboratorio`
--

CREATE TABLE `tb_laboratorio` (
  `id_laboratorio` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_professor`
--

CREATE TABLE `tb_professor` (
  `id_professor` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `matricula` int(11) DEFAULT NULL,
  `telefone` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `tb_agendamento`
--
ALTER TABLE `tb_agendamento`
  ADD PRIMARY KEY (`id_agendamento`),
  ADD KEY `id_professor` (`id_professor`),
  ADD KEY `id_laboratorio` (`id_laboratorio`);

--
-- Índices para tabela `tb_laboratorio`
--
ALTER TABLE `tb_laboratorio`
  ADD PRIMARY KEY (`id_laboratorio`);

--
-- Índices para tabela `tb_professor`
--
ALTER TABLE `tb_professor`
  ADD PRIMARY KEY (`id_professor`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `tb_agendamento`
--
ALTER TABLE `tb_agendamento`
  MODIFY `id_agendamento` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tb_laboratorio`
--
ALTER TABLE `tb_laboratorio`
  MODIFY `id_laboratorio` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tb_professor`
--
ALTER TABLE `tb_professor`
  MODIFY `id_professor` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `tb_agendamento`
--
ALTER TABLE `tb_agendamento`
  ADD CONSTRAINT `tb_agendamento_ibfk_1` FOREIGN KEY (`id_professor`) REFERENCES `tb_professor` (`id_professor`),
  ADD CONSTRAINT `tb_agendamento_ibfk_2` FOREIGN KEY (`id_laboratorio`) REFERENCES `tb_laboratorio` (`id_laboratorio`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
