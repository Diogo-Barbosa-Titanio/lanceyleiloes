-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Tempo de geração: 27/12/2019 às 23:17
-- Versão do servidor: 5.7.28-0ubuntu0.18.04.4
-- Versão do PHP: 7.3.10-1+ubuntu18.04.1+deb.sury.org+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `lancey`
--
CREATE DATABASE IF NOT EXISTS `lancey` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE `lancey`;

-- --------------------------------------------------------

--
-- Estrutura para tabela `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Fazendo dump de dados para tabela `cache`
--

INSERT INTO `cache` (`key`, `value`, `expiration`) VALUES
('lancey_leiloes_cache6a6f5187ced4b9b03116fc40f66a84fcdb3afb79', 'i:1;', 1574100872),
('lancey_leiloes_cache6a6f5187ced4b9b03116fc40f66a84fcdb3afb79:timer', 'i:1574100872;', 1574100872),
('lancey_leiloes_cachediogo.barbosa@gm5.com.br|192.168.50.1', 'i:1;', 1576291794),
('lancey_leiloes_cachediogo.barbosa@gm5.com.br|192.168.50.1:timer', 'i:1576291794;', 1576291794),
('lancey_leiloes_cachediogo|192.168.50.1', 'i:5;', 1576291814),
('lancey_leiloes_cachediogo|192.168.50.1:timer', 'i:1576291814;', 1576291814),
('lancey_leiloes_cachediogobarbosasilva@gmail.com|192.168.50.1', 'i:2;', 1576291830),
('lancey_leiloes_cachediogobarbosasilva@gmail.com|192.168.50.1:timer', 'i:1576291830;', 1576291830);

-- --------------------------------------------------------

--
-- Estrutura para tabela `faqs`
--

CREATE TABLE `faqs` (
  `id` int(11) NOT NULL,
  `titulo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `descricao` text COLLATE utf8mb4_unicode_ci,
  `ordenacao` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `leiloes`
--

CREATE TABLE `leiloes` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_leiloes_comitentes` int(10) UNSIGNED DEFAULT NULL,
  `id_leiloes_tipos` int(10) UNSIGNED DEFAULT NULL,
  `id_leiloes_naturezas` int(10) UNSIGNED DEFAULT NULL,
  `nome` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `descricao` text COLLATE utf8mb4_unicode_ci,
  `foto` text COLLATE utf8mb4_unicode_ci,
  `codigo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `edital` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Fazendo dump de dados para tabela `leiloes`
--

INSERT INTO `leiloes` (`id`, `id_leiloes_comitentes`, `id_leiloes_tipos`, `id_leiloes_naturezas`, `nome`, `descricao`, `foto`, `codigo`, `edital`, `created_at`, `updated_at`) VALUES
(1, 1, 3, 1, 'Leilão Abyara 123', 'Leilão promovido com fundos do governo com objetivo de ação social. 456', '/images/leiloes/leiloes_1_20191101_194556.webp', '13AS4E5', '/editais/leiloes/leiloes_1_20191101_194556.pdf', '2019-11-01 19:45:57', '2019-11-02 01:15:26'),
(2, 3, 1, 1, 'Itaú', 'Leilão de casas do Itáu Unibanco.', '/images/leiloes/leiloes_1_20191112_144918_498.jpeg', 'ASD123', '/editais/leiloes/leiloes_1_20191112_144918_625.pdf', '2019-11-12 14:49:18', '2019-11-12 14:49:18');

-- --------------------------------------------------------

--
-- Estrutura para tabela `leiloes_comitentes`
--

