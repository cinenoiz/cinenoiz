-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Tempo de geração: 09/09/2024 às 02:00
-- Versão do servidor: 10.4.28-MariaDB
-- Versão do PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `laravel`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `cinema`
--

CREATE TABLE `cinema` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `nome` varchar(200) NOT NULL,
  `logradouro` varchar(200) NOT NULL,
  `numero` varchar(200) NOT NULL,
  `cep` varchar(200) NOT NULL,
  `bairro` varchar(200) NOT NULL,
  `cidade` varchar(200) NOT NULL,
  `uf` varchar(200) NOT NULL,
  `latitude` varchar(200) NOT NULL,
  `longitude` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `cinema`
--

INSERT INTO `cinema` (`id`, `created_at`, `updated_at`, `nome`, `logradouro`, `numero`, `cep`, `bairro`, `cidade`, `uf`, `latitude`, `longitude`) VALUES
(1, '2024-09-09 02:18:01', '2024-09-09 02:18:01', 'Cine Paraíso', 'Avenida Luis Antonio Bellon', '213', '14300342', 'Bela Vista', 'Batatais', 'SP', '-23.563296273851268', '-46.643271421435806');

-- --------------------------------------------------------

--
-- Estrutura para tabela `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `filme`
--

CREATE TABLE `filme` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `titulo` varchar(200) NOT NULL,
  `sinopse` varchar(2000) NOT NULL,
  `id_produtora` bigint(20) UNSIGNED DEFAULT NULL,
  `banner_path` varchar(500) DEFAULT NULL,
  `personagem_path` varchar(500) DEFAULT NULL,
  `cartaz_path` varchar(500) DEFAULT NULL,
  `filme1_path` varchar(500) DEFAULT NULL,
  `filme2_path` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `filme`
--

INSERT INTO `filme` (`id`, `created_at`, `updated_at`, `titulo`, `sinopse`, `id_produtora`, `banner_path`, `personagem_path`, `cartaz_path`, `filme1_path`, `filme2_path`) VALUES
(6, '2024-09-08 22:21:56', '2024-09-08 22:21:56', 'Lego Batman 5', 'Extremamente egocêntrico, Batman leva uma vida solitária como o herói de Gotham City. Apesar disto, ele curte bastante o posto de celebridade e o fato de sempre ser chamado pela polícia quando surge algum problema - que ele, inevitavelmente, resolve. Quando o comissário Gordon se aposenta, quem assume em seu lugar é sua filha Barbara Gordon, que deseja implementar alguns métodos de eficiência de forma que a polícia não seja tão dependente do Batman. O herói, é claro, não gosta da ideia, por mais que sinta uma forte atração por Barbara. Paralelamente, o Coringa elabora um plano contra o Homem-Morcego motivado pelo fato de que ele não o reconhece como seu maior arquinimigo.', 1, 'filmes/6/abSrwIaypv1ZddBo94jOCevYXxszrYbvB2sPDTvM.png', 'filmes/6/yfOR4WkvpWy2Q9yNH5FwwQClKFGw76QwbZGYlkZr.png', 'filmes/6/Jqlns6HYW9vl3CxmjXVXMK70XFvLyuEfC9Zl1nzP.png', 'filmes/6/qajiuV2JYUtl8GxnCsSjnjgozbFFy0k2KV2CSM27.png', 'filmes/6/cDpzSTAQu30ujZy9y8rAOWoKXY0dNQ6fqYt5vgId.png'),
(7, '2024-09-08 22:40:21', '2024-09-08 22:40:21', 'Coraline 2024', 'Enquanto explora sua nova casa à noite, a pequena Coraline descobre uma porta secreta que contém um mundo parecido com o dela, porém melhor em muitas maneiras. Todos têm botões no lugar dos olhos, os pais são carinhosos e os sonhos de Coraline viram realidade por lá. Ela se encanta com essa descoberta, mas logo percebe que segredos estranhos estão em ação: uma outra mãe e o resto de sua família tentam mantê-la eternamente nesse mundo paralelo.', 3, 'filmes/7/wSUMDPrcnUtqsvbi9pIGCOepV2nS9SwDn387H3bA.png', 'filmes/7/1FMlxIwALtmShp0YJ9vSGMxYJany9zGvuqg4KHvj.png', 'filmes/7/kdDu8uZvzRYXuCsenVRoSuePdaxVMaJC3XExBfJI.png', 'filmes/7/sAQ1ICQWlBEWDeIp2572KwPjkn9qucdYR6DDBVZW.png', 'filmes/7/4YpJiTZhYt8Ivx5JONJ3qskPHvcnbNXNU1b6k0Fv.png'),
(8, '2024-09-08 22:52:07', '2024-09-08 22:52:07', 'Os Fantasmas Ainda Se Divertem', 'Retornamos à casa em Winter River, onde três gerações da família Deetz se unem após uma tragédia familiar inesperada. Lydia Deetz já é adulta e mãe da adolescente Astrid, que repentinamente descobre a misteriosa maquete da cidade no sótão e abre, sem querer, o portal para a vida após a morte, mais uma vez virando a vida da família Deetz de ponta-cabeça com o ressurgimento do extravagante fantasma Beetlejuice.', 4, 'filmes/8/TUz9JmpxHm3IEX7nOr6rC0hBw3Zm4sCHfpXT5F86.png', 'filmes/8/zR2uJrKgD1idBu8jcBd0Nmug9pTmWFgAdCQ1dMI4.png', 'filmes/8/GDOfO2LYjLoWzGrmrdVbvKoXPqsP0zOvNMD3dFJn.png', 'filmes/8/EY6QA4B6WDlXfQOfTpq45KkW2zcvXXfXz0mYDJR6.png', 'filmes/8/Y8DPLWmcTwvBpJjK99DdCIZL0zXBAQidzjweUj0s.png'),
(9, '2024-09-08 23:16:09', '2024-09-08 23:16:09', 'Sorria', 'Após um paciente cometer um suicídio brutal em sua frente, a psiquiatra Rose é perseguida por uma entidade maligna que muda de forma. Enquanto tenta escapar desse pesadelo, Rose também precisa enfrentar seu passado conturbado para sobreviver.', 5, 'filmes/9/MkJQWV4vHtLI4Mofp0hJEeDMO3wqhiVpMw30MbNf.png', 'filmes/9/bpzLvJHX8BmbYQQVHUySRWad1aSSibCzsIGo2XXy.png', 'filmes/9/0RodpvAW8VOcGEZSCM2XZEO8O7se1vqCYmxdQ7uY.png', 'filmes/9/gaiTVhe9oWUHbLs895iu0ukKzhhyKN1O84Bk6ovw.png', 'filmes/9/6P3MGz0JmKpdUcxyYLABzWh4IkAWAWRC9ihBbgzc.png'),
(10, '2024-09-08 23:29:16', '2024-09-08 23:29:16', 'Meu Malvado Favorito 4', 'Nesta sequência, o vilão mais amado do planeta, que virou agente da Liga Antivilões, retorna para mais uma aventura em Meu Malvado Favorito 4. Agora, Gru (Leandro Hassum), Lucy (Maria Clara Gueiros), Margo (Bruna Laynes), Edith (Ana Elena Bittencourt) e Agnes (Pamella Rodrigues) dão as boas-vindas a um novo membro da família: Gru Jr., que pretende atormentar seu pai. Enquanto se adapta com o pequeno, Gru enfrenta um novo inimigo, Maxime Le Mal (Jorge Lucas) que acaba de fugir da prisão e agora ameaça a segurança de todos, forçando sua namorada mulher-fatal Valentina (Angélica Borges) e a família a fugir do perigo. Em outra cidade, as meninas tentam se adaptar ao novo colégio e Valentina incentiva Gru a tentar viver uma vida mais simples, longe das aventuras perigosas que fez durante quase toda a vida. Neste meio tempo, eles também conhecem Poppy (Lorena Queiroz), uma surpreendente aspirante à vilã e os minions dão o toque que faltava para essa nova fase.', 6, 'filmes/10/Es5J92iogQBCOf7WLGdzq6WJqUlxWbHUxbomEC5k.png', 'filmes/10/zDKdj49zsdHaWFfL2xHjd8XrRb7c0Jcpwfz2dhtW.png', 'filmes/10/dnNWrA9YHXXGbu4uOCeRQdOComYFRfmByVyAq1dC.png', 'filmes/10/SMls9yWK2R8S79OYARChgXtHezHVNOCMZAjYjsIp.png', 'filmes/10/Ry4bhePrPYtmOymeSCHgKqMLqlALyfyi5Udqns41.png'),
(11, '2024-09-08 23:44:48', '2024-09-08 23:44:48', 'Divertida Mente 2', 'Com um salto temporal, Riley se encontra mais velha, passando pela tão temida adolescência. Junto com o amadurecimento, a sala de controle também está passando por uma adaptação para dar lugar a algo totalmente inesperado: novas emoções. As já conhecidas, Alegria, Raiva, Medo, Nojinho e Tristeza não têm certeza de como se sentir quando novos inquilinos chegam ao local.', 7, 'filmes/11/LhuQGWmGGkAJwSyOjjHoarEHMVyG6kjuHhq9oWQc.png', 'filmes/11/b9CI6y1IQKQnvVJF005h09WValPyH46rlmiBsKjd.png', 'filmes/11/DMQ3mXOv0YSTZZxBACIvz4y1J0fnIgJIoXzs21w2.png', 'filmes/11/ODnYVTDNvkOAlPchaNlrEcCi6yz9DdqMh83jh0qa.png', 'filmes/11/x4bSQUSm0MhsH3wzYjmPxZwVMuFH8nQELs6Radjx.png'),
(12, '2024-09-08 23:53:03', '2024-09-08 23:53:04', 'Garfield - Fora de Casa', 'Garfield tem um reencontro inesperado com seu pai, que estava há muito tempo desaparecido - um gato de rua todo desengonçado que atrai o filho para um assalto de alto risco.', 8, 'filmes/12/SjmfKRuO7qjemHQbdfSm9xvh29G2AtFxSEzqwScZ.png', 'filmes/12/PkL979GnxbQ9tAdWWpa5KWS2Od8uW0tEPul7iKH4.png', 'filmes/12/TfawQ7000XL2Gc5xgE3ZIemTk7zkdUhOQTZ6jjlf.png', 'filmes/12/JYycBZGnxxRQtjIXbQiEY2xn3IOqzdcqN8ru4T2k.png', 'filmes/12/Qgq5r9I34F2fiMrQG80U64Zj2of5MIsDU1MmrpvE.png'),
(13, '2024-09-09 00:02:14', '2024-09-09 00:02:14', 'Twisters', 'Twisters é uma continuação do longa homônimo de Jan de Bont, lançado em 1996. Desta vez, sob a direção de Lee Isaac Chung (Minari) o filme foca em uma dupla de caçadores de tempestade. Kate Cooper (Daisy Edgar-Jones) é uma ex-caçadora desses fenômenos, mas que acaba sendo atraída de volta às planícies por seu amigo Javi (Anthony Ramos), para testar um novo sistema experimental de rastreamento meteorológico. Nessa missão, ela cruza seu caminho com Tyler Owens (Glen Powell), um ícone das redes sociais que compartilha suas aventuras de caça à tempestade. Conforme a temporada de tempestades se intensifica, dando início a acontecimentos aterrorizantes, Kate e Tyler, que são concorrentes, se encontram em meio a uma situação nunca antes vista, colocando suas vidas em risco.', 9, 'filmes/13/g03mEcmIWHEUtLKxiSukFZPa8TVyiROMTIoq1wOS.png', 'filmes/13/6Q4VIRq6GqkJlyJ6ab1cAWO4aXDYibyZeDJ9t7oY.png', 'filmes/13/XKVeGkGGm2IANkWBLPGdXj3t40m6wdR2lvkwruRq.png', 'filmes/13/9gv3bpthVQEYlRChu9msIx7UTR49KKO378ve5fmK.png', 'filmes/13/JtaZ1CFIDO0wQ9ezT2aLPAM9Wc9ubhhDATTzBImf.png'),
(14, '2024-09-09 00:34:43', '2024-09-09 00:34:43', 'Bad Boys 4', 'Bad Boys: Até o Fim é o quarto filme da icônica saga de ação estrelada por Will Smith e Martin Lawrence, iniciada em 1995 com Os Bad Boys, dirigido por Michael Bay. Desta vez, o longa conta com Adil El Arbi e Bilall Fallah na direção e o roteiro fica por conta de Chris Bremnerirá. O quarto filme da franquia vai mostrar como os detetives mais famosos de Miami, Mike Lowrey (Smith) e Marcus Burnett (Lawrence), enfrentam uma reviravolta dramática: agora, eles que são os mais procurados! A caça virou o caçador e com direito a um prêmio pela suas cabeças. Com uma mistura característica de ação eletrizante e comédia escrachada, os dois lutarão lado a lado contra tudo e contra todos até o fim para proteger a reputação do capitão Howard e limpar seus nomes. Prepare-se para ver os Bad Boys preferidos do mundo enfrentando todos os obstáculos em uma aventura emocionante de tirar o fôlego.', 8, 'filmes/14/kJqlVRRWyPK8doFnemivsqUll8tiAd2r9c1kUccG.png', 'filmes/14/Is7dw0vBO3XAjvfsnRb7poGSdupKbteBvCxzU5bh.png', 'filmes/14/e2u7O453tSRlEG5ygLeD7lHEO3BDO6MKRWOJocZd.png', 'filmes/14/MHMNmnByJUmCzd2Ljs0dHFwnC6V5vOYkwxAV9wKH.png', 'filmes/14/3KKnxAqBT9J6itD96AMgFFTnWNiDjNFFSbbWdEid.png');

-- --------------------------------------------------------

--
-- Estrutura para tabela `filme_genero`
--

CREATE TABLE `filme_genero` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_filme` bigint(20) UNSIGNED NOT NULL,
  `id_genero` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `filme_genero`
