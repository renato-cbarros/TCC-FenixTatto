
-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tempo de Geração: 27/06/2016 às 16:07:13
-- Versão do Servidor: 10.0.25-MariaDB-wsrep
-- Versão do PHP: 5.2.17

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Banco de Dados: `u755489537_fenix`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `arquivo`
--

CREATE TABLE IF NOT EXISTS `arquivo` (
  `id_arquivo` int(11) NOT NULL AUTO_INCREMENT,
  `nome_arquivo` varchar(55) COLLATE utf8_unicode_ci NOT NULL,
  `profissional` varchar(55) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id_arquivo`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=264 ;

--
-- Extraindo dados da tabela `arquivo`
--

INSERT INTO `arquivo` (`id_arquivo`, `nome_arquivo`, `profissional`) VALUES
(206, '1571.jpg', 'Washington'),
(207, '30496.jpg', 'Washington'),
(208, '10457.jpg', 'Washington'),
(209, '12958.jpg', 'Washington'),
(210, '24959.jpg', 'Washington'),
(211, '16458.jpg', 'Alex'),
(212, '7099.jpg', 'Alex'),
(213, '30936.jpg', 'Alex'),
(214, '29745.jpg', 'Alex'),
(215, '5910.jpg', 'Alex'),
(216, '25932.jpg', 'Marivaldo'),
(217, '31125.jpg', 'Marivaldo'),
(218, '23210.jpg', 'Marivaldo'),
(219, '5787.jpg', 'Marivaldo'),
(220, '2616.jpg', 'Marivaldo'),
(221, '6673.jpg', 'Marivaldo'),
(222, '30582.jpg', 'Marivaldo'),
(223, '375.jpg', 'Marivaldo'),
(224, '4580.jpg', 'Marivaldo'),
(225, '17997.jpg', 'Marivaldo'),
(226, '5378.jpg', 'Marivaldo'),
(227, '15891.jpg', 'Marivaldo'),
(228, '26704.jpg', 'Marivaldo'),
(229, '31305.jpg', 'Marivaldo'),
(230, '32590.jpg', 'Marivaldo'),
(231, '10351.jpg', 'Marivaldo'),
(232, '14716.jpg', 'Marivaldo'),
(233, '29189.jpg', 'Marivaldo'),
(234, '16986.jpg', 'Marivaldo'),
(235, '23691.jpg', 'Marivaldo'),
(236, '29032.jpg', 'Marivaldo'),
(237, '10625.jpg', 'Marivaldo'),
(238, '10790.jpg', 'Marivaldo'),
(239, '13927.jpg', 'Marivaldo'),
(240, '15380.jpg', 'Marivaldo'),
(241, '23741.jpg', 'Marivaldo'),
(242, '17074.jpg', 'Marivaldo'),
(243, '20995.jpg', 'Marivaldo'),
(244, '1408.jpg', 'Marivaldo'),
(245, '1977.jpg', 'Marivaldo'),
(246, '22526.jpg', 'Marivaldo'),
(247, '2911.jpg', 'Marivaldo'),
(248, '31148.jpg', 'Marivaldo'),
(249, '26229.jpg', 'Marivaldo'),
(250, '30218.jpg', 'Marivaldo'),
(251, '32379.jpg', 'Marivaldo'),
(252, '1176.jpg', 'Marivaldo'),
(253, '29937.jpg', 'Marivaldo'),
(254, '26838.jpg', 'Marivaldo'),
(255, '1879.jpg', 'Marivaldo'),
(256, '21060.jpg', 'Marivaldo'),
(257, '28461.jpg', 'Marivaldo'),
(258, '15458.jpg', 'Marivaldo'),
(259, '16883.jpg', 'Marivaldo'),
(260, '20144.jpg', 'Marivaldo'),
(261, '20777.jpg', 'Marivaldo'),
(262, '15534.jpg', 'Marivaldo'),
(263, '2639.jpg', 'Marivaldo');

-- --------------------------------------------------------

--
-- Estrutura da tabela `cliente`
--

CREATE TABLE IF NOT EXISTS `cliente` (
  `id_cliente` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(100) NOT NULL,
  `cpf` varchar(11) NOT NULL,
  `sexo` varchar(1) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `senha` varchar(50) NOT NULL,
  `cnpj` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_cliente`),
  KEY `cnpj` (`cnpj`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Extraindo dados da tabela `cliente`
--

INSERT INTO `cliente` (`id_cliente`, `email`, `cpf`, `sexo`, `nome`, `senha`, `cnpj`) VALUES
(1, 'otavio.com', '15201081096', 'M', 'Otavio', '321', NULL),
(2, 'renato@ou.com', '123', 'm', 'Renato Barros', '123', NULL),
(3, 'matheusbpimentel@gmail.com', '45712359847', 'M', 'Matheus Batista', 'teste', NULL),
(4, 'wallace.ss2015@gmail.com', '47932418836', 'M', 'walace', '58919110', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `compras`
--

CREATE TABLE IF NOT EXISTS `compras` (
  `id_compras` int(11) NOT NULL AUTO_INCREMENT,
  `id_cliente` int(11) DEFAULT NULL,
  `id_produto` int(11) NOT NULL,
  `id_funcionario` int(11) NOT NULL,
  `valor_produto` double NOT NULL,
  `tipo` varchar(55) NOT NULL,
  `nome_produto` varchar(90) NOT NULL,
  `data_saida` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_compras`),
  KEY `id_cliente` (`id_cliente`),
  KEY `id_funcionario` (`id_funcionario`),
  KEY `id_produto` (`id_produto`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=21 ;

--
-- Extraindo dados da tabela `compras`
--

INSERT INTO `compras` (`id_compras`, `id_cliente`, `id_produto`, `id_funcionario`, `valor_produto`, `tipo`, `nome_produto`, `data_saida`) VALUES
(1, NULL, 1, 1, 100, 'PIERCING', 'maquina01', '2016-06-24 03:31:11'),
(2, NULL, 1, 1, 100, 'PIERCING', 'maquina01', '2016-06-24 03:31:11'),
(3, NULL, 1, 1, 100, 'PIERCING', 'maquina01', '2016-06-24 03:31:12'),
(4, NULL, 1, 1, 100, 'PIERCING', 'maquina01', '2016-06-24 03:31:12'),
(5, NULL, 1, 1, 100, 'PIERCING', 'maquina01', '2016-06-24 04:43:04'),
(6, NULL, 1, 1, 100, 'PIERCING', 'maquina01', '2016-06-24 06:16:42'),
(7, NULL, 1, 1, 100, 'PIERCING', 'maquina01', '2016-06-24 06:16:44'),
(8, NULL, 1, 1, 100, 'PIERCING', 'maquina01', '2016-06-24 06:16:45'),
(9, NULL, 1, 1, 100, 'PIERCING', 'maquina01', '2016-06-24 06:16:46'),
(10, NULL, 1, 1, 100, 'PIERCING', 'maquina01', '2016-06-24 06:16:48'),
(11, NULL, 1, 1, 100, 'PIERCING', 'maquina01', '2016-06-24 06:18:40'),
(12, NULL, 1, 1, 100, 'PIERCING', 'maquina01', '2016-06-24 06:18:40'),
(13, NULL, 1, 1, 100, 'PIERCING', 'maquina01', '2016-06-24 06:18:40'),
(14, NULL, 1, 1, 100, 'PIERCING', 'maquina01', '2016-06-24 06:18:40'),
(15, NULL, 1, 1, 100, 'PIERCING', 'maquina01', '2016-06-24 06:18:40'),
(16, NULL, 1, 1, 100, 'PIERCING', 'maquina01', '2016-06-24 06:18:41'),
(17, NULL, 1, 1, 100, 'PIERCING', 'maquina01', '2016-06-24 06:18:44'),
(18, NULL, 1, 1, 100, 'PIERCING', 'maquina01', '2016-06-24 06:18:45'),
(19, NULL, 1, 1, 100, 'PIERCING', 'maquina01', '2016-06-24 06:18:46'),
(20, NULL, 1, 1, 100, 'PIERCING', 'maquina01', '2016-06-24 06:18:48');

-- --------------------------------------------------------

--
-- Estrutura da tabela `endereco_cliente`
--

CREATE TABLE IF NOT EXISTS `endereco_cliente` (
  `id_endereco_clien` int(11) NOT NULL AUTO_INCREMENT,
  `id_cliente` int(11) NOT NULL,
  `rua` varchar(100) NOT NULL,
  `bairro` varchar(100) NOT NULL,
  `numero` int(11) NOT NULL,
  `complemento` varchar(100) DEFAULT NULL,
  `cep` varchar(11) NOT NULL,
  `estado` varchar(30) NOT NULL,
  `cidade` varchar(100) NOT NULL,
  PRIMARY KEY (`id_endereco_clien`),
  KEY `id_cliente` (`id_cliente`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Extraindo dados da tabela `endereco_cliente`
--

INSERT INTO `endereco_cliente` (`id_endereco_clien`, `id_cliente`, `rua`, `bairro`, `numero`, `complemento`, `cep`, `estado`, `cidade`) VALUES
(1, 1, 'Rua Itacuré', 'Cidade Ipava', 222, '', '04950070', 'SP', 'São Paulo'),
(2, 2, 'Felipe Rodrigues', 'Cidade Ipava', 12, '', '4950010', 'SP', 'S'),
(3, 3, 'Sadamu Inoue', 'Parelheiros', 7, 'Casa', '4825000', 'SP', 'S'),
(4, 4, 'Ravi', 'Tuparacoera', 324, 'nha', '4917110', 'SP', 'S');

-- --------------------------------------------------------

--
-- Estrutura da tabela `endereco_funcionario`
--

CREATE TABLE IF NOT EXISTS `endereco_funcionario` (
  `id_endereco_func` int(11) NOT NULL AUTO_INCREMENT,
  `id_funcionario` int(11) NOT NULL,
  `rua` varchar(100) NOT NULL,
  `bairro` varchar(100) NOT NULL,
  `numero` int(11) NOT NULL,
  `complemento` varchar(100) DEFAULT NULL,
  `cep` varchar(11) NOT NULL,
  `estado` varchar(30) NOT NULL,
  `cidade` varchar(100) NOT NULL,
  PRIMARY KEY (`id_endereco_func`),
  KEY `id_funcionario` (`id_funcionario`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=14 ;

--
-- Extraindo dados da tabela `endereco_funcionario`
--

INSERT INTO `endereco_funcionario` (`id_endereco_func`, `id_funcionario`, `rua`, `bairro`, `numero`, `complemento`, `cep`, `estado`, `cidade`) VALUES
(11, 2, 'Rua Itacuré', 'Cidade Ipava', 1, '', '04950070', 'SP', 'São Paulo'),
(13, 1, 'Rua Felipe Rodrigues', 'Cidade Ipava', 32, '', '04950010', 'SP', 'São Paulo');

-- --------------------------------------------------------

--
-- Estrutura da tabela `fenix_tattoo`
--

CREATE TABLE IF NOT EXISTS `fenix_tattoo` (
  `cnpj` int(11) NOT NULL,
  `nome` varchar(100) DEFAULT NULL,
  `cep` varchar(100) DEFAULT NULL,
  `telefone` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`cnpj`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `fenix_tattoo`
--

INSERT INTO `fenix_tattoo` (`cnpj`, `nome`, `cep`, `telefone`) VALUES
(123, 'Fenix Tattoo', '1231', '58955895');

-- --------------------------------------------------------

--
-- Estrutura da tabela `funcionario`
--

CREATE TABLE IF NOT EXISTS `funcionario` (
  `id_funcionario` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(100) NOT NULL,
  `cpf` varchar(11) NOT NULL,
  `sexo` varchar(1) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `senha` varchar(50) NOT NULL,
  `cnpj` int(11) DEFAULT NULL,
  `funcao` varchar(11) NOT NULL,
  PRIMARY KEY (`id_funcionario`),
  KEY `cnpj` (`cnpj`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Extraindo dados da tabela `funcionario`
--

INSERT INTO `funcionario` (`id_funcionario`, `email`, `cpf`, `sexo`, `nome`, `senha`, `cnpj`, `funcao`) VALUES
(1, 'renatobarros123@outlook.com.br', '12788120591', 'M', 'Renato', '987654321', NULL, 'M'),
(2, 'otavio.com', '15201081096', 'M', 'Otavio', '321', NULL, 'F');

-- --------------------------------------------------------

--
-- Estrutura da tabela `produto`
--

CREATE TABLE IF NOT EXISTS `produto` (
  `id_produto` int(11) NOT NULL AUTO_INCREMENT,
  `nome_produto` varchar(100) NOT NULL,
  `valor_produto` double NOT NULL,
  `descricao` varchar(100) NOT NULL,
  `quantidade` int(11) NOT NULL,
  `tipo` varchar(55) NOT NULL,
  `cnpj` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_produto`),
  KEY `cnpj` (`cnpj`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=17 ;

--
-- Extraindo dados da tabela `produto`
--

INSERT INTO `produto` (`id_produto`, `nome_produto`, `valor_produto`, `descricao`, `quantidade`, `tipo`, `cnpj`) VALUES
(1, 'maquina01', 100, 'd+', 10, 'MAQUINA', NULL),
(2, 'Piercing para Orelha', 500, 'Piercing feito para ser colocado na orelha', 100, 'piercing', NULL),
(3, 'Piercing para Orelha', 500, 'Piercing feito para ser colocado na orelha', 100, 'piercing', NULL),
(4, 'Piercing para Umbigo', 1000, 'Piercing para deixar seu umbigo mais bonito', 100, 'piercing', NULL),
(5, 'Piercing', 150, 'Piercings para o comprador colocar em qualquer parte do', 100, 'piercing', NULL),
(6, 'Maquina Dourada', 1500, 'MÃ¡quina para tatuar na cor dourada', 100, 'maquina', NULL),
(7, 'MÃ¡quina Diferente', 800, 'MÃ¡quina para tatuar', 100, 'maquina', NULL),
(8, 'Maquina Preta', 299, 'MÃ¡quina para tatuar na cor preta', 100, 'maquina', NULL),
(9, 'Maquina Preta', 1000, 'MÃ¡quina para tatuar na cor preta', 100, 'maquina', NULL),
(10, 'MÃ¡quina Roxa', 700, 'MÃ¡quina para tatuar na cor roxa', 100, 'maquina', NULL),
(11, 'Tinta Amarela', 100, 'Tinta na cor amarela', 100, 'tinta', NULL),
(12, 'Tinta Branca', 150, 'Tinta na cor branca', 100, 'tinta', NULL),
(13, 'Tinta Louca', 180, 'Tinta muito louca', 100, 'tinta', NULL),
(14, 'Tinta Preta', 250, 'Tinta para tatuar na cor preta', 100, 'tinta', NULL),
(15, 'Tinta Verde', 400, 'Tinta para tatuar na cor verde', 100, 'tinta', NULL),
(16, 'Piercing para Boca', 300, 'Piercing para ser colocado na boca', 100, 'piercing', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `secao`
--

CREATE TABLE IF NOT EXISTS `secao` (
  `id_secao` int(11) NOT NULL AUTO_INCREMENT,
  `datta` date NOT NULL,
  `hora_entrada` time NOT NULL,
  `hora_saida` time NOT NULL,
  `numero_sessoes` int(11) NOT NULL,
  `valor` double NOT NULL,
  `id_cliente` int(11) NOT NULL,
  `id_funcionario` int(11) NOT NULL,
  `id_tatuagem` int(11) NOT NULL,
  PRIMARY KEY (`id_secao`),
  KEY `id_cliente` (`id_cliente`),
  KEY `id_funcionario` (`id_funcionario`),
  KEY `id_tatuagem` (`id_tatuagem`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Extraindo dados da tabela `secao`
--

INSERT INTO `secao` (`id_secao`, `datta`, `hora_entrada`, `hora_saida`, `numero_sessoes`, `valor`, `id_cliente`, `id_funcionario`, `id_tatuagem`) VALUES
(2, '2016-06-24', '12:00:00', '17:00:00', 1, 200, 1, 1, 1),
(3, '2016-05-29', '21:56:00', '22:56:00', 2, 1111, 1, 1, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tatuagem`
--

CREATE TABLE IF NOT EXISTS `tatuagem` (
  `id_tatuagem` int(11) NOT NULL AUTO_INCREMENT,
  `nome_tatuagem` varchar(100) NOT NULL,
  `descricao` varchar(100) NOT NULL,
  `cnpj` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_tatuagem`),
  KEY `cnpj` (`cnpj`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Extraindo dados da tabela `tatuagem`
--

INSERT INTO `tatuagem` (`id_tatuagem`, `nome_tatuagem`, `descricao`, `cnpj`) VALUES
(1, 'tattoo01', 'mtloca', NULL),
(2, '12345', 'qwer', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `telefone_cliente`
--

CREATE TABLE IF NOT EXISTS `telefone_cliente` (
  `id_telefone_clien` int(11) NOT NULL AUTO_INCREMENT,
  `id_cliente` int(11) NOT NULL,
  `telefone_residencial` mediumtext NOT NULL,
  `telefone_celular` mediumtext,
  PRIMARY KEY (`id_telefone_clien`),
  KEY `id_cliente` (`id_cliente`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Extraindo dados da tabela `telefone_cliente`
--

INSERT INTO `telefone_cliente` (`id_telefone_clien`, `id_cliente`, `telefone_residencial`, `telefone_celular`) VALUES
(1, 1, '5555555555', '9999999999');

-- --------------------------------------------------------

--
-- Estrutura da tabela `telefone_funcionario`
--

CREATE TABLE IF NOT EXISTS `telefone_funcionario` (
  `id_telefone_funci` int(11) NOT NULL AUTO_INCREMENT,
  `id_funcionario` int(11) NOT NULL,
  `telefone_residencial` mediumtext NOT NULL,
  `telefone_celular` mediumtext,
  PRIMARY KEY (`id_telefone_funci`),
  KEY `id_funcionario` (`id_funcionario`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Extraindo dados da tabela `telefone_funcionario`
--

INSERT INTO `telefone_funcionario` (`id_telefone_funci`, `id_funcionario`, `telefone_residencial`, `telefone_celular`) VALUES
(4, 1, '555555', '9999'),
(5, 2, '2222', '999999');

--
-- Restrições para as tabelas dumpadas
--

--
-- Restrições para a tabela `cliente`
--
ALTER TABLE `cliente`
  ADD CONSTRAINT `cliente_ibfk_1` FOREIGN KEY (`cnpj`) REFERENCES `fenix_tattoo` (`cnpj`);

--
-- Restrições para a tabela `compras`
--
ALTER TABLE `compras`
  ADD CONSTRAINT `compras_ibfk_1` FOREIGN KEY (`id_cliente`) REFERENCES `cliente` (`id_cliente`),
  ADD CONSTRAINT `compras_ibfk_2` FOREIGN KEY (`id_funcionario`) REFERENCES `funcionario` (`id_funcionario`),
  ADD CONSTRAINT `compras_ibfk_3` FOREIGN KEY (`id_produto`) REFERENCES `produto` (`id_produto`);

--
-- Restrições para a tabela `endereco_cliente`
--
ALTER TABLE `endereco_cliente`
  ADD CONSTRAINT `endereco_cliente_ibfk_1` FOREIGN KEY (`id_cliente`) REFERENCES `cliente` (`id_cliente`);

--
-- Restrições para a tabela `endereco_funcionario`
--
ALTER TABLE `endereco_funcionario`
  ADD CONSTRAINT `endereco_funcionario_ibfk_1` FOREIGN KEY (`id_funcionario`) REFERENCES `funcionario` (`id_funcionario`);

--
-- Restrições para a tabela `funcionario`
--
ALTER TABLE `funcionario`
  ADD CONSTRAINT `funcionario_ibfk_1` FOREIGN KEY (`cnpj`) REFERENCES `fenix_tattoo` (`cnpj`);

--
-- Restrições para a tabela `produto`
--
ALTER TABLE `produto`
  ADD CONSTRAINT `produto_ibfk_1` FOREIGN KEY (`cnpj`) REFERENCES `fenix_tattoo` (`cnpj`);

--
-- Restrições para a tabela `secao`
--
ALTER TABLE `secao`
  ADD CONSTRAINT `secao_ibfk_1` FOREIGN KEY (`id_cliente`) REFERENCES `cliente` (`id_cliente`),
  ADD CONSTRAINT `secao_ibfk_2` FOREIGN KEY (`id_funcionario`) REFERENCES `funcionario` (`id_funcionario`),
  ADD CONSTRAINT `secao_ibfk_3` FOREIGN KEY (`id_tatuagem`) REFERENCES `tatuagem` (`id_tatuagem`);

--
-- Restrições para a tabela `tatuagem`
--
ALTER TABLE `tatuagem`
  ADD CONSTRAINT `tatuagem_ibfk_1` FOREIGN KEY (`cnpj`) REFERENCES `fenix_tattoo` (`cnpj`);

--
-- Restrições para a tabela `telefone_cliente`
--
ALTER TABLE `telefone_cliente`
  ADD CONSTRAINT `telefone_cliente_ibfk_1` FOREIGN KEY (`id_cliente`) REFERENCES `cliente` (`id_cliente`);

--
-- Restrições para a tabela `telefone_funcionario`
--
ALTER TABLE `telefone_funcionario`
  ADD CONSTRAINT `telefone_funcionario_ibfk_1` FOREIGN KEY (`id_funcionario`) REFERENCES `funcionario` (`id_funcionario`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
