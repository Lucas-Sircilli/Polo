
--
-- Database: `funvildevendas`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(220) NOT NULL,
  `email` varchar(520) NOT NULL,
  `senha` varchar(50) NOT NULL,
  `situacoe_id` int(11) NOT NULL DEFAULT '0',
  `niveis_acesso_id` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `nome`, `email`, `senha`, `situacoe_id`, `niveis_acesso_id`, `created`, `modified`) VALUES
(1, 'Administrativo', 'mrs@sta.com.br', '202cb962ac59075b964b07152d234b70', 1, 1, '2020-02-14 00:00:01', '2020-02-20 21:58:01')


-- --------------------------------------------------------

--
-- Estrutura da tabela `niveis_acessos`
--

CREATE TABLE IF NOT EXISTS `niveis_acessos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Extraindo dados da tabela `niveis_acessos`
--

INSERT INTO `niveis_acessos` (`id`, `nome`, `created`, `modified`) VALUES
(1, 'Administrador', '2016-02-19 00:00:00', NULL),
(2, 'Colaborador', '2016-02-19 00:00:00', NULL),
(3, 'Cliente', '2016-02-19 00:00:00', NULL);

-- --------------------------------------------------------


CREATE TABLE IF NOT EXISTS `configuracoes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `servidor_ftps` varchar(520) NOT NULL,
  `usuario_ftps` varchar(520) NOT NULL,
  `senha_ftps` varchar(50) NOT NULL,
  `pasta_ftps` varchar(520) NOT NULL,
  `BalPorta` varchar(10) NOT NULL,
  `BalBaudrate` varchar(10) NOT NULL,
  `BalParidade` varchar(10) NOT NULL,
  `BalStopbits` varchar(10) NOT NULL,
  `BalDatabits` varchar(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1;


CREATE TABLE IF NOT EXISTS `calibracao` (
id int(11)  AUTO_INCREMENT,
CodigoBalanca varchar(200)  
,QtdSensores int(2)  DEFAULT 0
,MaxDrift decimal(18,10)  DEFAULT  '0.00'
,MultPeso decimal(18,10)  DEFAULT  '0.00'
,MultVelocidade decimal(18,10)  DEFAULT  '0.00'
,DistSensores decimal(18,10)  DEFAULT  '0.00'
,S1ETonE1 decimal(18,10)  DEFAULT  '0.00'
,S1ELsbE1 decimal(18,10)  DEFAULT  '0.00'
,S1ETonD1 decimal(18,10)  DEFAULT  '0.00'
,S1ELsbD1 decimal(18,10)  DEFAULT  '0.00'
,S1DTonE1 decimal(18,10)  DEFAULT  '0.00'
,S1DLsbE1 decimal(18,10)  DEFAULT  '0.00'
,S1DTonD1 decimal(18,10)  DEFAULT  '0.00'
,S1DLsbD1 decimal(18,10)  DEFAULT  '0.00'
,S1ETonE2 decimal(18,10)  DEFAULT  '0.00'
,S1ELsbE2 decimal(18,10)  DEFAULT  '0.00'
,S1ETonD2 decimal(18,10)  DEFAULT  '0.00'
,S1ELsbD2 decimal(18,10)  DEFAULT  '0.00'
,S1DTonE2 decimal(18,10)  DEFAULT  '0.00'
,S1DLsbE2 decimal(18,10)  DEFAULT  '0.00'
,S1DTonD2 decimal(18,10)  DEFAULT  '0.00'
,S1DLsbD2 decimal(18,10)  DEFAULT  '0.00'
,S1ETonE3 decimal(18,10)  DEFAULT  '0.00'
,S1ELsbE3 decimal(18,10)  DEFAULT  '0.00'
,S1ETonD3 decimal(18,10)  DEFAULT  '0.00'
,S1ELsbD3 decimal(18,10)  DEFAULT  '0.00'
,S1DTonE3 decimal(18,10)  DEFAULT  '0.00'
,S1DLsbE3 decimal(18,10)  DEFAULT  '0.00'
,S1DTonD3 decimal(18,10)  DEFAULT  '0.00'
,S1DLsbD3 decimal(18,10)  DEFAULT  '0.00'
,S1ETonE4 decimal(18,10)  DEFAULT  '0.00'
,S1ELsbE4 decimal(18,10)  DEFAULT  '0.00'
,S1ETonD4 decimal(18,10)  DEFAULT  '0.00'
,S1ELsbD4 decimal(18,10)  DEFAULT  '0.00'
,S1DTonE4 decimal(18,10)  DEFAULT  '0.00'
,S1DLsbE4 decimal(18,10)  DEFAULT  '0.00'
,S1DTonD4 decimal(18,10)  DEFAULT  '0.00'
,S1DLsbD4 decimal(18,10)  DEFAULT  '0.00'
,S1TriggerInicial decimal(18,10)  DEFAULT  '0.00'
,S1TriggerFinal decimal(18,10)  DEFAULT  '0.00'
,S2ETonE1 decimal(18,10)  DEFAULT  '0.00'
,S2ELsbE1 decimal(18,10)  DEFAULT  '0.00'
,S2ETonD1 decimal(18,10)  DEFAULT  '0.00'
,S2ELsbD1 decimal(18,10)  DEFAULT  '0.00'
,S2DTonE1 decimal(18,10)  DEFAULT  '0.00'
,S2DLsbE1 decimal(18,10)  DEFAULT  '0.00'
,S2DTonD1 decimal(18,10)  DEFAULT  '0.00'
,S2DLsbD1 decimal(18,10)  DEFAULT  '0.00'
,S2ETonE2 decimal(18,10)  DEFAULT  '0.00'
,S2ELsbE2 decimal(18,10)  DEFAULT  '0.00'
,S2ETonD2 decimal(18,10)  DEFAULT  '0.00'
,S2ELsbD2 decimal(18,10)  DEFAULT  '0.00'
,S2DTonE2 decimal(18,10)  DEFAULT  '0.00'
,S2DLsbE2 decimal(18,10)  DEFAULT  '0.00'
,S2DTonD2 decimal(18,10)  DEFAULT  '0.00'
,S2DLsbD2 decimal(18,10)  DEFAULT  '0.00'
,S2ETonE3 decimal(18,10)  DEFAULT  '0.00'
,S2ELsbE3 decimal(18,10)  DEFAULT  '0.00'
,S2ETonD3 decimal(18,10)  DEFAULT  '0.00'
,S2ELsbD3 decimal(18,10)  DEFAULT  '0.00'
,S2DTonE3 decimal(18,10)  DEFAULT  '0.00'
,S2DLsbE3 decimal(18,10)  DEFAULT  '0.00'
,S2DTonD3 decimal(18,10)  DEFAULT  '0.00'
,S2DLsbD3 decimal(18,10)  DEFAULT  '0.00'
,S2ETonE4 decimal(18,10)  DEFAULT  '0.00'
,S2ELsbE4 decimal(18,10)  DEFAULT  '0.00'
,S2ETonD4 decimal(18,10)  DEFAULT  '0.00'
,S2ELsbD4 decimal(18,10)  DEFAULT  '0.00'
,S2DTonE4 decimal(18,10)  DEFAULT  '0.00'
,S2DLsbE4 decimal(18,10)  DEFAULT  '0.00'
,S2DTonD4 decimal(18,10)  DEFAULT  '0.00'
,S2DLsbD4 decimal(18,10)  DEFAULT  '0.00'
,S2TriggerInicial decimal(18,10)  DEFAULT  '0.00'
,S2TriggerFinal decimal(18,10)  DEFAULT  '0.00'
,S3ETonE1 decimal(18,10)  DEFAULT  '0.00'
,S3ELsbE1 decimal(18,10)  DEFAULT  '0.00'
,S3ETonD1 decimal(18,10)  DEFAULT  '0.00'
,S3ELsbD1 decimal(18,10)  DEFAULT  '0.00'
,S3DTonE1 decimal(18,10)  DEFAULT  '0.00'
,S3DLsbE1 decimal(18,10)  DEFAULT  '0.00'
,S3DTonD1 decimal(18,10)  DEFAULT  '0.00'
,S3DLsbD1 decimal(18,10)  DEFAULT  '0.00'
,S3ETonE2 decimal(18,10)  DEFAULT  '0.00'
,S3ELsbE2 decimal(18,10)  DEFAULT  '0.00'
,S3ETonD2 decimal(18,10)  DEFAULT  '0.00'
,S3ELsbD2 decimal(18,10)  DEFAULT  '0.00'
,S3DTonE2 decimal(18,10)  DEFAULT  '0.00'
,S3DLsbE2 decimal(18,10)  DEFAULT  '0.00'
,S3DTonD2 decimal(18,10)  DEFAULT  '0.00'
,S3DLsbD2 decimal(18,10)  DEFAULT  '0.00'
,S3ETonE3 decimal(18,10)  DEFAULT  '0.00'
,S3ELsbE3 decimal(18,10)  DEFAULT  '0.00'
,S3ETonD3 decimal(18,10)  DEFAULT  '0.00'
,S3ELsbD3 decimal(18,10)  DEFAULT  '0.00'
,S3DTonE3 decimal(18,10)  DEFAULT  '0.00'
,S3DLsbE3 decimal(18,10)  DEFAULT  '0.00'
,S3DTonD3 decimal(18,10)  DEFAULT  '0.00'
,S3DLsbD3 decimal(18,10)  DEFAULT  '0.00'
,S3ETonE4 decimal(18,10)  DEFAULT  '0.00'
,S3ELsbE4 decimal(18,10)  DEFAULT  '0.00'
,S3ETonD4 decimal(18,10)  DEFAULT  '0.00'
,S3ELsbD4 decimal(18,10)  DEFAULT  '0.00'
,S3DTonE4 decimal(18,10)  DEFAULT  '0.00'
,S3DLsbE4 decimal(18,10)  DEFAULT  '0.00'
,S3DTonD4 decimal(18,10)  DEFAULT  '0.00'
,S3DLsbD4 decimal(18,10)  DEFAULT  '0.00'
,S3TriggerInicial decimal(18,10)  DEFAULT  '0.00'
,S3TriggerFinal decimal(18,10)  DEFAULT  '0.00'
,S4ETonE1 decimal(18,10)  DEFAULT  '0.00'
,S4ELsbE1 decimal(18,10)  DEFAULT  '0.00'
,S4ETonD1 decimal(18,10)  DEFAULT  '0.00'
,S4ELsbD1 decimal(18,10)  DEFAULT  '0.00'
,S4DTonE1 decimal(18,10)  DEFAULT  '0.00'
,S4DLsbE1 decimal(18,10)  DEFAULT  '0.00'
,S4DTonD1 decimal(18,10)  DEFAULT  '0.00'
,S4DLsbD1 decimal(18,10)  DEFAULT  '0.00'
,S4ETonE2 decimal(18,10)  DEFAULT  '0.00'
,S4ELsbE2 decimal(18,10)  DEFAULT  '0.00'
,S4ETonD2 decimal(18,10)  DEFAULT  '0.00'
,S4ELsbD2 decimal(18,10)  DEFAULT  '0.00'
,S4DTonE2 decimal(18,10)  DEFAULT  '0.00'
,S4DLsbE2 decimal(18,10)  DEFAULT  '0.00'
,S4DTonD2 decimal(18,10)  DEFAULT  '0.00'
,S4DLsbD2 decimal(18,10)  DEFAULT  '0.00'
,S4ETonE3 decimal(18,10)  DEFAULT  '0.00'
,S4ELsbE3 decimal(18,10)  DEFAULT  '0.00'
,S4ETonD3 decimal(18,10)  DEFAULT  '0.00'
,S4ELsbD3 decimal(18,10)  DEFAULT  '0.00'
,S4DTonE3 decimal(18,10)  DEFAULT  '0.00'
,S4DLsbE3 decimal(18,10)  DEFAULT  '0.00'
,S4DTonD3 decimal(18,10)  DEFAULT  '0.00'
,S4DLsbD3 decimal(18,10)  DEFAULT  '0.00'
,S4ETonE4 decimal(18,10)  DEFAULT  '0.00'
,S4ELsbE4 decimal(18,10)  DEFAULT  '0.00'
,S4ETonD4 decimal(18,10)  DEFAULT  '0.00'
,S4ELsbD4 decimal(18,10)  DEFAULT  '0.00'
,S4DTonE4 decimal(18,10)  DEFAULT  '0.00'
,S4DLsbE4 decimal(18,10)  DEFAULT  '0.00'
,S4DTonD4 decimal(18,10)  DEFAULT  '0.00'
,S4DLsbD4 decimal(18,10)  DEFAULT  '0.00'
,S4TriggerInicial decimal(18,10)  DEFAULT  '0.00'
,S4TriggerFinal decimal(18,10)  DEFAULT  '0.00'
,S5ETonE1 decimal(18,10)  DEFAULT  '0.00'
,S5ELsbE1 decimal(18,10)  DEFAULT  '0.00'
,S5ETonD1 decimal(18,10)  DEFAULT  '0.00'
,S5ELsbD1 decimal(18,10)  DEFAULT  '0.00'
,S5DTonE1 decimal(18,10)  DEFAULT  '0.00'
,S5DLsbE1 decimal(18,10)  DEFAULT  '0.00'
,S5DTonD1 decimal(18,10)  DEFAULT  '0.00'
,S5DLsbD1 decimal(18,10)  DEFAULT  '0.00'
,S5ETonE2 decimal(18,10)  DEFAULT  '0.00'
,S5ELsbE2 decimal(18,10)  DEFAULT  '0.00'
,S5ETonD2 decimal(18,10)  DEFAULT  '0.00'
,S5ELsbD2 decimal(18,10)  DEFAULT  '0.00'
,S5DTonE2 decimal(18,10)  DEFAULT  '0.00'
,S5DLsbE2 decimal(18,10)  DEFAULT  '0.00'
,S5DTonD2 decimal(18,10)  DEFAULT  '0.00'
,S5DLsbD2 decimal(18,10)  DEFAULT  '0.00'
,S5ETonE3 decimal(18,10)  DEFAULT  '0.00'
,S5ELsbE3 decimal(18,10)  DEFAULT  '0.00'
,S5ETonD3 decimal(18,10)  DEFAULT  '0.00'
,S5ELsbD3 decimal(18,10)  DEFAULT  '0.00'
,S5DTonE3 decimal(18,10)  DEFAULT  '0.00'
,S5DLsbE3 decimal(18,10)  DEFAULT  '0.00'
,S5DTonD3 decimal(18,10)  DEFAULT  '0.00'
,S5DLsbD3 decimal(18,10)  DEFAULT  '0.00'
,S5ETonE4 decimal(18,10)  DEFAULT  '0.00'
,S5ELsbE4 decimal(18,10)  DEFAULT  '0.00'
,S5ETonD4 decimal(18,10)  DEFAULT  '0.00'
,S5ELsbD4 decimal(18,10)  DEFAULT  '0.00'
,S5DTonE4 decimal(18,10)  DEFAULT  '0.00'
,S5DLsbE4 decimal(18,10)  DEFAULT  '0.00'
,S5DTonD4 decimal(18,10)  DEFAULT  '0.00'
,S5DLsbD4 decimal(18,10)  DEFAULT  '0.00'
,S5TriggerInicial decimal(18,10)  DEFAULT  '0.00'
,S5TriggerFinal decimal(18,10)  DEFAULT  '0.00'
,S6ETonE1 decimal(18,10)  DEFAULT  '0.00'
,S6ELsbE1 decimal(18,10)  DEFAULT  '0.00'
,S6ETonD1 decimal(18,10)  DEFAULT  '0.00'
,S6ELsbD1 decimal(18,10)  DEFAULT  '0.00'
,S6DTonE1 decimal(18,10)  DEFAULT  '0.00'
,S6DLsbE1 decimal(18,10)  DEFAULT  '0.00'
,S6DTonD1 decimal(18,10)  DEFAULT  '0.00'
,S6DLsbD1 decimal(18,10)  DEFAULT  '0.00'
,S6ETonE2 decimal(18,10)  DEFAULT  '0.00'
,S6ELsbE2 decimal(18,10)  DEFAULT  '0.00'
,S6ETonD2 decimal(18,10)  DEFAULT  '0.00'
,S6ELsbD2 decimal(18,10)  DEFAULT  '0.00'
,S6DTonE2 decimal(18,10)  DEFAULT  '0.00'
,S6DLsbE2 decimal(18,10)  DEFAULT  '0.00'
,S6DTonD2 decimal(18,10)  DEFAULT  '0.00'
,S6DLsbD2 decimal(18,10)  DEFAULT  '0.00'
,S6ETonE3 decimal(18,10)  DEFAULT  '0.00'
,S6ELsbE3 decimal(18,10)  DEFAULT  '0.00'
,S6ETonD3 decimal(18,10)  DEFAULT  '0.00'
,S6ELsbD3 decimal(18,10)  DEFAULT  '0.00'
,S6DTonE3 decimal(18,10)  DEFAULT  '0.00'
,S6DLsbE3 decimal(18,10)  DEFAULT  '0.00'
,S6DTonD3 decimal(18,10)  DEFAULT  '0.00'
,S6DLsbD3 decimal(18,10)  DEFAULT  '0.00'
,S6ETonE4 decimal(18,10)  DEFAULT  '0.00'
,S6ELsbE4 decimal(18,10)  DEFAULT  '0.00'
,S6ETonD4 decimal(18,10)  DEFAULT  '0.00'
,S6ELsbD4 decimal(18,10)  DEFAULT  '0.00'
,S6DTonE4 decimal(18,10)  DEFAULT  '0.00'
,S6DLsbE4 decimal(18,10)  DEFAULT  '0.00'
,S6DTonD4 decimal(18,10)  DEFAULT  '0.00'
,S6DLsbD4 decimal(18,10)  DEFAULT  '0.00'
,S6TriggerInicial decimal(18,10)  DEFAULT  '0.00'
,S6TriggerFinal decimal(18,10)  DEFAULT  '0.00'
,S7ETonE1 decimal(18,10)  DEFAULT  '0.00'
,S7ELsbE1 decimal(18,10)  DEFAULT  '0.00'
,S7ETonD1 decimal(18,10)  DEFAULT  '0.00'
,S7ELsbD1 decimal(18,10)  DEFAULT  '0.00'
,S7DTonE1 decimal(18,10)  DEFAULT  '0.00'
,S7DLsbE1 decimal(18,10)  DEFAULT  '0.00'
,S7DTonD1 decimal(18,10)  DEFAULT  '0.00'
,S7DLsbD1 decimal(18,10)  DEFAULT  '0.00'
,S7ETonE2 decimal(18,10)  DEFAULT  '0.00'
,S7ELsbE2 decimal(18,10)  DEFAULT  '0.00'
,S7ETonD2 decimal(18,10)  DEFAULT  '0.00'
,S7ELsbD2 decimal(18,10)  DEFAULT  '0.00'
,S7DTonE2 decimal(18,10)  DEFAULT  '0.00'
,S7DLsbE2 decimal(18,10)  DEFAULT  '0.00'
,S7DTonD2 decimal(18,10)  DEFAULT  '0.00'
,S7DLsbD2 decimal(18,10)  DEFAULT  '0.00'
,S7ETonE3 decimal(18,10)  DEFAULT  '0.00'
,S7ELsbE3 decimal(18,10)  DEFAULT  '0.00'
,S7ETonD3 decimal(18,10)  DEFAULT  '0.00'
,S7ELsbD3 decimal(18,10)  DEFAULT  '0.00'
,S7DTonE3 decimal(18,10)  DEFAULT  '0.00'
,S7DLsbE3 decimal(18,10)  DEFAULT  '0.00'
,S7DTonD3 decimal(18,10)  DEFAULT  '0.00'
,S7DLsbD3 decimal(18,10)  DEFAULT  '0.00'
,S7ETonE4 decimal(18,10)  DEFAULT  '0.00'
,S7ELsbE4 decimal(18,10)  DEFAULT  '0.00'
,S7ETonD4 decimal(18,10)  DEFAULT  '0.00'
,S7ELsbD4 decimal(18,10)  DEFAULT  '0.00'
,S7DTonE4 decimal(18,10)  DEFAULT  '0.00'
,S7DLsbE4 decimal(18,10)  DEFAULT  '0.00'
,S7DTonD4 decimal(18,10)  DEFAULT  '0.00'
,S7DLsbD4 decimal(18,10)  DEFAULT  '0.00'
,S7TriggerInicial decimal(18,10)  DEFAULT  '0.00'
,S7TriggerFinal decimal(18,10)  DEFAULT  '0.00'
,S8ETonE1 decimal(18,10)  DEFAULT  '0.00'
,S8ELsbE1 decimal(18,10)  DEFAULT  '0.00'
,S8ETonD1 decimal(18,10)  DEFAULT  '0.00'
,S8ELsbD1 decimal(18,10)  DEFAULT  '0.00'
,S8DTonE1 decimal(18,10)  DEFAULT  '0.00'
,S8DLsbE1 decimal(18,10)  DEFAULT  '0.00'
,S8DTonD1 decimal(18,10)  DEFAULT  '0.00'
,S8DLsbD1 decimal(18,10)  DEFAULT  '0.00'
,S8ETonE2 decimal(18,10)  DEFAULT  '0.00'
,S8ELsbE2 decimal(18,10)  DEFAULT  '0.00'
,S8ETonD2 decimal(18,10)  DEFAULT  '0.00'
,S8ELsbD2 decimal(18,10)  DEFAULT  '0.00'
,S8DTonE2 decimal(18,10)  DEFAULT  '0.00'
,S8DLsbE2 decimal(18,10)  DEFAULT  '0.00'
,S8DTonD2 decimal(18,10)  DEFAULT  '0.00'
,S8DLsbD2 decimal(18,10)  DEFAULT  '0.00'
,S8ETonE3 decimal(18,10)  DEFAULT  '0.00'
,S8ELsbE3 decimal(18,10)  DEFAULT  '0.00'
,S8ETonD3 decimal(18,10)  DEFAULT  '0.00'
,S8ELsbD3 decimal(18,10)  DEFAULT  '0.00'
,S8DTonE3 decimal(18,10)  DEFAULT  '0.00'
,S8DLsbE3 decimal(18,10)  DEFAULT  '0.00'
,S8DTonD3 decimal(18,10)  DEFAULT  '0.00'
,S8DLsbD3 decimal(18,10)  DEFAULT  '0.00'
,S8ETonE4 decimal(18,10)  DEFAULT  '0.00'
,S8ELsbE4 decimal(18,10)  DEFAULT  '0.00'
,S8ETonD4 decimal(18,10)  DEFAULT  '0.00'
,S8ELsbD4 decimal(18,10)  DEFAULT  '0.00'
,S8DTonE4 decimal(18,10)  DEFAULT  '0.00'
,S8DLsbE4 decimal(18,10)  DEFAULT  '0.00'
,S8DTonD4 decimal(18,10)  DEFAULT  '0.00'
,S8DLsbD4 decimal(18,10)  DEFAULT  '0.00'
,S8TriggerInicial decimal(18,10)  DEFAULT  '0.00'
,S8TriggerFinal decimal(18,10)  DEFAULT  '0.00'
,S9ETonE1 decimal(18,10)  DEFAULT  '0.00'
,S9ELsbE1 decimal(18,10)  DEFAULT  '0.00'
,S9ETonD1 decimal(18,10)  DEFAULT  '0.00'
,S9ELsbD1 decimal(18,10)  DEFAULT  '0.00'
,S9DTonE1 decimal(18,10)  DEFAULT  '0.00'
,S9DLsbE1 decimal(18,10)  DEFAULT  '0.00'
,S9DTonD1 decimal(18,10)  DEFAULT  '0.00'
,S9DLsbD1 decimal(18,10)  DEFAULT  '0.00'
,S9ETonE2 decimal(18,10)  DEFAULT  '0.00'
,S9ELsbE2 decimal(18,10)  DEFAULT  '0.00'
,S9ETonD2 decimal(18,10)  DEFAULT  '0.00'
,S9ELsbD2 decimal(18,10)  DEFAULT  '0.00'
,S9DTonE2 decimal(18,10)  DEFAULT  '0.00'
,S9DLsbE2 decimal(18,10)  DEFAULT  '0.00'
,S9DTonD2 decimal(18,10)  DEFAULT  '0.00'
,S9DLsbD2 decimal(18,10)  DEFAULT  '0.00'
,S9ETonE3 decimal(18,10)  DEFAULT  '0.00'
,S9ELsbE3 decimal(18,10)  DEFAULT  '0.00'
,S9ETonD3 decimal(18,10)  DEFAULT  '0.00'
,S9ELsbD3 decimal(18,10)  DEFAULT  '0.00'
,S9DTonE3 decimal(18,10)  DEFAULT  '0.00'
,S9DLsbE3 decimal(18,10)  DEFAULT  '0.00'
,S9DTonD3 decimal(18,10)  DEFAULT  '0.00'
,S9DLsbD3 decimal(18,10)  DEFAULT  '0.00'
,S9ETonE4 decimal(18,10)  DEFAULT  '0.00'
,S9ELsbE4 decimal(18,10)  DEFAULT  '0.00'
,S9ETonD4 decimal(18,10)  DEFAULT  '0.00'
,S9ELsbD4 decimal(18,10)  DEFAULT  '0.00'
,S9DTonE4 decimal(18,10)  DEFAULT  '0.00'
,S9DLsbE4 decimal(18,10)  DEFAULT  '0.00'
,S9DTonD4 decimal(18,10)  DEFAULT  '0.00'
,S9DLsbD4 decimal(18,10)  DEFAULT  '0.00'
,S9TriggerInicial decimal(18,10)  DEFAULT  '0.00'
,S9TriggerFinal decimal(18,10)  DEFAULT  '0.00'
,S10ETonE1 decimal(18,10)  DEFAULT  '0.00'
,S10ELsbE1 decimal(18,10)  DEFAULT  '0.00'
,S10ETonD1 decimal(18,10)  DEFAULT  '0.00'
,S10ELsbD1 decimal(18,10)  DEFAULT  '0.00'
,S10DTonE1 decimal(18,10)  DEFAULT  '0.00'
,S10DLsbE1 decimal(18,10)  DEFAULT  '0.00'
,S10DTonD1 decimal(18,10)  DEFAULT  '0.00'
,S10DLsbD1 decimal(18,10)  DEFAULT  '0.00'
,S10ETonE2 decimal(18,10)  DEFAULT  '0.00'
,S10ELsbE2 decimal(18,10)  DEFAULT  '0.00'
,S10ETonD2 decimal(18,10)  DEFAULT  '0.00'
,S10ELsbD2 decimal(18,10)  DEFAULT  '0.00'
,S10DTonE2 decimal(18,10)  DEFAULT  '0.00'
,S10DLsbE2 decimal(18,10)  DEFAULT  '0.00'
,S10DTonD2 decimal(18,10)  DEFAULT  '0.00'
,S10DLsbD2 decimal(18,10)  DEFAULT  '0.00'
,S10ETonE3 decimal(18,10)  DEFAULT  '0.00'
,S10ELsbE3 decimal(18,10)  DEFAULT  '0.00'
,S10ETonD3 decimal(18,10)  DEFAULT  '0.00'
,S10ELsbD3 decimal(18,10)  DEFAULT  '0.00'
,S10DTonE3 decimal(18,10)  DEFAULT  '0.00'
,S10DLsbE3 decimal(18,10)  DEFAULT  '0.00'
,S10DTonD3 decimal(18,10)  DEFAULT  '0.00'
,S10DLsbD3 decimal(18,10)  DEFAULT  '0.00'
,S10ETonE4 decimal(18,10)  DEFAULT  '0.00'
,S10ELsbE4 decimal(18,10)  DEFAULT  '0.00'
,S10ETonD4 decimal(18,10)  DEFAULT  '0.00'
,S10ELsbD4 decimal(18,10)  DEFAULT  '0.00'
,S10DTonE4 decimal(18,10)  DEFAULT  '0.00'
,S10DLsbE4 decimal(18,10)  DEFAULT  '0.00'
,S10DTonD4 decimal(18,10)  DEFAULT  '0.00'
,S10DLsbD4 decimal(18,10)  DEFAULT  '0.00'
,S10TriggerInicial decimal(18,10)  DEFAULT  '0.00'
,S10TriggerFinal decimal(18,10)  DEFAULT  '0.00'
,S11ETonE1 decimal(18,10)  DEFAULT  '0.00'
,S11ELsbE1 decimal(18,10)  DEFAULT  '0.00'
,S11ETonD1 decimal(18,10)  DEFAULT  '0.00'
,S11ELsbD1 decimal(18,10)  DEFAULT  '0.00'
,S11DTonE1 decimal(18,10)  DEFAULT  '0.00'
,S11DLsbE1 decimal(18,10)  DEFAULT  '0.00'
,S11DTonD1 decimal(18,10)  DEFAULT  '0.00'
,S11DLsbD1 decimal(18,10)  DEFAULT  '0.00'
,S11ETonE2 decimal(18,10)  DEFAULT  '0.00'
,S11ELsbE2 decimal(18,10)  DEFAULT  '0.00'
,S11ETonD2 decimal(18,10)  DEFAULT  '0.00'
,S11ELsbD2 decimal(18,10)  DEFAULT  '0.00'
,S11DTonE2 decimal(18,10)  DEFAULT  '0.00'
,S11DLsbE2 decimal(18,10)  DEFAULT  '0.00'
,S11DTonD2 decimal(18,10)  DEFAULT  '0.00'
,S11DLsbD2 decimal(18,10)  DEFAULT  '0.00'
,S11ETonE3 decimal(18,10)  DEFAULT  '0.00'
,S11ELsbE3 decimal(18,10)  DEFAULT  '0.00'
,S11ETonD3 decimal(18,10)  DEFAULT  '0.00'
,S11ELsbD3 decimal(18,10)  DEFAULT  '0.00'
,S11DTonE3 decimal(18,10)  DEFAULT  '0.00'
,S11DLsbE3 decimal(18,10)  DEFAULT  '0.00'
,S11DTonD3 decimal(18,10)  DEFAULT  '0.00'
,S11DLsbD3 decimal(18,10)  DEFAULT  '0.00'
,S11ETonE4 decimal(18,10)  DEFAULT  '0.00'
,S11ELsbE4 decimal(18,10)  DEFAULT  '0.00'
,S11ETonD4 decimal(18,10)  DEFAULT  '0.00'
,S11ELsbD4 decimal(18,10)  DEFAULT  '0.00'
,S11DTonE4 decimal(18,10)  DEFAULT  '0.00'
,S11DLsbE4 decimal(18,10)  DEFAULT  '0.00'
,S11DTonD4 decimal(18,10)  DEFAULT  '0.00'
,S11DLsbD4 decimal(18,10)  DEFAULT  '0.00'
,S11TriggerInicial decimal(18,10)  DEFAULT  '0.00'
,S11TriggerFinal decimal(18,10)  DEFAULT  '0.00'
,S12ETonE1 decimal(18,10)  DEFAULT  '0.00'
,S12ELsbE1 decimal(18,10)  DEFAULT  '0.00'
,S12ETonD1 decimal(18,10)  DEFAULT  '0.00'
,S12ELsbD1 decimal(18,10)  DEFAULT  '0.00'
,S12DTonE1 decimal(18,10)  DEFAULT  '0.00'
,S12DLsbE1 decimal(18,10)  DEFAULT  '0.00'
,S12DTonD1 decimal(18,10)  DEFAULT  '0.00'
,S12DLsbD1 decimal(18,10)  DEFAULT  '0.00'
,S12ETonE2 decimal(18,10)  DEFAULT  '0.00'
,S12ELsbE2 decimal(18,10)  DEFAULT  '0.00'
,S12ETonD2 decimal(18,10)  DEFAULT  '0.00'
,S12ELsbD2 decimal(18,10)  DEFAULT  '0.00'
,S12DTonE2 decimal(18,10)  DEFAULT  '0.00'
,S12DLsbE2 decimal(18,10)  DEFAULT  '0.00'
,S12DTonD2 decimal(18,10)  DEFAULT  '0.00'
,S12DLsbD2 decimal(18,10)  DEFAULT  '0.00'
,S12ETonE3 decimal(18,10)  DEFAULT  '0.00'
,S12ELsbE3 decimal(18,10)  DEFAULT  '0.00'
,S12ETonD3 decimal(18,10)  DEFAULT  '0.00'
,S12ELsbD3 decimal(18,10)  DEFAULT  '0.00'
,S12DTonE3 decimal(18,10)  DEFAULT  '0.00'
,S12DLsbE3 decimal(18,10)  DEFAULT  '0.00'
,S12DTonD3 decimal(18,10)  DEFAULT  '0.00'
,S12DLsbD3 decimal(18,10)  DEFAULT  '0.00'
,S12ETonE4 decimal(18,10)  DEFAULT  '0.00'
,S12ELsbE4 decimal(18,10)  DEFAULT  '0.00'
,S12ETonD4 decimal(18,10)  DEFAULT  '0.00'
,S12ELsbD4 decimal(18,10)  DEFAULT  '0.00'
,S12DTonE4 decimal(18,10)  DEFAULT  '0.00'
,S12DLsbE4 decimal(18,10)  DEFAULT  '0.00'
,S12DTonD4 decimal(18,10)  DEFAULT  '0.00'
,S12DLsbD4 decimal(18,10)  DEFAULT  '0.00'
,S12TriggerInicial decimal(18,10)  DEFAULT  '0.00'
,S12TriggerFinal decimal(18,10)  DEFAULT  '0.00'
,S1Habilitado int(1)  DEFAULT 1
,S2Habilitado int(1)  DEFAULT 1
,S3Habilitado int(1)  DEFAULT 1
,S4Habilitado int(1)  DEFAULT 1
,S5Habilitado int(1)  DEFAULT 1
,S6Habilitado int(1)  DEFAULT 1
,S7Habilitado int(1)  DEFAULT 1
,S8Habilitado int(1)  DEFAULT 1
,S9Habilitado int(1)  DEFAULT 1
,S10Habilitado int(1)  DEFAULT 1
,S11Habilitado int(1)  DEFAULT 1
,S12Habilitado int(1)  DEFAULT 1
,PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=0;


INSERT INTO `calibracao` (CodigoBalanca,QtdSensores,MaxDrift,MultPeso,MultVelocidade,DistSensores
,S1ETonE1,S1ELsbE1,S1ETonD1,S1ELsbD1,S1DTonE1,S1DLsbE1,S1DTonD1,S1DLsbD1,S1ETonE2,S1ELsbE2,S1ETonD2
,S1ELsbD2,S1DTonE2,S1DLsbE2,S1DTonD2,S1DLsbD2,S1ETonE3,S1ELsbE3,S1ETonD3,S1ELsbD3,S1DTonE3,S1DLsbE3
,S1DTonD3,S1DLsbD3,S1ETonE4,S1ELsbE4,S1ETonD4,S1ELsbD4,S1DTonE4,S1DLsbE4,S1DTonD4,S1DLsbD4,S1TriggerInicial,S1TriggerFinal
,S2ETonE1,S2ELsbE1,S2ETonD1,S2ELsbD1,S2DTonE1,S2DLsbE1,S2DTonD1,S2DLsbD1,S2ETonE2,S2ELsbE2,S2ETonD2
,S2ELsbD2,S2DTonE2,S2DLsbE2,S2DTonD2,S2DLsbD2,S2ETonE3,S2ELsbE3,S2ETonD3,S2ELsbD3,S2DTonE3,S2DLsbE3
,S2DTonD3,S2DLsbD3,S2ETonE4,S2ELsbE4,S2ETonD4,S2ELsbD4,S2DTonE4,S2DLsbE4,S2DTonD4,S2DLsbD4,S21TriggerInicial,S2TriggerFinal
,S3ETonE1,S3ELsbE1,S3ETonD1,S3ELsbD1,S3DTonE1,S3DLsbE1,S3DTonD1,S3DLsbD1,S3ETonE2,S3ELsbE2,S3ETonD2
,S3ELsbD2,S3DTonE2,S3DLsbE2,S3DTonD2,S3DLsbD2,S3ETonE3,S3ELsbE3,S3ETonD3,S3ELsbD3,S3DTonE3,S3DLsbE3
,S3DTonD3,S3DLsbD3,S3ETonE4,S3ELsbE4,S3ETonD4,S3ELsbD4,S3DTonE4,S3DLsbE4,S3DTonD4,S3DLsbD4,S3TriggerInicial,S3TriggerFinal
,S4ETonE1,S4ELsbE1,S4ETonD1,S4ELsbD1,S4DTonE1,S4DLsbE1,S4DTonD1,S4DLsbD1,S4ETonE2,S4ELsbE2,S4ETonD2
,S4ELsbD2,S4DTonE2,S4DLsbE2,S4DTonD2,S4DLsbD2,S4ETonE3,S4ELsbE3,S4ETonD3,S4ELsbD3,S4DTonE3,S4DLsbE3
,S4DTonD3,S4DLsbD3,S4ETonE4,S4ELsbE4,S4ETonD4,S4ELsbD4,S4DTonE4,S4DLsbE4,S4DTonD4,S4DLsbD4,S4TriggerInicial,S4TriggerFinal
,S5ETonE1,S5ELsbE1,S5ETonD1,S5ELsbD1,S5DTonE1,S5DLsbE1,S5DTonD1,S5DLsbD1,S5ETonE2,S5ELsbE2,S5ETonD2
,S5ELsbD2,S5DTonE2,S5DLsbE2,S5DTonD2,S5DLsbD2,S5ETonE3,S5ELsbE3,S5ETonD3,S5ELsbD3,S5DTonE3,S5DLsbE3
,S5DTonD3,S5DLsbD3,S5ETonE4,S5ELsbE4,S5ETonD4,S5ELsbD4,S5DTonE4,S5DLsbE4,S5DTonD4,S5DLsbD4,S5TriggerInicial,S5TriggerFinal
,S6ETonE1,S6ELsbE1,S6ETonD1,S6ELsbD1,S6DTonE1,S6DLsbE1,S6DTonD1,S6DLsbD1,S6ETonE2,S6ELsbE2,S6ETonD2
,S6ELsbD2,S6DTonE2,S6DLsbE2,S6DTonD2,S6DLsbD2,S6ETonE3,S6ELsbE3,S6ETonD3,S6ELsbD3,S6DTonE3,S6DLsbE3
,S6DTonD3,S6DLsbD3,S6ETonE4,S6ELsbE4,S6ETonD4,S6ELsbD4,S6DTonE4,S6DLsbE4,S6DTonD4,S6DLsbD4,S6TriggerInicial,S6TriggerFinal
,S7ETonE1,S7ELsbE1,S7ETonD1,S7ELsbD1,S7DTonE1,S7DLsbE1,S7DTonD1,S7DLsbD1,S7ETonE2,S7ELsbE2,S7ETonD2
,S7ELsbD2,S7DTonE2,S7DLsbE2,S7DTonD2,S7DLsbD2,S7ETonE3,S7ELsbE3,S7ETonD3,S7ELsbD3,S7DTonE3,S7DLsbE3
,S7DTonD3,S7DLsbD3,S7ETonE4,S7ELsbE4,S7ETonD4,S7ELsbD4,S7DTonE4,S7DLsbE4,S7DTonD4,S7DLsbD4,S7TriggerInicial,S7TriggerFinal
,S8ETonE1,S8ELsbE1,S8ETonD1,S8ELsbD1,S8DTonE1,S8DLsbE1,S8DTonD1,S8DLsbD1,S8ETonE2,S8ELsbE2,S8ETonD2
,S8ELsbD2,S8DTonE2,S8DLsbE2,S8DTonD2,S8DLsbD2,S8ETonE3,S8ELsbE3,S8ETonD3,S8ELsbD3,S8DTonE3,S8DLsbE3
,S8DTonD3,S8DLsbD3,S8ETonE4,S8ELsbE4,S8ETonD4,S8ELsbD4,S8DTonE4,S8DLsbE4,S8DTonD4,S8DLsbD4,S8TriggerInicial,S8TriggerFinal
,S9ETonE1,S9ELsbE1,S9ETonD1,S9ELsbD1,S9DTonE1,S9DLsbE1,S9DTonD1,S9DLsbD1,S9ETonE2,S9ELsbE2,S9ETonD2
,S9ELsbD2,S9DTonE2,S9DLsbE2,S9DTonD2,S9DLsbD2,S9ETonE3,S9ELsbE3,S9ETonD3,S9ELsbD3,S9DTonE3,S9DLsbE3
,S9DTonD3,S9DLsbD3,S9ETonE4,S9ELsbE4,S9ETonD4,S9ELsbD4,S9DTonE4,S9DLsbE4,S9DTonD4,S9DLsbD4,S9TriggerInicial,S9TriggerFinal
,S10ETonE1,S10ELsbE1,S10ETonD1,S10ELsbD1,S10DTonE1,S10DLsbE1,S10DTonD1,S10DLsbD1,S10ETonE2,S10ELsbE2
,S10ETonD2,S10ELsbD2,S10DTonE2,S10DLsbE2,S10DTonD2,S10DLsbD2,S10ETonE3,S10ELsbE3,S10ETonD3,S10ELsbD3
,S10DTonE3,S10DLsbE3,S10DTonD3,S10DLsbD3,S10ETonE4,S10ELsbE4,S10ETonD4,S10ELsbD4,S10DTonE4,S10DLsbE4
,S10DTonD4,S10DLsbD4,S10TriggerInicial,S10TriggerFinal,S11ETonE1,S11ELsbE1,S11ETonD1,S11ELsbD1,S11DTonE1
,S11DLsbE1,S11DTonD1,S11DLsbD1,S11ETonE2,S11ELsbE2,S11ETonD2,S11ELsbD2,S11DTonE2,S11DLsbE2,S11DTonD2,S11DLsbD2
,S11ETonE3,S11ELsbE3,S11ETonD3,S11ELsbD3,S11DTonE3,S11DLsbE3,S11DTonD3,S11DLsbD3,S11ETonE4,S11ELsbE4,S11ETonD4
,S11ELsbD4,S11DTonE4,S11DLsbE4,S11DTonD4,S11DLsbD4,S11TriggerInicial,S11TriggerFinal,S12ETonE1,S12ELsbE1,S12ETonD1
,S12ELsbD1,S12DTonE1,S12DLsbE1,S12DTonD1,S12DLsbD1,S12ETonE2,S12ELsbE2,S12ETonD2,S12ELsbD2,S12DTonE2,S12DLsbE2
,S12DTonD2,S12DLsbD2,S12ETonE3,S12ELsbE3,S12ETonD3,S12ELsbD3,S12DTonE3,S12DLsbE3,S12DTonD3,S12DLsbD3
,S12ETonE4,S12ELsbE4,S12ETonD4,S12ELsbD4,S12DTonE4,S12DLsbE4,S12DTonD4,S12DLsbD4,S12TriggerInicial
,S12TriggerFinal) 
VALUES (
?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,
?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,
?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,
?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,
?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,
?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,
?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,
?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,
?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,
?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,
?,?,?,?,?,?,?,?,?,?,?,?,?,?,?
)

$CodigoBalanca,$QtdSensores,$MaxDrift,$MultPeso,$MultVelocidade,$DistSensores
,$S1ETonE1,$S1ELsbE1,$S1ETonD1,$S1ELsbD1,$S1DTonE1,$S1DLsbE1,$S1DTonD1,$S1DLsbD1,$S1ETonE2,$S1ELsbE2,$S1ETonD2
,$S1ELsbD2,$S1DTonE2,$S1DLsbE2,$S1DTonD2,$S1DLsbD2,$S1ETonE3,$S1ELsbE3,$S1ETonD3,$S1ELsbD3,$S1DTonE3,$S1DLsbE3
,$S1DTonD3,$S1DLsbD3,$S1ETonE4,$S1ELsbE4,$S1ETonD4,$S1ELsbD4,$S1DTonE4,$S1DLsbE4,$S1DTonD4,$S1DLsbD4,$S1TriggerInicial,$S1TriggerFinal
,$S2ETonE1,$S2ELsbE1,$S2ETonD1,$S2ELsbD1,$S2DTonE1,$S2DLsbE1,$S2DTonD1,$S2DLsbD1,$S2ETonE2,$S2ELsbE2,$S2ETonD2
,$S2ELsbD2,$S2DTonE2,$S2DLsbE2,$S2DTonD2,$S2DLsbD2,$S2ETonE3,$S2ELsbE3,$S2ETonD3,$S2ELsbD3,$S2DTonE3,$S2DLsbE3
,$S2DTonD3,$S2DLsbD3,$S2ETonE4,$S2ELsbE4,$S2ETonD4,$S2ELsbD4,$S2DTonE4,$S2DLsbE4,$S2DTonD4,$S2DLsbD4,$S21TriggerInicial,$S2TriggerFinal
,$S3ETonE1,$S3ELsbE1,$S3ETonD1,$S3ELsbD1,$S3DTonE1,$S3DLsbE1,$S3DTonD1,$S3DLsbD1,$S3ETonE2,$S3ELsbE2,$S3ETonD2
,$S3ELsbD2,$S3DTonE2,$S3DLsbE2,$S3DTonD2,$S3DLsbD2,$S3ETonE3,$S3ELsbE3,$S3ETonD3,$S3ELsbD3,$S3DTonE3,$S3DLsbE3
,$S3DTonD3,$S3DLsbD3,$S3ETonE4,$S3ELsbE4,$S3ETonD4,$S3ELsbD4,$S3DTonE4,$S3DLsbE4,$S3DTonD4,$S3DLsbD4,$S3TriggerInicial,$S3TriggerFinal
,$S4ETonE1,$S4ELsbE1,$S4ETonD1,$S4ELsbD1,$S4DTonE1,$S4DLsbE1,$S4DTonD1,$S4DLsbD1,$S4ETonE2,$S4ELsbE2,$S4ETonD2
,$S4ELsbD2,$S4DTonE2,$S4DLsbE2,$S4DTonD2,$S4DLsbD2,$S4ETonE3,$S4ELsbE3,$S4ETonD3,$S4ELsbD3,$S4DTonE3,$S4DLsbE3
,$S4DTonD3,$S4DLsbD3,$S4ETonE4,$S4ELsbE4,$S4ETonD4,$S4ELsbD4,$S4DTonE4,$S4DLsbE4,$S4DTonD4,$S4DLsbD4,$S4TriggerInicial,$S4TriggerFinal
,$S5ETonE1,$S5ELsbE1,$S5ETonD1,$S5ELsbD1,$S5DTonE1,$S5DLsbE1,$S5DTonD1,$S5DLsbD1,$S5ETonE2,$S5ELsbE2,$S5ETonD2
,$S5ELsbD2,$S5DTonE2,$S5DLsbE2,$S5DTonD2,$S5DLsbD2,$S5ETonE3,$S5ELsbE3,$S5ETonD3,$S5ELsbD3,$S5DTonE3,$S5DLsbE3
,$S5DTonD3,$S5DLsbD3,$S5ETonE4,$S5ELsbE4,$S5ETonD4,$S5ELsbD4,$S5DTonE4,$S5DLsbE4,$S5DTonD4,$S5DLsbD4,$S5TriggerInicial,$S5TriggerFinal
,$S6ETonE1,$S6ELsbE1,$S6ETonD1,$S6ELsbD1,$S6DTonE1,$S6DLsbE1,$S6DTonD1,$S6DLsbD1,$S6ETonE2,$S6ELsbE2,$S6ETonD2
,$S6ELsbD2,$S6DTonE2,$S6DLsbE2,$S6DTonD2,$S6DLsbD2,$S6ETonE3,$S6ELsbE3,$S6ETonD3,$S6ELsbD3,$S6DTonE3,$S6DLsbE3
,$S6DTonD3,$S6DLsbD3,$S6ETonE4,$S6ELsbE4,$S6ETonD4,$S6ELsbD4,$S6DTonE4,$S6DLsbE4,$S6DTonD4,$S6DLsbD4,$S6TriggerInicial,$S6TriggerFinal
,$S7ETonE1,$S7ELsbE1,$S7ETonD1,$S7ELsbD1,$S7DTonE1,$S7DLsbE1,$S7DTonD1,$S7DLsbD1,$S7ETonE2,$S7ELsbE2,$S7ETonD2
,$S7ELsbD2,$S7DTonE2,$S7DLsbE2,$S7DTonD2,$S7DLsbD2,$S7ETonE3,$S7ELsbE3,$S7ETonD3,$S7ELsbD3,$S7DTonE3,$S7DLsbE3
,$S7DTonD3,$S7DLsbD3,$S7ETonE4,$S7ELsbE4,$S7ETonD4,$S7ELsbD4,$S7DTonE4,$S7DLsbE4,$S7DTonD4,$S7DLsbD4,$S7TriggerInicial,$S7TriggerFinal
,$S8ETonE1,$S8ELsbE1,$S8ETonD1,$S8ELsbD1,$S8DTonE1,$S8DLsbE1,$S8DTonD1,$S8DLsbD1,$S8ETonE2,$S8ELsbE2,$S8ETonD2
,$S8ELsbD2,$S8DTonE2,$S8DLsbE2,$S8DTonD2,$S8DLsbD2,$S8ETonE3,$S8ELsbE3,$S8ETonD3,$S8ELsbD3,$S8DTonE3,$S8DLsbE3
,$S8DTonD3,$S8DLsbD3,$S8ETonE4,$S8ELsbE4,$S8ETonD4,$S8ELsbD4,$S8DTonE4,$S8DLsbE4,$S8DTonD4,$S8DLsbD4,$S8TriggerInicial,$S8TriggerFinal
,$S9ETonE1,$S9ELsbE1,$S9ETonD1,$S9ELsbD1,$S9DTonE1,$S9DLsbE1,$S9DTonD1,$S9DLsbD1,$S9ETonE2,$S9ELsbE2,$S9ETonD2
,$S9ELsbD2,$S9DTonE2,$S9DLsbE2,$S9DTonD2,$S9DLsbD2,$S9ETonE3,$S9ELsbE3,$S9ETonD3,$S9ELsbD3,$S9DTonE3,$S9DLsbE3
,$S9DTonD3,$S9DLsbD3,$S9ETonE4,$S9ELsbE4,$S9ETonD4,$S9ELsbD4,$S9DTonE4,$S9DLsbE4,$S9DTonD4,$S9DLsbD4,$S9TriggerInicial,$S9TriggerFinal
,$S10ETonE1,$S10ELsbE1,$S10ETonD1,$S10ELsbD1,$S10DTonE1,$S10DLsbE1,$S10DTonD1,$S10DLsbD1,$S10ETonE2,$S10ELsbE2
,$S10ETonD2,$S10ELsbD2,$S10DTonE2,$S10DLsbE2,$S10DTonD2,$S10DLsbD2,$S10ETonE3,$S10ELsbE3,$S10ETonD3,$S10ELsbD3
,$S10DTonE3,$S10DLsbE3,$S10DTonD3,$S10DLsbD3,$S10ETonE4,$S10ELsbE4,$S10ETonD4,$S10ELsbD4,$S10DTonE4,$S10DLsbE4
,$S10DTonD4,$S10DLsbD4,$S10TriggerInicial,$S10TriggerFinal,$S11ETonE1,$S11ELsbE1,$S11ETonD1,$S11ELsbD1,$S11DTonE1
,$S11DLsbE1,$S11DTonD1,$S11DLsbD1,$S11ETonE2,$S11ELsbE2,$S11ETonD2,$S11ELsbD2,$S11DTonE2,$S11DLsbE2,$S11DTonD2,$S11DLsbD2
,$S11ETonE3,$S11ELsbE3,$S11ETonD3,$S11ELsbD3,$S11DTonE3,$S11DLsbE3,$S11DTonD3,$S11DLsbD3,$S11ETonE4,$S11ELsbE4,$S11ETonD4
,$S11ELsbD4,$S11DTonE4,$S11DLsbE4,$S11DTonD4,$S11DLsbD4,$S11TriggerInicial,$S11TriggerFinal,$S12ETonE1,$S12ELsbE1,$S12ETonD1
,$S12ELsbD1,$S12DTonE1,$S12DLsbE1,$S12DTonD1,$S12DLsbD1,$S12ETonE2,$S12ELsbE2,$S12ETonD2,$S12ELsbD2,$S12DTonE2,$S12DLsbE2
,$S12DTonD2,$S12DLsbD2,$S12ETonE3,$S12ELsbE3,$S12ETonD3,$S12ELsbD3,$S12DTonE3,$S12DLsbE3,$S12DTonD3,$S12DLsbD3
,$S12ETonE4,$S12ELsbE4,$S12ETonD4,$S12ELsbD4,$S12DTonE4,$S12DLsbE4,$S12DTonD4,$S12DLsbD4,$S12TriggerInicial
,$S12TriggerFinal

UPDATE `calibracao` SET CodigoBalanca=?,QtdSensores=?,MaxDrift=?,MultPeso=?,MultVelocidade=?,DistSensores=?,
S1ETonE1=?,S1ELsbE1=?,S1ETonD1=?,S1ELsbD1=?,S1DTonE1=?,S1DLsbE1=?,S1DTonD1=?,S1DLsbD1=?,S1ETonE2=?,S1ELsbE2=?,S1ETonD2=?,
S1ELsbD2=?,S1DTonE2=?,S1DLsbE2=?,S1DTonD2=?,S1DLsbD2=?,S1ETonE3=?,S1ELsbE3=?,S1ETonD3=?,S1ELsbD3=?,S1DTonE3=?,S1DLsbE3=?,
S1DTonD3=?,S1DLsbD3=?,S1ETonE4=?,S1ELsbE4=?,S1ETonD4=?,S1ELsbD4=?,S1DTonE4=?,S1DLsbE4=?,S1DTonD4=?,S1DLsbD4=?,S1TriggerInicial=?,
S1TriggerFinal=?,S2ETonE1=?,S2ELsbE1=?,S2ETonD1=?,S2ELsbD1=?,S2DTonE1=?,S2DLsbE1=?,S2DTonD1=?,S2DLsbD1=?,S2ETonE2=?,
S2ELsbE2=?,S2ETonD2=?,S2ELsbD2=?,S2DTonE2=?,S2DLsbE2=?,S2DTonD2=?,S2DLsbD2=?,S2ETonE3=?,S2ELsbE3=?,S2ETonD3=?,S2ELsbD3=?,
S2DTonE3=?,S2DLsbE3=?,S2DTonD3=?,S2DLsbD3=?,S2ETonE4=?,S2ELsbE4=?,S2ETonD4=?,S2ELsbD4=?,S2DTonE4=?,S2DLsbE4=?,S2DTonD4=?,
S2DLsbD4=?,S21TriggerInicial=?,S2TriggerFinal=?,S3ETonE1=?,S3ELsbE1=?,S3ETonD1=?,S3ELsbD1=?,S3DTonE1=?,S3DLsbE1=?,
S3DTonD1=?,S3DLsbD1=?,S3ETonE2=?,S3ELsbE2=?,S3ETonD2=?,S3ELsbD2=?,S3DTonE2=?,S3DLsbE2=?,S3DTonD2=?,S3DLsbD2=?,S3ETonE3=?,
S3ELsbE3=?,S3ETonD3=?,S3ELsbD3=?,S3DTonE3=?,S3DLsbE3=?,S3DTonD3=?,S3DLsbD3=?,S3ETonE4=?,S3ELsbE4=?,S3ETonD4=?,S3ELsbD4=?,
S3DTonE4=?,S3DLsbE4=?,S3DTonD4=?,S3DLsbD4=?,S3TriggerInicial=?,S3TriggerFinal=?,S4ETonE1=?,S4ELsbE1=?,S4ETonD1=?,S4ELsbD1=?,
S4DTonE1=?,S4DLsbE1=?,S4DTonD1=?,S4DLsbD1=?,S4ETonE2=?,S4ELsbE2=?,S4ETonD2=?,S4ELsbD2=?,S4DTonE2=?,S4DLsbE2=?,S4DTonD2=?,
S4DLsbD2=?,S4ETonE3=?,S4ELsbE3=?,S4ETonD3=?,S4ELsbD3=?,S4DTonE3=?,S4DLsbE3=?,S4DTonD3=?,S4DLsbD3=?,S4ETonE4=?,S4ELsbE4=?,
S4ETonD4=?,S4ELsbD4=?,S4DTonE4=?,S4DLsbE4=?,S4DTonD4=?,S4DLsbD4=?,S4TriggerInicial=?,S4TriggerFinal=?,S5ETonE1=?,S5ELsbE1=?,
S5ETonD1=?,S5ELsbD1=?,S5DTonE1=?,S5DLsbE1=?,S5DTonD1=?,S5DLsbD1=?,S5ETonE2=?,S5ELsbE2=?,S5ETonD2=?,S5ELsbD2=?,S5DTonE2=?,
S5DLsbE2=?,S5DTonD2=?,S5DLsbD2=?,S5ETonE3=?,S5ELsbE3=?,S5ETonD3=?,S5ELsbD3=?,S5DTonE3=?,S5DLsbE3=?,S5DTonD3=?,S5DLsbD3=?,
S5ETonE4=?,S5ELsbE4=?,S5ETonD4=?,S5ELsbD4=?,S5DTonE4=?,S5DLsbE4=?,S5DTonD4=?,S5DLsbD4=?,S5TriggerInicial=?,S5TriggerFinal=?,
S6ETonE1=?,S6ELsbE1=?,S6ETonD1=?,S6ELsbD1=?,S6DTonE1=?,S6DLsbE1=?,S6DTonD1=?,S6DLsbD1=?,S6ETonE2=?,S6ELsbE2=?,S6ETonD2=?,
S6ELsbD2=?,S6DTonE2=?,S6DLsbE2=?,S6DTonD2=?,S6DLsbD2=?,S6ETonE3=?,S6ELsbE3=?,S6ETonD3=?,S6ELsbD3=?,S6DTonE3=?,S6DLsbE3=?,
S6DTonD3=?,S6DLsbD3=?,S6ETonE4=?,S6ELsbE4=?,S6ETonD4=?,S6ELsbD4=?,S6DTonE4=?,S6DLsbE4=?,S6DTonD4=?,S6DLsbD4=?,S6TriggerInicial=?,
S6TriggerFinal=?,S7ETonE1=?,S7ELsbE1=?,S7ETonD1=?,S7ELsbD1=?,S7DTonE1=?,S7DLsbE1=?,S7DTonD1=?,S7DLsbD1=?,S7ETonE2=?,S7ELsbE2=?,
S7ETonD2=?,S7ELsbD2=?,S7DTonE2=?,S7DLsbE2=?,S7DTonD2=?,S7DLsbD2=?,S7ETonE3=?,S7ELsbE3=?,S7ETonD3=?,S7ELsbD3=?,S7DTonE3=?,
S7DLsbE3=?,S7DTonD3=?,S7DLsbD3=?,S7ETonE4=?,S7ELsbE4=?,S7ETonD4=?,S7ELsbD4=?,S7DTonE4=?,S7DLsbE4=?,S7DTonD4=?,S7DLsbD4=?,
S7TriggerInicial=?,S7TriggerFinal=?,S8ETonE1=?,S8ELsbE1=?,S8ETonD1=?,S8ELsbD1=?,S8DTonE1=?,S8DLsbE1=?,S8DTonD1=?,S8DLsbD1=?,
S8ETonE2=?,S8ELsbE2=?,S8ETonD2=?,S8ELsbD2=?,S8DTonE2=?,S8DLsbE2=?,S8DTonD2=?,S8DLsbD2=?,S8ETonE3=?,S8ELsbE3=?,S8ETonD3=?,
S8ELsbD3=?,S8DTonE3=?,S8DLsbE3=?,S8DTonD3=?,S8DLsbD3=?,S8ETonE4=?,S8ELsbE4=?,S8ETonD4=?,S8ELsbD4=?,S8DTonE4=?,S8DLsbE4=?,
S8DTonD4=?,S8DLsbD4=?,S8TriggerInicial=?,S8TriggerFinal=?,S9ETonE1=?,S9ELsbE1=?,S9ETonD1=?,S9ELsbD1=?,S9DTonE1=?,S9DLsbE1=?,
S9DTonD1=?,S9DLsbD1=?,S9ETonE2=?,S9ELsbE2=?,S9ETonD2=?,S9ELsbD2=?,S9DTonE2=?,S9DLsbE2=?,S9DTonD2=?,S9DLsbD2=?,S9ETonE3=?,
S9ELsbE3=?,S9ETonD3=?,S9ELsbD3=?,S9DTonE3=?,S9DLsbE3=?,S9DTonD3=?,S9DLsbD3=?,S9ETonE4=?,S9ELsbE4=?,S9ETonD4=?,S9ELsbD4=?,
S9DTonE4=?,S9DLsbE4=?,S9DTonD4=?,S9DLsbD4=?,S9TriggerInicial=?,S9TriggerFinal=?,S10ETonE1=?,S10ELsbE1=?,S10ETonD1=?,S10ELsbD1=?,
S10DTonE1=?,S10DLsbE1=?,S10DTonD1=?,S10DLsbD1=?,S10ETonE2=?,S10ELsbE2=?,S10ETonD2=?,S10ELsbD2=?,S10DTonE2=?,S10DLsbE2=?,
S10DTonD2=?,S10DLsbD2=?,S10ETonE3=?,S10ELsbE3=?,S10ETonD3=?,S10ELsbD3=?,S10DTonE3=?,S10DLsbE3=?,S10DTonD3=?,S10DLsbD3=?,
S10ETonE4=?,S10ELsbE4=?,S10ETonD4=?,S10ELsbD4=?,S10DTonE4=?,S10DLsbE4=?,S10DTonD4=?,S10DLsbD4=?,S10TriggerInicial=?,
S10TriggerFinal=?,S11ETonE1=?,S11ELsbE1=?,S11ETonD1=?,S11ELsbD1=?,S11DTonE1=?,S11DLsbE1=?,S11DTonD1=?,S11DLsbD1=?,S11ETonE2=?,
S11ELsbE2=?,S11ETonD2=?,S11ELsbD2=?,S11DTonE2=?,S11DLsbE2=?,S11DTonD2=?,S11DLsbD2=?,S11ETonE3=?,S11ELsbE3=?,S11ETonD3=?,
S11ELsbD3=?,S11DTonE3=?,S11DLsbE3=?,S11DTonD3=?,S11DLsbD3=?,S11ETonE4=?,S11ELsbE4=?,S11ETonD4=?,S11ELsbD4=?,S11DTonE4=?,
S11DLsbE4=?,S11DTonD4=?,S11DLsbD4=?,S11TriggerInicial=?,S11TriggerFinal=?,S12ETonE1=?,S12ELsbE1=?,S12ETonD1=?,S12ELsbD1=?,
S12DTonE1=?,S12DLsbE1=?,S12DTonD1=?,S12DLsbD1=?,S12ETonE2=?,S12ELsbE2=?,S12ETonD2=?,S12ELsbD2=?,S12DTonE2=?,S12DLsbE2=?,
S12DTonD2=?,S12DLsbD2=?,S12ETonE3=?,S12ELsbE3=?,S12ETonD3=?,S12ELsbD3=?,S12DTonE3=?,S12DLsbE3=?,S12DTonD3=?,S12DLsbD3=?,
S12ETonE4=?,S12ELsbE4=?,S12ETonD4=?,S12ELsbD4=?,S12DTonE4=?,S12DLsbE4=?,S12DTonD4=?,S12DLsbD4=?,S12TriggerInicial=?,S12TriggerFinal=? 
WHERE id=?