--

INSERT INTO `filme_genero` (`id`, `id_filme`, `id_genero`) VALUES
(6, 6, 1),
(7, 6, 3),
(8, 6, 2),
(9, 7, 4),
(10, 7, 2),
(11, 8, 4),
(12, 9, 5),
(13, 9, 4),
(14, 10, 7),
(15, 10, 6),
(16, 11, 7),
(17, 11, 6),
(18, 12, 6),
(19, 12, 2),
(20, 12, 7),
(21, 13, 1),
(22, 13, 8),
(23, 14, 1),
(24, 14, 7);

-- --------------------------------------------------------

--
-- Estrutura para tabela `genero`
--

CREATE TABLE `genero` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `nome` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `genero`
--

INSERT INTO `genero` (`id`, `created_at`, `updated_at`, `nome`) VALUES
(1, '2024-09-05 04:34:23', '2024-09-05 04:34:23', 'Ação'),
(2, '2024-09-05 04:34:32', '2024-09-05 04:34:32', 'Animação'),
(3, '2024-09-05 04:34:38', '2024-09-05 04:34:38', 'Heróis'),
(4, '2024-09-08 22:35:41', '2024-09-08 22:35:41', 'Terror'),
(5, '2024-09-08 23:08:19', '2024-09-08 23:08:19', 'Suspense'),
(6, '2024-09-08 23:25:16', '2024-09-08 23:25:16', 'Infantil'),
(7, '2024-09-08 23:25:20', '2024-09-08 23:25:20', 'Comédia'),
(8, '2024-09-08 23:58:58', '2024-09-08 23:58:58', 'Thriller');

