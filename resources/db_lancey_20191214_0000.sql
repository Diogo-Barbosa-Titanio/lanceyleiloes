-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Tempo de geração: 14/12/2019 às 00:00
-- Versão do servidor: 5.7.28-0ubuntu0.18.04.4
-- Versão do PHP: 7.3.10-1+ubuntu18.04.1+deb.sury.org+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `db_lancey`
--
CREATE DATABASE IF NOT EXISTS `db_lancey` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `db_lancey`;

-- --------------------------------------------------------

--
-- Estrutura para tabela `leiloes`
--

CREATE TABLE `leiloes` (
  `id` int(11) NOT NULL,
  `status` int(11) DEFAULT NULL,
  `nome` varchar(255) DEFAULT NULL,
  `acrescimo` int(11) DEFAULT NULL,
  `tipo` int(11) DEFAULT NULL,
  `codigo` int(11) DEFAULT NULL,
  `id_comitente` int(11) DEFAULT NULL,
  `id_natureza` int(11) DEFAULT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `criado_em` datetime DEFAULT NULL,
  `atualizado_em` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura para tabela `leiloes_habilitacoes`
--

CREATE TABLE `leiloes_habilitacoes` (
  `id` int(11) NOT NULL,
  `id_lotes` int(11) DEFAULT NULL,
  `id_leiloes` int(11) DEFAULT NULL,
  `id_cadastro` int(11) DEFAULT NULL,
  `data` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura para tabela `lotes`
--

CREATE TABLE `lotes` (
  `id` int(11) NOT NULL,
  `status` int(11) DEFAULT NULL,
  `id_leiloes` int(11) DEFAULT NULL,
  `id_situacao` int(11) DEFAULT NULL,
  `id_lotes_infraestrutura` int(11) DEFAULT NULL,
  `nome` varchar(255) DEFAULT NULL,
  `titulo_site` varchar(255) DEFAULT NULL,
  `data_ini_praca_1` datetime DEFAULT NULL,
  `data_fim_praca_1` datetime DEFAULT NULL,
  `data_ini_praca_2` datetime DEFAULT NULL,
  `data_fim_praca_2` datetime DEFAULT NULL,
  `lance_ini_praca_1` float DEFAULT NULL,
  `lance_ini_praca_2` float DEFAULT NULL,
  `lance_atual` float DEFAULT NULL,
  `lance_data` datetime DEFAULT NULL,
  `resumo` text,
  `descricao_completa` text,
  `pago` int(11) DEFAULT NULL,
  `codigo` int(11) DEFAULT NULL,
  `id_categoria` int(11) DEFAULT NULL,
  `cep` int(11) DEFAULT NULL,
  `bairro` varchar(255) DEFAULT NULL,
  `numero` int(11) DEFAULT NULL,
  `complemento` varchar(255) DEFAULT NULL,
  `cidade` varchar(255) DEFAULT NULL,
  `estado` varchar(255) DEFAULT NULL,
  `area_privativa` float DEFAULT NULL,
  `quartos` int(11) DEFAULT NULL,
  `suites` int(11) DEFAULT NULL,
  `vagas` int(11) DEFAULT NULL,
  `banheiros` int(11) DEFAULT NULL,
  `desocupado` int(11) DEFAULT NULL,
  `id_fase_da_obra` int(11) DEFAULT NULL,
  `criado_em` datetime DEFAULT NULL,
  `atualizado_em` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura para tabela `lotes_infraestrutura`
--

CREATE TABLE `lotes_infraestrutura` (
  `id` int(11) NOT NULL,
  `id_lotes` int(11) DEFAULT NULL,
  `academia` int(11) DEFAULT NULL,
  `bicicletario` int(11) DEFAULT NULL,
  `brinquedoteca` int(11) DEFAULT NULL,
  `campo_de_futebol` int(11) DEFAULT NULL,
  `churrasqueira` int(11) DEFAULT NULL,
  `cinema` int(11) DEFAULT NULL,
  `pet_care` int(11) DEFAULT NULL,
  `piscina` int(11) DEFAULT NULL,
  `piscina_infantil` int(11) DEFAULT NULL,
  `pista_de_skate` int(11) DEFAULT NULL,
  `playground` int(11) DEFAULT NULL,
  `quadra_de_futsal` int(11) DEFAULT NULL,
  `quadra_de_squash` int(11) DEFAULT NULL,
  `quadra_de_tenis` int(11) DEFAULT NULL,
  `restaurante` int(11) DEFAULT NULL,
  `sala_de_massagem` int(11) DEFAULT NULL,
  `salao_de_beleza` int(11) DEFAULT NULL,
  `salao_de_festas` int(11) DEFAULT NULL,
  `salao_de_festas_infantil` int(11) DEFAULT NULL,
  `salao_de_jogos` int(11) DEFAULT NULL,
  `sauna` int(11) DEFAULT NULL,
  `spa` int(11) DEFAULT NULL,
  `vagas_de_visitantes` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura para tabela `lotes_lances`
--

CREATE TABLE `lotes_lances` (
  `id` int(11) NOT NULL,
  `data` datetime DEFAULT NULL,
  `id_lotes` int(11) DEFAULT NULL,
  `id_cadastro` int(11) DEFAULT NULL,
  `lances` float DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura para tabela `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Fazendo dump de dados para tabela `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1);

-- --------------------------------------------------------

--
-- Estrutura para tabela `natureza`
--

CREATE TABLE `natureza` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) DEFAULT NULL,
  `criado_em` datetime DEFAULT NULL,
  `atualizado_em` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Fazendo dump de dados para tabela `natureza`
--

INSERT INTO `natureza` (`id`, `nome`, `criado_em`, `atualizado_em`) VALUES
(1, 'ExtraJudicial', '2019-08-15 15:35:00', NULL),
(2, 'Judicial', '2019-08-15 15:38:00', NULL),
(3, 'Privado', '2019-08-15 15:39:00', NULL),
(4, 'Venda Direta', '2019-08-15 15:39:00', NULL);

-- --------------------------------------------------------

--
-- Estrutura para tabela `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `situacao`
--

CREATE TABLE `situacao` (
  `id` int(11) NOT NULL,
  `situacao` varchar(255) DEFAULT NULL,
  `criado_em` datetime DEFAULT NULL,
  `atualizado_em` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Fazendo dump de dados para tabela `situacao`
--

INSERT INTO `situacao` (`id`, `situacao`, `criado_em`, `atualizado_em`) VALUES
(1, 'Aberto', '2019-08-15 15:54:00', NULL),
(2, 'Arrematado', '2019-08-15 15:55:00', NULL),
(3, 'Em Condicional', '2019-08-15 15:57:00', NULL),
(4, 'Venda Direta', '2019-08-15 15:59:00', NULL);

-- --------------------------------------------------------

--
-- Estrutura para tabela `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Fazendo dump de dados para tabela `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Diogo', 'diogo.barbosa@gm5.com.br', NULL, '$2y$10$Kj28.Kw5QKyjJqS7Uk8MZuZ2VIK9yu6AJ641jCnW.ClxindbeQuom', NULL, '2019-08-15 23:22:31', '2019-08-15 23:22:31');

--
-- Índices de tabelas apagadas
--

--
-- Índices de tabela `leiloes`
--
ALTER TABLE `leiloes`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `leiloes_habilitacoes`
--
ALTER TABLE `leiloes_habilitacoes`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `lotes`
--
ALTER TABLE `lotes`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `lotes_infraestrutura`
--
ALTER TABLE `lotes_infraestrutura`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `lotes_lances`
--
ALTER TABLE `lotes_lances`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `natureza`
--
ALTER TABLE `natureza`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Índices de tabela `situacao`
--
ALTER TABLE `situacao`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT de tabelas apagadas
--

--
-- AUTO_INCREMENT de tabela `leiloes`
--
ALTER TABLE `leiloes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de tabela `leiloes_habilitacoes`
--
ALTER TABLE `leiloes_habilitacoes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de tabela `lotes`
--
ALTER TABLE `lotes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de tabela `lotes_infraestrutura`
--
ALTER TABLE `lotes_infraestrutura`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de tabela `lotes_lances`
--
ALTER TABLE `lotes_lances`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de tabela `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de tabela `natureza`
--
ALTER TABLE `natureza`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de tabela `situacao`
--
ALTER TABLE `situacao`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de tabela `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
