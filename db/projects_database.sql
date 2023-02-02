-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 02-Fev-2023 às 12:52
-- Versão do servidor: 10.4.27-MariaDB
-- versão do PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `projects_database`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `fullName` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `rePassword` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `confirmationCode` varchar(255) NOT NULL,
  `status` varchar(20) NOT NULL,
  `registrationDate` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `users`
--

INSERT INTO `users` (`id`, `fullName`, `email`, `password`, `rePassword`, `token`, `confirmationCode`, `status`, `registrationDate`) VALUES
(1, 'teste', 'teste@teste.teste', '64e41586b9608df4f7be38cc33bce7072bd29a05', '64e41586b9608df4f7be38cc33bce7072bd29a05', '', '', '', '31/01/2023'),
(3, 'Karoline cruz', 'teste@teste.com', '4ad102f4e99845eda42fd05d70f88c2540a82054', '', '', '63dab0353799a', 'confirmed', '01/02/2023'),
(4, 'sadsadsadsad', 'teste@teste.teste123', '16184c7e2b7bf1439c69d510cd4d16e315d22e3c', '', '67a7654e39553cfdda9e29096c4dfb777b967b6b', '63dab0e9062f1', 'confirmed', '01/02/2023'),
(5, 'Karoline cruz', 'karol@teste.com', '5d09462946e9e6ef139756defe74fb4766a913f9', '', '', '63dba0352e47e', 'new', '02/02/2023'),
(6, 'Maria Silva', 'maria@maria.com', '7fc86d298abf24871c7814aa77a075ac2b3f75e5', '', '', '63dba28768871', 'new', '02/02/2023'),
(7, 'Fernanda', 'fe@gmail.com', 'fa3d467c8d7041d0505d20a461722a8970e4ca7d', '', '', '63dba2b3d9c3b', 'new', '02/02/2023'),
(8, 'teste', 'teste123@teste.com', '62f86bff9c760576891c4d43618ba465695bea72', '', '', '63dba2e31bd45', 'new', '02/02/2023'),
(9, 'testes', 'testes123@teste.com', '650107d1373f963ef0b1185f91c55214c32ce8f4', '', '', '63dba348bba4e', 'new', '02/02/2023');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