-- --------------------------------------------------------

--
-- Estrutura para tabela `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(19, '2014_10_12_000000_create_users_table', 1),
(20, '2014_10_12_100000_create_password_resets_table', 1),
(21, '2019_08_19_000000_create_failed_jobs_table', 1),
(22, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(23, '2024_09_03_010835_create_produtora_table', 1),
(24, '2024_09_04_005822_create_filme_table', 1),
(25, '2024_09_04_010823_create_genero_table', 1),
(26, '2024_09_04_010919_create_filme_genero_table', 1),
(27, '2024_09_04_205534_create_cinema_table', 1);

-- --------------------------------------------------------

--
-- Estrutura para tabela `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `produtora`
--

CREATE TABLE `produtora` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `nome` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `produtora`
--

INSERT INTO `produtora` (`id`, `created_at`, `updated_at`, `nome`) VALUES
(1, '2024-09-05 04:34:10', '2024-09-05 04:34:10', 'DC'),
(2, '2024-09-05 04:34:16', '2024-09-05 04:34:16', 'Marvel'),
(3, '2024-09-08 22:35:26', '2024-09-08 22:35:26', 'Laika'),
(4, '2024-09-08 22:49:32', '2024-09-08 22:49:32', 'Tim Burton'),
(5, '2024-09-08 23:14:54', '2024-09-08 23:14:54', 'Paramount'),
(6, '2024-09-08 23:24:36', '2024-09-08 23:24:36', 'Illumination'),
(7, '2024-09-08 23:41:51', '2024-09-08 23:41:51', 'Pixar'),
(8, '2024-09-08 23:51:23', '2024-09-08 23:51:23', 'Columbia'),
(9, '2024-09-08 23:58:33', '2024-09-08 23:58:33', 'Warner Bros.');

