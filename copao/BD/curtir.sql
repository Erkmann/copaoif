-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 16-Jul-2018 às 21:19
-- Versão do servidor: 10.1.32-MariaDB
-- PHP Version: 7.1.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `copao`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `curtir`
--

CREATE TABLE `curtir` (
  `usuario_id_usuario` int(4) NOT NULL,
  `time_id_time` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `curtir`
--

INSERT INTO `curtir` (`usuario_id_usuario`, `time_id_time`) VALUES
(12, 1),
(9, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `curtir`
--
ALTER TABLE `curtir`
  ADD KEY `fk_usuario_has_time_time1_idx` (`time_id_time`),
  ADD KEY `fk_usuario_has_time_usuario1_idx` (`usuario_id_usuario`);

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `curtir`
--
ALTER TABLE `curtir`
  ADD CONSTRAINT `fk_usuario_has_time_time1` FOREIGN KEY (`time_id_time`) REFERENCES `time` (`id_time`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_usuario_has_time_usuario1` FOREIGN KEY (`usuario_id_usuario`) REFERENCES `usuario` (`id_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
