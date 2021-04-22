-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 23-Abr-2021 às 00:57
-- Versão do servidor: 10.4.17-MariaDB
-- versão do PHP: 7.4.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `bluelinecar`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `adm`
--

CREATE TABLE `adm` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `senha` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `adm`
--

INSERT INTO `adm` (`id`, `nome`, `email`, `senha`) VALUES
(1, 'Bruno', 'bruno@gmail.com', '123');

-- --------------------------------------------------------

--
-- Estrutura da tabela `cliente`
--

CREATE TABLE `cliente` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `cpf` varchar(14) NOT NULL,
  `rg` varchar(12) NOT NULL,
  `endereco` varchar(255) DEFAULT NULL,
  `cidade` varchar(50) DEFAULT NULL,
  `estado` varchar(2) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `telefone` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `cliente`
--

INSERT INTO `cliente` (`id`, `nome`, `cpf`, `rg`, `endereco`, `cidade`, `estado`, `email`, `telefone`) VALUES
(1, 'Teste', '123123', '3123123', 'Rua teste', 'teste', 'MA', 'teste@gmail.com', '31231233123'),
(2, 'Beraldo', '68546846854', '7516845954', 'Rua beraldi ensina', 'Magos', 'PI', 'beraldo@gmail.com', '3123123123');

-- --------------------------------------------------------

--
-- Estrutura da tabela `veiculo`
--

CREATE TABLE `veiculo` (
  `id` int(11) NOT NULL,
  `nome_modelo` varchar(50) NOT NULL,
  `tipo` varchar(50) NOT NULL,
  `marca` varchar(50) NOT NULL,
  `ano` varchar(4) DEFAULT NULL,
  `valor` decimal(15,2) DEFAULT NULL,
  `foto` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `veiculo`
--

INSERT INTO `veiculo` (`id`, `nome_modelo`, `tipo`, `marca`, `ano`, `valor`, `foto`) VALUES
(1, 'Corolla', 'Sedan', 'Toyota', '2020', '40000.00', 'corolla.jpg'),
(2, 'Voyage', 'Luxo', 'Volkswagen', '2022', '26000.00', NULL),
(3, 'Fenix', 'Hyper', 'Sky', '2030', '12560000.00', NULL),
(4, 'Teste', 'teste', 'teste', '2021', '2000.00', 'onix.jpg'),
(5, 'Lamborghini Venon', 'Luxo', 'Lamborghini', '2020', '800000.00', 'laborghini_veneno.jpg'),
(6, 'Lamborghini Huracan', 'Sport', 'Lamborghini', '2018', '946000.00', 'Lamborghini_Huracan_Evo_Genf_2019_1Y7A5452.jpg'),
(7, 'Mustang', 'Sport', 'Ford', '2020', '89000.00', 'mustang.jpg');

-- --------------------------------------------------------

--
-- Estrutura da tabela `venda`
--

CREATE TABLE `venda` (
  `id` int(11) NOT NULL,
  `cpf_cliente` varchar(14) NOT NULL,
  `nome_cliente` varchar(255) NOT NULL,
  `cpf_vendedor` varchar(14) NOT NULL,
  `nome_vendedor` varchar(255) NOT NULL,
  `id_veiculo` int(11) NOT NULL,
  `quantidade` int(11) NOT NULL,
  `valor_veiculo` decimal(15,7) NOT NULL,
  `nome_modelo` varchar(50) NOT NULL,
  `desconto` int(11) NOT NULL,
  `data_venda` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `venda`
--

INSERT INTO `venda` (`id`, `cpf_cliente`, `nome_cliente`, `cpf_vendedor`, `nome_vendedor`, `id_veiculo`, `quantidade`, `valor_veiculo`, `nome_modelo`, `desconto`, `data_venda`) VALUES
(1, '68546846854', 'Beraldo', '4879879877', 'Bruno', 6, 1, '946000.0000000', 'Lamborghini Huracan', 1, '2021-04-21');

-- --------------------------------------------------------

--
-- Estrutura da tabela `vendedor`
--

CREATE TABLE `vendedor` (
  `codigo` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `cpf` varchar(14) NOT NULL,
  `email` varchar(100) NOT NULL,
  `senha` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `vendedor`
--

INSERT INTO `vendedor` (`codigo`, `nome`, `cpf`, `email`, `senha`) VALUES
(1, 'Bruno', '4879879877', 'bruno@gmail.com', '123');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `adm`
--
ALTER TABLE `adm`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Índices para tabela `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `cpf` (`cpf`),
  ADD UNIQUE KEY `rg` (`rg`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Índices para tabela `veiculo`
--
ALTER TABLE `veiculo`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `venda`
--
ALTER TABLE `venda`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `vendedor`
--
ALTER TABLE `vendedor`
  ADD PRIMARY KEY (`codigo`),
  ADD UNIQUE KEY `cpf` (`cpf`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `adm`
--
ALTER TABLE `adm`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `cliente`
--
ALTER TABLE `cliente`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `veiculo`
--
ALTER TABLE `veiculo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de tabela `venda`
--
ALTER TABLE `venda`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `vendedor`
--
ALTER TABLE `vendedor`
  MODIFY `codigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