-- --------------------------------------------------------

--
-- Estrutura para tabela `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `cinema`
--
ALTER TABLE `cinema`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Índices de tabela `filme`
--
ALTER TABLE `filme`
  ADD PRIMARY KEY (`id`),
  ADD KEY `filme_id_produtora_foreign` (`id_produtora`);

--
-- Índices de tabela `filme_genero`
--
ALTER TABLE `filme_genero`
  ADD PRIMARY KEY (`id`),
  ADD KEY `filme_genero_id_filme_foreign` (`id_filme`),
  ADD KEY `filme_genero_id_genero_foreign` (`id_genero`);

--
-- Índices de tabela `genero`
--
ALTER TABLE `genero`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Índices de tabela `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Índices de tabela `produtora`
--
ALTER TABLE `produtora`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `cinema`
--
ALTER TABLE `cinema`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `filme`
--
ALTER TABLE `filme`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de tabela `filme_genero`
--
ALTER TABLE `filme_genero`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT de tabela `genero`
--
ALTER TABLE `genero`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de tabela `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT de tabela `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `produtora`
--
ALTER TABLE `produtora`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de tabela `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `filme`
--
ALTER TABLE `filme`
  ADD CONSTRAINT `filme_id_produtora_foreign` FOREIGN KEY (`id_produtora`) REFERENCES `produtora` (`id`) ON DELETE CASCADE;

--
-- Restrições para tabelas `filme_genero`
--
ALTER TABLE `filme_genero`
  ADD CONSTRAINT `filme_genero_id_filme_foreign` FOREIGN KEY (`id_filme`) REFERENCES `filme` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `filme_genero_id_genero_foreign` FOREIGN KEY (`id_genero`) REFERENCES `genero` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
