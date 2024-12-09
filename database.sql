SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `intranet heliux
`
--

-- Estrutura para tabela `intranet heliux`
--

CREATE TABLE `arquivos` (
  `cod` int(10) NOT NULL,
  `data_hora` datetime NOT NULL,
  `extencao` varchar(5) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `proprietario` int(10) NOT NULL,
  `ref` varchar(40) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `visibilidade` varchar(10) NOT NULL,
  `url` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `nome_original` varchar(255) DEFAULT NULL,
  `tipo` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Fazendo dump de dados para tabela `arquivos`
--

INSERT INTO `arquivos` (`cod`, `data_hora`, `extencao`, `proprietario`, `ref`, `visibilidade`, `url`, `nome_original`, `tipo`) VALUES



--
-- Estrutura para tabela `setor`
--

CREATE TABLE `departamento` (
  `cod` int(10) NOT NULL,
  `nome` varchar(20) NOT NULL,
  `setor` char(1) NOT NULL,
  `ref` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



--
-- Estrutura para tabela `usuarios ou pessoas`
--

CREATE TABLE `usuarios` (
  `codigo` int(6) NOT NULL,
  `ref` varchar(10) NOT NULL,
  `cargo` varchar(10) NOT NULL,
  `usuario` varchar(40) NOT NULL,
  `setor` varchar(20) DEFAULT NULL,
  `data_p1` date DEFAULT NULL,
  `data_p2` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;




--
-- Estrutura para tabela `users`
--

CREATE TABLE `users` (
  `user_id` int(4) NOT NULL,
  `username` varchar(50) NOT NULL,
  `user_password` varchar(32) NOT NULL,
  `user_first_name` varchar(255) NOT NULL,
  `user_last_name` varchar(255) DEFAULT NULL,
  `sex` char(1) DEFAULT NULL,
  `email` varchar(50) NOT NULL,
  `user_tipo` varchar(20) NOT NULL,
  `user_birth_date` date DEFAULT NULL,
  `user_date_creation` date DEFAULT NULL,
  `senha_prov` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Fazendo dump de dados para tabela `users`
--

INSERT INTO `users` (`user_id`, `username`, `user_password`, `user_first_name`, `user_last_name`, `sex`, `email`, `user_tipo`, `user_birth_date`, `user_date_creation`, `senha_prov`) VALUES