CREATE TABLE `leiloes_comitentes` (
  `id` int(10) UNSIGNED NOT NULL,
  `nome` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `foto` text COLLATE utf8mb4_unicode_ci,
  `tipo` char(2) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Se for PF é pessoa física se for PJ é pessoa jurídica.',
  `cpf_cnpj` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Fazendo dump de dados para tabela `leiloes_comitentes`
--

INSERT INTO `leiloes_comitentes` (`id`, `nome`, `foto`, `tipo`, `cpf_cnpj`, `created_at`, `updated_at`) VALUES
(1, 'Cultura Inglesa', '/images/comitentes/comitentes_1_20191030_121238.jpeg', 'PJ', '00.448.549/7746-54', '2019-10-28 22:59:59', '2019-10-31 19:11:01'),
(2, 'Diogo Barbosa Silva Sousa', '/images/comitentes/comitentes_1_20191031_191535.jpeg', 'PF', '112.056.127-26', '2019-10-31 19:15:36', '2019-10-31 19:15:36'),
(3, 'Itaú', '/images/comitentes/comitentes_1_20191112_144753_257.jpeg', 'PJ', '12.123.545/4546-54', '2019-11-12 14:47:54', '2019-11-12 14:47:54');

-- --------------------------------------------------------

--
-- Estrutura para tabela `leiloes_habilitacoes`
--

CREATE TABLE `leiloes_habilitacoes` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_lotes` int(10) UNSIGNED DEFAULT NULL,
  `id_leiloes` int(10) UNSIGNED DEFAULT NULL,
  `id_users` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `leiloes_naturezas`
--

CREATE TABLE `leiloes_naturezas` (
  `id` int(10) UNSIGNED NOT NULL,
  `nome` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Fazendo dump de dados para tabela `leiloes_naturezas`
--

INSERT INTO `leiloes_naturezas` (`id`, `nome`, `created_at`, `updated_at`) VALUES
(1, 'Extrajudicial', '2019-10-25 00:00:00', '2019-10-25 00:00:00'),
(2, 'Judicial', '2019-10-25 00:00:00', '2019-10-25 00:00:00'),
(3, 'Privado', '2019-11-19 03:00:00', '2019-11-19 03:00:00');

-- --------------------------------------------------------

--
-- Estrutura para tabela `leiloes_tipos`
--

CREATE TABLE `leiloes_tipos` (
  `id` int(10) UNSIGNED NOT NULL,
  `nome` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Fazendo dump de dados para tabela `leiloes_tipos`
--

INSERT INTO `leiloes_tipos` (`id`, `nome`, `created_at`, `updated_at`) VALUES
(1, 'Online', '2019-10-31 00:00:00', '2019-10-31 00:00:00'),
(2, 'Presencial', '2019-10-31 00:00:00', '2019-10-31 00:00:00'),
(3, 'Online e Presencial', '2019-10-31 00:00:00', '2019-10-31 00:00:00');

-- --------------------------------------------------------

--
-- Estrutura para tabela `lotes`
--

CREATE TABLE `lotes` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_leiloes` int(10) UNSIGNED DEFAULT NULL,
  `id_lotes_situacoes` int(10) UNSIGNED DEFAULT NULL,
  `id_lotes_categorias` int(10) UNSIGNED DEFAULT NULL,
  `nome` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `descricao` text COLLATE utf8mb4_unicode_ci,
  `lance_inicial` double(11,2) UNSIGNED DEFAULT NULL,
  `lance_minimo` double(11,2) UNSIGNED DEFAULT NULL,
  `data_inicio` date DEFAULT NULL COMMENT 'Data de início do leilão para este lote.',
  `data_fim` date DEFAULT NULL COMMENT 'Data de fim do leilão para este lote.',
  `hora_inicio` time DEFAULT NULL COMMENT 'Horário de início do leilão',
  `hora_fim` time DEFAULT NULL COMMENT 'Horário de encerramento do leilão.',
  `codigo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Fazendo dump de dados para tabela `lotes`
--

INSERT INTO `lotes` (`id`, `id_leiloes`, `id_lotes_situacoes`, `id_lotes_categorias`, `nome`, `descricao`, `lance_inicial`, `lance_minimo`, `data_inicio`, `data_fim`, `hora_inicio`, `hora_fim`, `codigo`, `created_at`, `updated_at`) VALUES
(6, 2, 4, 1, 'Casa de 300 m², Vila Kosmos', 'Casa de 300 m² boa localização próximo ao Shopping Carioca, metrô de Vicente de Carvalho e a escola de ensino fundamental e médio PIO XII. Bairro residencial.', 300095.27, 452230.39, '2019-11-13', '2019-12-20', '02:55:22', '20:12:33', NULL, '2019-12-27 19:45:46', '2019-12-27 19:58:49'),
(8, 2, 4, 1, 'Lote de teste', 'Lote de teste descrição', 80885.08, 90213.09, '2019-11-13', '2019-12-16', '14:35:44', '09:35:00', NULL, '2019-12-02 20:15:31', '2019-12-27 19:58:49');

-- --------------------------------------------------------

--
-- Estrutura para tabela `lotes_caracteristicas`
--

CREATE TABLE `lotes_caracteristicas` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_lotes` int(10) UNSIGNED DEFAULT NULL,
  `id_lotes_fases_das_obras` int(10) UNSIGNED DEFAULT NULL,
  `area_privativa` int(11) DEFAULT '0',
  `quartos` int(11) DEFAULT '0',
  `suites` int(11) DEFAULT '0',
  `vagas` int(11) DEFAULT '0',
  `banheiros` int(11) DEFAULT '0',
  `desocupado` char(1) COLLATE utf8mb4_unicode_ci DEFAULT 'N',
  `academia` char(1) COLLATE utf8mb4_unicode_ci DEFAULT 'N',
  `bicicletario` char(1) COLLATE utf8mb4_unicode_ci DEFAULT 'N',
  `brinquedoteca` char(1) COLLATE utf8mb4_unicode_ci DEFAULT 'N',
  `campo_de_futebol` char(1) COLLATE utf8mb4_unicode_ci DEFAULT 'N',
  `churrasqueira` char(1) COLLATE utf8mb4_unicode_ci DEFAULT 'N',
  `cinema` char(1) COLLATE utf8mb4_unicode_ci DEFAULT 'N',
  `pet_care` char(1) COLLATE utf8mb4_unicode_ci DEFAULT 'N',
  `piscina` char(1) COLLATE utf8mb4_unicode_ci DEFAULT 'N',
  `piscina_infantil` char(1) COLLATE utf8mb4_unicode_ci DEFAULT 'N',
  `pista_de_skate` char(1) COLLATE utf8mb4_unicode_ci DEFAULT 'N',
  `playground` char(1) COLLATE utf8mb4_unicode_ci DEFAULT 'N',
  `quadra_de_squash` char(1) COLLATE utf8mb4_unicode_ci DEFAULT 'N',
  `quadra_de_tenis` char(1) COLLATE utf8mb4_unicode_ci DEFAULT 'N',
  `restaurante` char(1) COLLATE utf8mb4_unicode_ci DEFAULT 'N',
  `sala_de_massagem` char(1) COLLATE utf8mb4_unicode_ci DEFAULT 'N',
  `salao_de_beleza` char(1) COLLATE utf8mb4_unicode_ci DEFAULT 'N',
  `salao_de_festas` char(1) COLLATE utf8mb4_unicode_ci DEFAULT 'N',
  `salao_de_festas_infantil` char(1) COLLATE utf8mb4_unicode_ci DEFAULT 'N',
  `salao_de_jogos` char(1) COLLATE utf8mb4_unicode_ci DEFAULT 'N',
  `sauna` char(1) COLLATE utf8mb4_unicode_ci DEFAULT 'N',
  `spa` char(1) COLLATE utf8mb4_unicode_ci DEFAULT 'N',
  `vagas_de_visitantes` char(1) COLLATE utf8mb4_unicode_ci DEFAULT 'N',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Fazendo dump de dados para tabela `lotes_caracteristicas`
--

INSERT INTO `lotes_caracteristicas` (`id`, `id_lotes`, `id_lotes_fases_das_obras`, `area_privativa`, `quartos`, `suites`, `vagas`, `banheiros`, `desocupado`, `academia`, `bicicletario`, `brinquedoteca`, `campo_de_futebol`, `churrasqueira`, `cinema`, `pet_care`, `piscina`, `piscina_infantil`, `pista_de_skate`, `playground`, `quadra_de_squash`, `quadra_de_tenis`, `restaurante`, `sala_de_massagem`, `salao_de_beleza`, `salao_de_festas`, `salao_de_festas_infantil`, `salao_de_jogos`, `sauna`, `spa`, `vagas_de_visitantes`, `created_at`, `updated_at`) VALUES
(5, 6, 4, 300, 2, 0, 0, 2, 'N', 'N', 'N', 'N', 'N', 'S', 'N', 'N', 'N', 'N', 'N', 'N', 'N', 'N', 'N', 'N', 'N', NULL, 'N', 'N', 'N', 'N', 'N', '2019-11-12 15:32:40', '2019-12-27 19:45:46'),
(7, 8, 2, 2121, 45, 45, 54545, 4, 'S', 'S', 'S', NULL, NULL, NULL, NULL, NULL, NULL, 'N', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-11-12 17:02:06', '2019-12-02 20:15:31');

-- --------------------------------------------------------

--
-- Estrutura para tabela `lotes_categorias`
--

CREATE TABLE `lotes_categorias` (
  `id` int(10) UNSIGNED NOT NULL,
  `nome` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tipo` int(11) DEFAULT NULL COMMENT 'Tipo 1 é Residencial e 2 é Comercial.',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Fazendo dump de dados para tabela `lotes_categorias`
--

INSERT INTO `lotes_categorias` (`id`, `nome`, `tipo`, `created_at`, `updated_at`) VALUES
(1, 'Casa', 1, '2019-11-04 00:00:00', '2019-11-04 00:00:00'),
(2, 'Apartamento', 1, '2019-11-04 00:00:00', '2019-12-27 19:32:00'),
(3, 'Loja', 2, '2019-11-04 00:00:00', '2019-11-04 00:00:00'),
(4, 'Sala Comercial', 2, '2019-11-04 00:00:00', '2019-11-04 00:00:00'),
(5, 'Terreno', 2, '2019-12-26 21:12:31', '2019-12-26 21:12:31'),
(8, 'Loja (Frontal)', 2, '2019-12-27 19:00:54', '2019-12-27 19:04:14');

-- --------------------------------------------------------

--
-- Estrutura para tabela `lotes_enderecos`
--

CREATE TABLE `lotes_enderecos` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_lotes` int(10) UNSIGNED DEFAULT NULL,
  `cep` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `estado` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cidade` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bairro` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `endereco` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `numero` int(11) DEFAULT NULL,
  `complemento` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Fazendo dump de dados para tabela `lotes_enderecos`
--

INSERT INTO `lotes_enderecos` (`id`, `id_lotes`, `cep`, `estado`, `cidade`, `bairro`, `endereco`, `numero`, `complemento`, `created_at`, `updated_at`) VALUES
(5, 6, '21220-160', 'RJ', 'Rio de Janeiro', 'RJ', 'Rua Abageru', NULL, NULL, '2019-11-12 15:32:40', '2019-12-27 19:45:46'),
(7, 8, '21220-160', 'RJ', 'Rio de Janeiro', 'RJ', 'Rua Abageru', NULL, NULL, '2019-11-12 17:02:06', '2019-12-02 20:15:31');

-- --------------------------------------------------------

--
-- Estrutura para tabela `lotes_fases_das_obras`
--

CREATE TABLE `lotes_fases_das_obras` (
  `id` int(10) UNSIGNED NOT NULL,
  `nome` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Fazendo dump de dados para tabela `lotes_fases_das_obras`
--

INSERT INTO `lotes_fases_das_obras` (`id`, `nome`, `created_at`, `updated_at`) VALUES
(1, 'Breve lançamento', '2019-11-04 22:01:08', '2019-11-04 22:01:08'),
(2, 'Lançamento', '2019-11-04 22:01:08', '2019-11-04 22:01:08'),
(3, 'Em construção', '2019-11-04 22:01:08', '2019-11-04 22:01:08'),
(4, 'Pronto', '2019-11-04 22:01:08', '2019-11-04 22:01:08');

-- --------------------------------------------------------

--
-- Estrutura para tabela `lotes_fotos`
--

CREATE TABLE `lotes_fotos` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_lotes` int(10) UNSIGNED DEFAULT NULL,
  `nome` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `foto` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Fazendo dump de dados para tabela `lotes_fotos`
--

INSERT INTO `lotes_fotos` (`id`, `id_lotes`, `nome`, `foto`, `created_at`, `updated_at`) VALUES
(11, 6, NULL, '/images/lotes/lotes_1_20191113_151710_9.jpeg', '2019-11-12 15:32:40', '2019-11-13 18:17:10'),
(12, 6, NULL, '/images/lotes/lotes_1_20191112_163649_800.jpeg', '2019-11-12 15:32:40', '2019-11-12 16:36:49'),
(13, 6, NULL, NULL, '2019-11-12 15:32:40', '2019-11-12 15:32:40'),
(14, 6, NULL, NULL, '2019-11-12 15:32:40', '2019-11-12 15:32:40'),
(15, 6, NULL, NULL, '2019-11-12 15:32:40', '2019-11-12 15:32:40'),
(16, 6, NULL, NULL, '2019-11-12 15:32:40', '2019-11-12 15:32:40'),
(17, 6, NULL, NULL, '2019-11-12 15:32:40', '2019-11-12 15:32:40'),
(18, 6, NULL, NULL, '2019-11-12 15:32:40', '2019-11-12 15:32:40'),
(19, 6, NULL, NULL, '2019-11-12 15:32:40', '2019-11-12 15:32:40'),
(20, 6, NULL, NULL, '2019-11-12 15:32:40', '2019-11-12 15:32:40'),
(31, 8, NULL, NULL, '2019-11-12 17:02:06', '2019-11-12 17:02:06'),
(32, 8, NULL, NULL, '2019-11-12 17:02:06', '2019-11-12 17:02:06'),
(33, 8, NULL, NULL, '2019-11-12 17:02:06', '2019-11-12 17:02:06'),
(34, 8, NULL, '/images/lotes/lotes_1_20191112_170206_651.jpeg', '2019-11-12 17:02:07', '2019-11-12 17:02:07'),
(35, 8, NULL, NULL, '2019-11-12 17:02:07', '2019-11-12 17:02:07'),
(36, 8, NULL, NULL, '2019-11-12 17:02:07', '2019-11-12 17:02:07'),
(37, 8, NULL, NULL, '2019-11-12 17:02:07', '2019-11-12 17:02:07'),
(38, 8, NULL, '/images/lotes/lotes_1_20191112_170207_711.jpeg', '2019-11-12 17:02:07', '2019-11-12 17:02:07'),
(39, 8, NULL, NULL, '2019-11-12 17:02:07', '2019-11-12 17:02:07'),
(40, 8, NULL, NULL, '2019-11-12 17:02:07', '2019-11-12 17:02:07');

-- --------------------------------------------------------

--
-- Estrutura para tabela `lotes_lances`
--

CREATE TABLE `lotes_lances` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_lotes` int(10) UNSIGNED DEFAULT NULL,
  `id_leiloes` int(10) UNSIGNED DEFAULT NULL,
  `id_users` bigint(20) UNSIGNED DEFAULT NULL,
  `lances` float UNSIGNED DEFAULT NULL,
  `data_lance` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `lotes_segundas_pracas`
--

CREATE TABLE `lotes_segundas_pracas` (
  `id` int(11) UNSIGNED NOT NULL,
  `id_lotes` int(10) UNSIGNED DEFAULT NULL,
  `data_ini_segunda_praca` timestamp NULL DEFAULT NULL,
  `data_fim_segunda_praca` timestamp NULL DEFAULT NULL,
  `hora_inicio_segunda_praca` time DEFAULT NULL COMMENT 'Horário de início do leilão segunda praça.',
  `hora_fim_segunda_praca` time DEFAULT NULL COMMENT 'Horário de encerramento do leilão segunda praça.',
  `lance_inicial_segunda_praca` float UNSIGNED DEFAULT NULL,
  `lance_minimo_segunda_praca` float UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='Tabela preenchida se o lote possuir segunda praça.';

-- --------------------------------------------------------

--
-- Estrutura para tabela `lotes_situacoes`
--

CREATE TABLE `lotes_situacoes` (
  `id` int(10) UNSIGNED NOT NULL,
  `nome` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Fazendo dump de dados para tabela `lotes_situacoes`
--

INSERT INTO `lotes_situacoes` (`id`, `nome`, `created_at`, `updated_at`) VALUES
(1, 'Em loteamento', '2019-11-04 00:00:00', '2019-11-04 00:00:00'),
(2, 'Aberto', '2019-11-04 00:00:00', '2019-11-04 00:00:00'),
(3, 'Arrematado', '2019-11-04 00:00:00', '2019-11-04 00:00:00'),
(4, 'Não arrematado', '2019-11-04 00:00:00', '2019-11-04 00:00:00'),
(5, 'Em condicional', '2019-11-04 00:00:00', '2019-11-04 00:00:00'),
(6, 'Venda direta', '2019-11-04 00:00:00', '2019-11-04 00:00:00');

-- --------------------------------------------------------

--
-- Estrutura para tabela `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Fazendo dump de dados para tabela `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('diogo.barbosa@gm5.com.br', '$2y$10$lQeibzxrXN7xGZ.E3Ag.Z.GQa.CDXkiP5zo/HBA8HLLJPIaYYsXfG', '2019-12-26 15:01:04');

-- --------------------------------------------------------

--
-- Estrutura para tabela `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Fazendo dump de dados para tabela `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('aLp8vePXwIBHzhirrrppDCjZ23PPpSC9UKnsExq3', NULL, '192.168.50.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/79.0.3945.88 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiMWpBU3lMNVE0amxWWlpkUmY0ZEZ3ZG5pU1NIdzNZZmtEWDdqUmRyNCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzE6Imh0dHA6Ly9kZXYubGFuY2V5bGVpbG9lcy5jb20uYnIiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1577499319);

-- --------------------------------------------------------

--
-- Estrutura para tabela `text_metas`
--

CREATE TABLE `text_metas` (
  `id` int(11) NOT NULL,
  `chave` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `valor` text COLLATE utf8mb4_unicode_ci,
  `titulo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='Nesta tabela podem ser inseridos valores para serem usados nos htmls da aplicação assim como valores aleatórios onde pra consultá-los basta saber a chave para recuperar o valor e o titulo.';

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
(1, 'Diogo Barbosa', 'diogo.barbosa@gm5.com.br', NULL, '$2y$10$VwU2dWpoXtjMq87UQt.3UubaMog.4ptfps31ZWYpjUfOelckrNrfW', 'Ytsho6sml0VAte9JkPexNTJ5rl8pwTfeaxBdRyotijsoYJnUhP3JKk4h0MP6', '2019-10-11 23:39:36', '2019-10-31 17:06:20'),
(15, 'Emanuel Masculino Pamiondas 4', 'diogosilva@gmail.com', NULL, '$2y$10$lZ7Xx7xbfbcupq/wn5WD.Ot.WfJkgdbSNse8YQ7wH6ikEHYQ3za.6', NULL, '2019-10-29 14:35:33', '2019-10-31 17:11:08'),
(19, 'Sala Comercial 1, Grajaú, Rio de Janeiro SP', 'diogo.barbosa777@gm5.com.br', NULL, '$2y$10$Jzuh8OMDxSNUn./zUmo2oe69JL.YfciQo4ysTSeRyAqI1Yhrh1oAS', NULL, '2019-10-31 18:54:50', '2019-10-31 18:55:17');

-- --------------------------------------------------------

--
-- Estrutura para tabela `users_administradores`
--

CREATE TABLE `users_administradores` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_users` bigint(20) UNSIGNED DEFAULT NULL,
  `login` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tipo` char(2) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'AD' COMMENT 'Se for PF é pessoa física se for PJ é pessoa jurídica se for AD é administrador.',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Fazendo dump de dados para tabela `users_administradores`
--

INSERT INTO `users_administradores` (`id`, `id_users`, `login`, `tipo`, `created_at`, `updated_at`) VALUES
(1, 1, 'bolsabh', 'AD', '2019-10-25 00:00:00', '2019-10-31 17:06:20');

-- --------------------------------------------------------

--
-- Estrutura para tabela `users_enderecos`
--

CREATE TABLE `users_enderecos` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_users` bigint(20) UNSIGNED DEFAULT NULL,
  `cep` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pais` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `estado` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cidade` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bairro` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `endereco` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `numero` int(11) DEFAULT NULL,
  `complemento` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Fazendo dump de dados para tabela `users_enderecos`
--

INSERT INTO `users_enderecos` (`id`, `id_users`, `cep`, `pais`, `estado`, `cidade`, `bairro`, `endereco`, `numero`, `complemento`, `created_at`, `updated_at`) VALUES
(2, 15, '21235-545', 'Brasil', 'RJ', 'Rio de Janeiro', 'Vila Kosmos', 'Rua Dalcidio Jurandir 15', 17, 'Apt 202', '2019-10-29 14:35:33', '2019-10-31 18:30:09'),
(4, 19, '21220-16', 'Brasil', 'RJ', 'Rio de Janeiro', 'Barra da Tijuca', 'Rua Abageru', 17, '1321321', '2019-10-31 18:54:50', '2019-10-31 18:55:17');

-- --------------------------------------------------------

--
-- Estrutura para tabela `users_pessoas_fisicas`
--

CREATE TABLE `users_pessoas_fisicas` (
  `id` int(11) NOT NULL,
  `id_users` bigint(20) UNSIGNED DEFAULT NULL,
  `login` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tipo` char(2) COLLATE utf8mb4_unicode_ci DEFAULT 'PF' COMMENT 'Se for PF é pessoa física se for PJ é pessoa jurídica.',
  `cpf` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rg` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nascimento` date DEFAULT NULL,
  `sexo` char(1) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'F para feminino e M para masculino',
  `telefone` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `celular` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Fazendo dump de dados para tabela `users_pessoas_fisicas`
--

INSERT INTO `users_pessoas_fisicas` (`id`, `id_users`, `login`, `tipo`, `cpf`, `rg`, `nascimento`, `sexo`, `telefone`, `celular`, `created_at`, `updated_at`) VALUES
(4, 15, 'gm5', 'PF', '112.056.127-26', '08.953.216-7', '2003-06-13', 'M', '(21) 3301-6238', '(98) 76976-8976', '2019-10-29 14:35:33', '2019-10-31 18:30:09');

-- --------------------------------------------------------

--
-- Estrutura para tabela `users_pessoas_juridicas`
--

CREATE TABLE `users_pessoas_juridicas` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_users` bigint(20) UNSIGNED DEFAULT NULL,
  `login` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tipo` char(2) COLLATE utf8mb4_unicode_ci DEFAULT 'PJ' COMMENT 'Se for PF é pessoa física se for PJ é pessoa jurídica.',
  `cnpj` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `inscricao_estadual` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `telefone` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `celular` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Fazendo dump de dados para tabela `users_pessoas_juridicas`
--

INSERT INTO `users_pessoas_juridicas` (`id`, `id_users`, `login`, `tipo`, `cnpj`, `inscricao_estadual`, `telefone`, `celular`, `created_at`, `updated_at`) VALUES
(1, 19, 'gm5212', 'PJ', '55.465.465/4546-54', 'ADAD6836', '(21) 3301-6238', '(12) 31321-3212', '2019-10-31 18:54:50', '2019-10-31 18:55:17');

--
-- Índices de tabelas apagadas
--

--
-- Índices de tabela `cache`
--
ALTER TABLE `cache`
  ADD UNIQUE KEY `key_UNIQUE` (`key`);

--
-- Índices de tabela `faqs`
--
ALTER TABLE `faqs`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `queue_UNIQUE` (`queue`);

--
-- Índices de tabela `leiloes`
--
ALTER TABLE `leiloes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_id_leiloes_comitentes_idx` (`id_leiloes_comitentes`),
  ADD KEY `fk_id_leiloes_tipos_idx` (`id_leiloes_tipos`),
  ADD KEY `fk_id_leiloes_naturezas_idx` (`id_leiloes_naturezas`);

--
-- Índices de tabela `leiloes_comitentes`
--
ALTER TABLE `leiloes_comitentes`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `leiloes_habilitacoes`
--
ALTER TABLE `leiloes_habilitacoes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_id_lotes_idx` (`id_lotes`),
  ADD KEY `fk_id_leiloes_idx` (`id_leiloes`),
  ADD KEY `fk_id_users_idx` (`id_users`);

--
-- Índices de tabela `leiloes_naturezas`
--
ALTER TABLE `leiloes_naturezas`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `leiloes_tipos`
--
ALTER TABLE `leiloes_tipos`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `lotes`
--
ALTER TABLE `lotes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_leiloes_idx` (`id_leiloes`),
  ADD KEY `id_lotes_situacoes_idx` (`id_lotes_situacoes`),
  ADD KEY `id_lotes_categorias_idx` (`id_lotes_categorias`);

--
-- Índices de tabela `lotes_caracteristicas`
--
ALTER TABLE `lotes_caracteristicas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_id_lotes_fases_das_obras_idx` (`id_lotes_fases_das_obras`),
  ADD KEY `fk_id_lotes_caracteristicas_id_lotes_idx` (`id_lotes`);

--
-- Índices de tabela `lotes_categorias`
--
ALTER TABLE `lotes_categorias`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `lotes_enderecos`
--
ALTER TABLE `lotes_enderecos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_lotes_enderecos_idx` (`id_lotes`);

--
-- Índices de tabela `lotes_fases_das_obras`
--
ALTER TABLE `lotes_fases_das_obras`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `lotes_fotos`
--
ALTER TABLE `lotes_fotos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_id_lotes_idx` (`id_lotes`);

--
-- Índices de tabela `lotes_lances`
--
ALTER TABLE `lotes_lances`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_id_lotes_idx` (`id_lotes`),
  ADD KEY `fk_id_leiloes_idx` (`id_leiloes`),
  ADD KEY `fk_id_users_idx` (`id_users`);

--
-- Índices de tabela `lotes_segundas_pracas`
--
ALTER TABLE `lotes_segundas_pracas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_lotes_segundas_pracas_id_lotes_idx` (`id_lotes`);

--
-- Índices de tabela `lotes_situacoes`
--
ALTER TABLE `lotes_situacoes`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `idx_email` (`email`);

--
-- Índices de tabela `sessions`
--
ALTER TABLE `sessions`
  ADD UNIQUE KEY `id_UNIQUE` (`id`);

--
-- Índices de tabela `text_metas`
--
ALTER TABLE `text_metas`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `chave_UNIQUE` (`chave`);

--
-- Índices de tabela `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email_UNIQUE` (`email`);

--
-- Índices de tabela `users_administradores`
--
ALTER TABLE `users_administradores`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `login_UNIQUE` (`login`),
  ADD KEY `fk_id_users_idx` (`id_users`);

--
-- Índices de tabela `users_enderecos`
--
ALTER TABLE `users_enderecos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_users_enderecos_id_users_idx` (`id_users`);

--
-- Índices de tabela `users_pessoas_fisicas`
--
ALTER TABLE `users_pessoas_fisicas`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `login_UNIQUE` (`login`),
  ADD UNIQUE KEY `cpf_UNIQUE` (`cpf`),
  ADD UNIQUE KEY `rg_UNIQUE` (`rg`),
  ADD KEY `fk_id_users_idx` (`id_users`);

--
-- Índices de tabela `users_pessoas_juridicas`
--
ALTER TABLE `users_pessoas_juridicas`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `login_UNIQUE` (`login`),
  ADD UNIQUE KEY `cnpj_UNIQUE` (`cnpj`),
  ADD KEY `fk_id_users_idx` (`id_users`);

--
-- AUTO_INCREMENT de tabelas apagadas
--

--
-- AUTO_INCREMENT de tabela `faqs`
--
ALTER TABLE `faqs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de tabela `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de tabela `leiloes`
--
ALTER TABLE `leiloes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de tabela `leiloes_comitentes`
--
ALTER TABLE `leiloes_comitentes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de tabela `leiloes_habilitacoes`
--
ALTER TABLE `leiloes_habilitacoes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de tabela `leiloes_naturezas`
--
ALTER TABLE `leiloes_naturezas`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de tabela `leiloes_tipos`
--
ALTER TABLE `leiloes_tipos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de tabela `lotes`
--
ALTER TABLE `lotes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT de tabela `lotes_caracteristicas`
--
ALTER TABLE `lotes_caracteristicas`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT de tabela `lotes_categorias`
--
ALTER TABLE `lotes_categorias`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT de tabela `lotes_enderecos`
--
ALTER TABLE `lotes_enderecos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT de tabela `lotes_fases_das_obras`
--
ALTER TABLE `lotes_fases_das_obras`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de tabela `lotes_fotos`
--
ALTER TABLE `lotes_fotos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;
--
-- AUTO_INCREMENT de tabela `lotes_lances`
--
ALTER TABLE `lotes_lances`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de tabela `lotes_segundas_pracas`
--
ALTER TABLE `lotes_segundas_pracas`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de tabela `lotes_situacoes`
--
ALTER TABLE `lotes_situacoes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT de tabela `text_metas`
--
ALTER TABLE `text_metas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de tabela `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT de tabela `users_administradores`
--
ALTER TABLE `users_administradores`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de tabela `users_enderecos`
--
ALTER TABLE `users_enderecos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de tabela `users_pessoas_fisicas`
--
ALTER TABLE `users_pessoas_fisicas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de tabela `users_pessoas_juridicas`
--
ALTER TABLE `users_pessoas_juridicas`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- Restrições para dumps de tabelas
--

--
-- Restrições para tabelas `leiloes`
--
ALTER TABLE `leiloes`
  ADD CONSTRAINT `fk_leiloes_id_leiloes_comitentes` FOREIGN KEY (`id_leiloes_comitentes`) REFERENCES `leiloes_comitentes` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_leiloes_id_leiloes_naturezas` FOREIGN KEY (`id_leiloes_naturezas`) REFERENCES `leiloes_naturezas` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_leiloes_id_leiloes_tipos` FOREIGN KEY (`id_leiloes_tipos`) REFERENCES `leiloes_tipos` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Restrições para tabelas `leiloes_habilitacoes`
--
ALTER TABLE `leiloes_habilitacoes`
  ADD CONSTRAINT `fk_leiloes_habilitacoes_id_leiloes` FOREIGN KEY (`id_leiloes`) REFERENCES `leiloes` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_leiloes_habilitacoes_id_lotes` FOREIGN KEY (`id_lotes`) REFERENCES `lotes` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_leiloes_habilitacoes_id_users` FOREIGN KEY (`id_users`) REFERENCES `users` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Restrições para tabelas `lotes`
--
ALTER TABLE `lotes`
  ADD CONSTRAINT `fk_lotes_id_leiloes` FOREIGN KEY (`id_leiloes`) REFERENCES `leiloes` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_lotes_id_lotes_categorias` FOREIGN KEY (`id_lotes_categorias`) REFERENCES `lotes_categorias` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_lotes_id_lotes_situacoes` FOREIGN KEY (`id_lotes_situacoes`) REFERENCES `lotes_situacoes` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Restrições para tabelas `lotes_caracteristicas`
--
ALTER TABLE `lotes_caracteristicas`
  ADD CONSTRAINT `fk_id_lotes_caracteristicas_id_lotes` FOREIGN KEY (`id_lotes`) REFERENCES `lotes` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_id_lotes_fases_das_obras` FOREIGN KEY (`id_lotes_fases_das_obras`) REFERENCES `lotes_fases_das_obras` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Restrições para tabelas `lotes_enderecos`
--
ALTER TABLE `lotes_enderecos`
  ADD CONSTRAINT `fk_lotes_enderecos` FOREIGN KEY (`id_lotes`) REFERENCES `lotes` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Restrições para tabelas `lotes_fotos`
--
ALTER TABLE `lotes_fotos`
  ADD CONSTRAINT `fk_lotes_fotos_id_lotes` FOREIGN KEY (`id_lotes`) REFERENCES `lotes` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Restrições para tabelas `lotes_lances`
--
ALTER TABLE `lotes_lances`
  ADD CONSTRAINT `fk_lotes_lances_id_leiloes` FOREIGN KEY (`id_leiloes`) REFERENCES `leiloes` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_lotes_lances_id_lotes` FOREIGN KEY (`id_lotes`) REFERENCES `lotes` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_lotes_lances_id_users` FOREIGN KEY (`id_users`) REFERENCES `users` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Restrições para tabelas `lotes_segundas_pracas`
--
ALTER TABLE `lotes_segundas_pracas`
  ADD CONSTRAINT `fk_lotes_segundas_pracas_id_lotes` FOREIGN KEY (`id_lotes`) REFERENCES `lotes` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Restrições para tabelas `users_administradores`
--
ALTER TABLE `users_administradores`
  ADD CONSTRAINT `fk_users_administradores_id_users` FOREIGN KEY (`id_users`) REFERENCES `users` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Restrições para tabelas `users_enderecos`
--
ALTER TABLE `users_enderecos`
  ADD CONSTRAINT `fk_users_enderecos_id_users` FOREIGN KEY (`id_users`) REFERENCES `users` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Restrições para tabelas `users_pessoas_fisicas`
--
ALTER TABLE `users_pessoas_fisicas`
  ADD CONSTRAINT `fk_pessoas_fisicas_id_users` FOREIGN KEY (`id_users`) REFERENCES `users` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Restrições para tabelas `users_pessoas_juridicas`
--
ALTER TABLE `users_pessoas_juridicas`
  ADD CONSTRAINT `fk_pessoas_juridicas_id_users` FOREIGN KEY (`id_users`) REFERENCES `users` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
