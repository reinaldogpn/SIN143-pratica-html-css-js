
--
-- Banco de dados: `universidade`
--
DROP DATABASE IF EXISTS `universidade`;
CREATE DATABASE `universidade`;
USE `universidade`;

-- --------------------------------------------------------

--
-- Estrutura para tabela `aluno`
--

CREATE TABLE `aluno` (
  `id` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `telefone` varchar(11) NOT NULL,
  `email` varchar(30) NOT NULL,
  `endereco` int(11) NOT NULL
);

--
-- Despejando dados para a tabela `aluno`
--

INSERT INTO `aluno` (`id`, `nome`, `telefone`, `email`, `endereco`) VALUES
(1, 'Joaozinho', '22222222222', 'joaozinho@ufv.br', 1),
(2, 'João Silva', '1234567890', 'joao.silva@example.com', 2),
(3, 'Maria Santos', '9876543210', 'maria.santos@example.com', 3),
(4, 'Pedro Oliveira', '5551234567', 'pedro.oliveira@example.com', 4),
(5, 'Ana Costa', '3339876543', 'ana.costa@example.com', 5),
(6, 'Maria Oliveira', '987321654', 'maria.oliveira@email.com', 6),
(7, 'Carlos Santos', '789456123', 'carlos.santos@email.com', 7),
(8, 'Ana Rodrigues', '654987321', 'ana.rodrigues@email.com', 8),
(9, 'José Pereira', '123987456', 'jose.pereira@email.com', 9),
(10, 'Sandra Souza', '321654987', 'sandra.souza@email.com', 10);

-- --------------------------------------------------------

--
-- Estrutura para tabela `endereco`
--

CREATE TABLE `endereco` (
  `endereco_id` int(11) NOT NULL,
  `cidade` varchar(50) NOT NULL,
  `estado` varchar(2) NOT NULL,
  `bairro` varchar(50) NOT NULL,
  `rua` varchar(50) NOT NULL,
  `numero` int(11) NOT NULL
);

--
-- Despejando dados para a tabela `endereco`
--

INSERT INTO `endereco` (`endereco_id`, `cidade`, `estado`, `bairro`, `rua`, `numero`) VALUES
(1, 'Sete Lagoas', 'MG', 'Boa Vista', 'Andrade Fernandino', 42),
(2, 'Imperatriz', 'MA', 'Nova Imperatriz', 'Maranhão', 1048),
(3, 'Rio Paranaíba', 'MG', 'Qualquer um', 'Qualquer Uma', 32),
(4, 'São Paulo', 'SP', 'Centro', 'Avenida Central', 123),
(5, 'Rio de Janeiro', 'RJ', 'Jardim Botânico', 'Rua das Flores', 456),
(6, 'Belo Horizonte', 'MG', 'Vila Nova', 'Rua Principal', 789),
(7, 'Rio Paranaíba', 'MG', 'Jardim Primavera', 'Rua das Palmeiras', 43),
(8, 'Rio de Janeiro', 'RJ', 'Jardim Botânico', 'Avenida dos Sonhos', 456),
(9, 'Belo Horizonte', 'MG', 'Jardim das Acácias', 'Rua das Palmeiras', 789),
(10, 'Natal', 'RN', 'Lagoa Nova', 'Rua das Margaridas', 987);

--
-- Índices de tabela `aluno`
--

ALTER TABLE `aluno`
  ADD PRIMARY KEY (`id`),
  ADD KEY `endereco` (`endereco`);
  
--
-- Índices de tabela `endereco`
--

ALTER TABLE `endereco`
  ADD PRIMARY KEY (`endereco_id`);
  
--
-- AUTO_INCREMENT de tabela `aluno`
--

ALTER TABLE `aluno`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `endereco`
--

ALTER TABLE `endereco`
  MODIFY `endereco_id` int(11) NOT NULL AUTO_INCREMENT;
  
--
-- Restrições para tabelas `aluno`
--

ALTER TABLE `aluno`
  ADD CONSTRAINT `aluno_ibfk_1` FOREIGN KEY (`endereco`) REFERENCES `endereco` (`endereco_id`);
