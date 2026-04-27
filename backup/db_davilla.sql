-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 27/04/2026 às 14:08
-- Versão do servidor: 10.4.32-MariaDB
-- Versão do PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `db_davilla`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `tbl_banner`
--

CREATE TABLE `tbl_banner` (
  `id_banner` int(11) NOT NULL,
  `nome_banner` varchar(30) NOT NULL,
  `foto_banner` varchar(50) NOT NULL,
  `status_banner` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `tbl_banner`
--

INSERT INTO `tbl_banner` (`id_banner`, `nome_banner`, `foto_banner`, `status_banner`) VALUES
(1, 'Vitrine de Páscoa', 'banner/vitrine-de-pascoa.png', 'ATIVO'),
(2, 'Bolos sob Encomenda', 'banner/bolos-sob-encomenda.png', 'ATIVO'),
(3, 'Café da Tarde', 'banner/cafe-da-tarde.png', 'ATIVO'),
(4, 'Bolos por Encomenda', 'banner/bolos-por-encomenda.jpg', 'ATIVO'),
(5, 'Promoção Doces Finos', 'banner/promocao-doces-finos.jpg', 'ATIVO'),
(6, 'Chá da Tarde', 'banner/cha-da-tarde.jpg', 'ATIVO'),
(7, 'Kit Presente Especial', 'banner/kit-presente-especial.jpg', 'INATIVO'),
(8, 'Torta da Semana', 'banner/torta-da-semana.jpg', 'ATIVO');

-- --------------------------------------------------------

--
-- Estrutura para tabela `tbl_categorias`
--

CREATE TABLE `tbl_categorias` (
  `id_categoria` int(11) NOT NULL,
  `nome_categoria` varchar(30) NOT NULL,
  `descricao_categoria` text NOT NULL,
  `criado_em_categoria` datetime NOT NULL DEFAULT current_timestamp(),
  `atualizado_em_categoria` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `tbl_categorias`
--

INSERT INTO `tbl_categorias` (`id_categoria`, `nome_categoria`, `descricao_categoria`, `criado_em_categoria`, `atualizado_em_categoria`) VALUES
(1, 'Bolos', 'Bolos de vitrine e sob encomenda.', '2026-03-05 09:56:50', '2026-03-05 09:56:50'),
(2, 'Doces', 'Brigadeiro, trufas e doces finos.', '2026-03-05 09:57:30', '2026-03-05 09:57:30'),
(3, 'Bebidas quentes', 'Café, capuccino e chás.', '2026-03-05 09:58:21', '2026-03-05 09:58:21'),
(4, 'Tortas', 'Tortas doces vendidas por fatia ou inteira', '2026-03-12 10:01:41', '2026-03-12 10:01:41'),
(5, 'Kits Presente', 'Kits especiais para presentear', '2026-03-12 10:03:45', '2026-03-12 10:03:45');

-- --------------------------------------------------------

--
-- Estrutura para tabela `tbl_clientes`
--

CREATE TABLE `tbl_clientes` (
  `id_cliente` int(11) NOT NULL,
  `nome_cliente` varchar(50) NOT NULL,
  `tipo_cliente` varchar(2) NOT NULL,
  `cpf_cnpj_cliente` varchar(18) NOT NULL,
  `data_nasc_cliente` date NOT NULL,
  `endereco_cliente` varchar(40) NOT NULL,
  `numero_cliente` varchar(6) NOT NULL,
  `complemento_cliente` varchar(50) DEFAULT NULL,
  `bairro_cliente` varchar(40) NOT NULL,
  `cidade_cliente` varchar(40) NOT NULL,
  `uf_cliente` varchar(2) NOT NULL,
  `cep_cliente` varchar(9) NOT NULL,
  `email_cliente` varchar(80) NOT NULL,
  `senha_cliente` varchar(255) NOT NULL,
  `telefone_cliente` varchar(14) NOT NULL,
  `foto_cliente` varchar(60) NOT NULL,
  `status_cliente` varchar(10) NOT NULL DEFAULT 'ATIVO',
  `criado_em_cliente` datetime NOT NULL DEFAULT current_timestamp(),
  `atualizado_em_cliente` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `tbl_clientes`
--

INSERT INTO `tbl_clientes` (`id_cliente`, `nome_cliente`, `tipo_cliente`, `cpf_cnpj_cliente`, `data_nasc_cliente`, `endereco_cliente`, `numero_cliente`, `complemento_cliente`, `bairro_cliente`, `cidade_cliente`, `uf_cliente`, `cep_cliente`, `email_cliente`, `senha_cliente`, `telefone_cliente`, `foto_cliente`, `status_cliente`, `criado_em_cliente`, `atualizado_em_cliente`) VALUES
(1, 'Fernanda Oliveira', 'PF', '123.456.789-10', '1992-07-18', 'Rua Doce Mel', '85', 'Casa A', 'Vila Maria', 'São Paulo', 'SP', '02010-000', 'fernanda.oli@gmail.com', 'senha123', '(11)98765-8521', 'cliente/fernanda-oliveira.png', 'ATIVO', '2026-03-10 09:45:10', '2026-03-10 09:45:10'),
(2, 'Amanda Souza', 'PF', '123.456.789-01', '1995-04-12', 'Rua das Flores', '120', 'Casa', 'Centro', 'São Paulo', 'SP', '010-10000', 'amanda@gmail.com', '123456', '(11)98888-7777', 'cliente/amanda-souza.png', 'ATIVO', '2026-03-12 11:09:49', '2026-03-12 11:09:49'),
(3, 'Bruno LIma', 'PF', '234.567.890-12', '1992-08-21', 'Av. Paulista', '850', 'Apto 45', 'Bela Vista', 'São Paulo', 'SP', '013-10000', 'bruno@gmail.com', '123456', '(11)99777-6666', 'cliente/bruno-lima.png', 'ATIVO', '2026-03-12 11:14:34', '2026-03-12 11:14:34'),
(4, 'Camila Ferreira', 'PF', '345.678.901-23', '1998-02-10', 'Rua do Açúcar', '56', 'Casa', 'Mooca', 'São Paulo', 'SP', '031-20000', 'camila@gmail.com', '123456', '(11)99666-5555', 'cliente/camila-ferreira.png', 'ATIVO', '2026-03-12 11:20:01', '2026-03-12 11:20:01'),
(5, 'Diego Martins', 'PF', '456.789.012-34', '1989-11-03', 'Rua do Café', '210', 'Casa', 'Tatuapé', 'São Paulo', 'SP', '033-33000', 'diego@gmail.com', '123456', '(11)99555-4444', 'cliente/diego-martins.png', 'ATIVO', '2026-03-12 11:23:31', '2026-03-12 11:23:31'),
(6, 'Elaine Rocha', 'PF', '567.890.123-45', '1990-06-17', 'Rua Brigadeiro', '98', 'Apto 12', 'Santana', 'São Paulo', 'SP', '020-20000', 'elaine@gmail.com', '123456', '(11)99444-3333', 'cliente/elaine-rocha.png', 'ATIVO', '2026-03-12 11:26:55', '2026-03-12 11:26:55'),
(7, 'Felipe Nunes', 'PF', '678.901.234-56', '1987-09-25', 'Rua da Palmeiras', '333', 'Casa', 'Penha', 'São Paulo', 'SP', '036-54000', 'felipe@gmail.com', '123456', '(11)99333-2222', 'cliente/felipe-nunes.png', 'ATIVO', '2026-03-12 11:29:39', '2026-03-12 11:29:39'),
(8, 'Gabriela Costa', 'PF', '789.012.345-67', '1996-03-09', 'Av. Celso Garcia', '741', 'Apto 67', 'Brás', 'São Paulo', 'SP', '030-15000', 'gabriela@gmail.com', '123456', '(11)99222-1111', 'cliente/gabriela-costa.png', 'ATIVO', '2026-03-12 11:32:57', '2026-03-12 11:32:57'),
(9, 'Henrique Alves', 'PF', '890.123.456-78', '1993-12-01', 'Rua dos Sonhos', '150', 'Casa', 'Ipiranga', 'São Paulo', 'SP', '042-10000', 'henrique@gmail.com', '123456', '(11)99111-0000', 'cliente/henrique-alves.png', 'ATIVO', '2026-03-12 11:37:01', '2026-03-12 11:37:01'),
(10, 'Festa Feliz Eventos', 'PJ', '12.345.678/0001-90', '2005-01-01', 'Rua dos Eventos', '500', 'Sala 3', 'Vila Mariana', 'São Paulo', 'SP', '041-10000', 'contato@festafeliz.com.br', '123456', '(11)3333-4444', 'cliente/festa-feliz-eventos.png', 'ATIVO', '2026-03-12 11:43:57', '2026-03-12 11:51:07'),
(11, 'Cafeteria Central', 'PJ', '98.765.432/0001-88', '2010-05-12', 'Av. Central', '1000', 'Loja 2', 'República', 'São Paulo', 'SP', '010-45000', 'compras@cafecentral.com.br', '123456', '(11)3222-1111', 'cliente/cafeteria-central.png', 'INATIVO', '2026-03-12 11:56:19', '2026-03-12 11:56:19');

-- --------------------------------------------------------

--
-- Estrutura para tabela `tbl_contato`
--

CREATE TABLE `tbl_contato` (
  `id_contato` int(11) NOT NULL,
  `nome_contato` varchar(50) NOT NULL,
  `email_contato` varchar(80) NOT NULL,
  `telefone_contato` varchar(14) NOT NULL,
  `assunto_contato` varchar(30) NOT NULL,
  `mensagem_contato` text NOT NULL,
  `status_contato` varchar(10) NOT NULL DEFAULT 'ENVIADO',
  `criado_em_contato` datetime NOT NULL DEFAULT current_timestamp(),
  `atualizado_em_contato` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `tbl_contato`
--

INSERT INTO `tbl_contato` (`id_contato`, `nome_contato`, `email_contato`, `telefone_contato`, `assunto_contato`, `mensagem_contato`, `status_contato`, `criado_em_contato`, `atualizado_em_contato`) VALUES
(1, 'Juliana Rocha', 'juliana.r@gmail.com', '(11)98888-1111', 'Encomenda', 'Quero um bolo de 20kg para um chá de bebê', 'ENVIADO', '2026-03-05 09:37:39', '2026-03-19 09:58:44'),
(2, 'Pedro Martins', 'pedro.m@gmail.com', '(11)97777-2222', 'Cardápio', 'Vocês tem opção sem lactose?', 'ENVIADO', '2026-03-05 09:41:25', '2026-03-05 09:41:25'),
(3, 'Carla Nunes', 'carla.n@gmail.com', '(11)96666-3333', 'Pagamento', 'Consigo pagar via PIX na entrega?', 'ENVIADO', '2026-03-05 09:43:05', '2026-03-05 09:43:05'),
(4, 'Juliana Rocha', 'juliana@gmail.com', '(11)98888-1111', 'Encomenda', 'Gostaria de encomendar um bolo para 20 pessoas.', 'ENVIADO', '2026-03-12 16:53:27', '2026-03-12 16:53:27'),
(5, 'Pedro Martins', 'pedro@gmail.com', '(11)98777-2222', 'Cardápio', 'Vocês fazem bolo sem lactose?', 'ENVIADO', '2026-03-12 16:55:09', '2026-03-12 16:55:09'),
(6, 'Carla Nunes', 'carla@gmail.com', '(11)98666-3333', 'Pagamento', 'Aceitam Pix e cartão na retirada?', 'LIDO', '2026-03-12 16:59:59', '2026-03-12 16:59:59'),
(7, 'Lucas Almeida', 'lucas@gmail.com', '(11)98555-4444', 'Orçamento', 'Qual valor de 100 brigadeiros gourmet?', 'RESPONDIDO', '2026-03-12 17:02:20', '2026-03-12 17:02:20'),
(8, 'Renata Silva', 'renata@gmail.com', '(11)98444-5555', 'Entrega', 'Vocês entregam no bairro da Mooca?', 'ENVIADO', '2026-03-12 17:05:32', '2026-03-12 17:05:32');

-- --------------------------------------------------------

--
-- Estrutura para tabela `tbl_controle_materia_prima`
--

CREATE TABLE `tbl_controle_materia_prima` (
  `id_controle` int(11) NOT NULL,
  `id_materia_prima` int(11) NOT NULL,
  `tipo_controle` varchar(7) NOT NULL,
  `qtde_controle` double(10,3) NOT NULL,
  `data_controle` datetime NOT NULL DEFAULT current_timestamp(),
  `obs_controle` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `tbl_controle_materia_prima`
--

INSERT INTO `tbl_controle_materia_prima` (`id_controle`, `id_materia_prima`, `tipo_controle`, `qtde_controle`, `data_controle`, `obs_controle`) VALUES
(1, 1, 'ENTRADA', 10.000, '2026-03-13 15:40:20', 'Compra semanal de farinha'),
(2, 2, 'ENTRADA', 8.000, '2026-03-13 15:40:26', 'Reposição de açúcar refinado'),
(3, 3, 'SAIDA', 2.500, '2026-03-13 15:40:29', 'Produção de ovos de Páscoa'),
(4, 4, 'SAIDA', 12.000, '2026-03-13 15:40:32', 'Produção de brigadeiros'),
(5, 6, 'ENTRADA', 5.000, '2026-03-13 15:40:37', 'Compra de morangos frescos'),
(6, 7, 'SAIDA', 30.000, '2026-03-13 15:40:39', 'Produção de bolos e tortas'),
(7, 8, 'SAIDA', 1.500, '2026-03-13 15:40:52', 'Consumo no preparo de cafés'),
(8, 9, 'ENTRADA', 20.000, '2026-03-13 15:40:55', 'Compra de embalagens'),
(9, 10, 'SAIDA', 3.000, '2026-03-13 15:40:59', 'Produção de massas e coberturas'),
(10, 5, 'SAIDA', 8.000, '2026-03-13 15:41:47', 'Produção de recheios');

-- --------------------------------------------------------

--
-- Estrutura para tabela `tbl_fornecedores`
--

CREATE TABLE `tbl_fornecedores` (
  `id_fornecedor` int(11) NOT NULL,
  `nome_fornecedor` varchar(50) NOT NULL,
  `representante_fornecedor` varchar(50) NOT NULL,
  `email_fornecedor` varchar(80) NOT NULL,
  `telefone_fornecedor` varchar(14) NOT NULL,
  `status_fornecedor` varchar(10) NOT NULL DEFAULT 'ATIVO',
  `criado_em_fornecedor` datetime NOT NULL DEFAULT current_timestamp(),
  `atualizado_em_fornecedor` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `tbl_fornecedores`
--

INSERT INTO `tbl_fornecedores` (`id_fornecedor`, `nome_fornecedor`, `representante_fornecedor`, `email_fornecedor`, `telefone_fornecedor`, `status_fornecedor`, `criado_em_fornecedor`, `atualizado_em_fornecedor`) VALUES
(1, 'Doce Sabor Distribuidora', 'Marcos Lima', 'contato@docesabor.com.br', '11987654321', 'ATIVO', '2026-03-12 10:12:33', '2026-03-12 10:16:09'),
(2, 'Laticínios Serra Azul', 'Fernanda Rocha', 'vendas@serraazul.com.br', '11981234567', 'ATIVO', '2026-03-12 10:49:54', '2026-03-12 10:49:54'),
(3, 'Embala Festas LTDA', 'Carla Mendes', 'comercial@embalafestas.com.br', '11993456789', 'ATIVO', '2026-03-12 10:51:46', '2026-03-12 10:51:46'),
(4, 'Frutas Boa Colheita', 'Pedro Alves', 'pedidos@boacolheita.com.br', '11992345678', 'ATIVO', '2026-03-12 10:53:45', '2026-03-12 10:53:45'),
(5, 'Chocolates Premium Brasil', 'Juliana Costa', 'suporte@cpbrasil.com.br', '11994567812', 'INATIVO', '2026-03-12 10:57:37', '2026-03-12 10:57:37');

-- --------------------------------------------------------

--
-- Estrutura para tabela `tbl_itens_venda`
--

CREATE TABLE `tbl_itens_venda` (
  `id_item` int(11) NOT NULL,
  `id_venda` int(11) NOT NULL,
  `id_produto` int(11) NOT NULL,
  `valor_unit_item` double(10,2) NOT NULL,
  `qtde_item` double(10,2) NOT NULL,
  `status_item` varchar(10) NOT NULL DEFAULT 'APROVADO',
  `atualizado_em_item` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `tbl_itens_venda`
--

INSERT INTO `tbl_itens_venda` (`id_item`, `id_venda`, `id_produto`, `valor_unit_item`, `qtde_item`, `status_item`, `atualizado_em_item`) VALUES
(1, 1, 4, 23.00, 2.00, 'APROVADO', '2026-03-10 10:59:07'),
(2, 1, 5, 13.75, 1.00, 'APROVADO', '2026-03-10 11:00:05'),
(3, 1, 1, 18.00, 1.00, 'APROVADO', '2026-03-13 15:10:35'),
(4, 2, 6, 12.50, 1.00, 'APROVADO', '2026-03-13 15:11:29'),
(5, 3, 9, 19.90, 1.00, 'APROVADO', '2026-03-13 15:14:37'),
(6, 3, 10, 13.00, 1.00, 'APROVADO', '2026-03-13 15:14:41'),
(7, 3, 5, 13.75, 2.00, 'APROVADO', '2026-03-13 15:14:43'),
(8, 4, 11, 15.50, 1.00, 'APROVADO', '2026-03-13 15:15:29'),
(9, 5, 7, 14.00, 1.00, 'APROVADO', '2026-03-13 15:17:46'),
(10, 5, 9, 19.90, 1.00, 'APROVADO', '2026-03-13 15:17:49'),
(11, 5, 5, 13.75, 2.00, 'APROVADO', '2026-03-13 15:17:52'),
(12, 7, 10, 13.00, 3.00, 'APROVADO', '2026-03-13 15:18:55');

-- --------------------------------------------------------

--
-- Estrutura para tabela `tbl_materia_prima`
--

CREATE TABLE `tbl_materia_prima` (
  `id_materia_prima` int(11) NOT NULL,
  `id_fornecedor` int(11) NOT NULL,
  `nome_materia_prima` varchar(30) NOT NULL,
  `unid_med_materia_prima` varchar(2) NOT NULL,
  `qtde_atual_materia_prima` double(10,3) NOT NULL,
  `criado_em_materia_prima` datetime NOT NULL DEFAULT current_timestamp(),
  `atualizado_em_materia_prima` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `tbl_materia_prima`
--

INSERT INTO `tbl_materia_prima` (`id_materia_prima`, `id_fornecedor`, `nome_materia_prima`, `unid_med_materia_prima`, `qtde_atual_materia_prima`, `criado_em_materia_prima`, `atualizado_em_materia_prima`) VALUES
(1, 1, 'Farinha de Trigo', 'KG', 25.000, '2026-03-12 18:30:15', '2026-03-12 18:30:15'),
(2, 1, 'Açúcar Refinado', 'KG', 18.000, '2026-03-12 18:36:22', '2026-03-12 18:36:22'),
(3, 5, 'Chocolate em Barra', 'KG', 12.000, '2026-03-12 18:43:40', '2026-03-12 18:43:40'),
(4, 2, 'Leite Condensado', 'UN', 40.000, '2026-03-12 18:49:55', '2026-03-12 18:49:55'),
(5, 2, 'Creme de Leite', 'UN', 30.000, '2026-03-12 18:56:10', '2026-03-12 18:56:10'),
(6, 4, 'Morango', 'KG', 10.000, '2026-03-12 19:02:30', '2026-03-12 19:02:30'),
(7, 1, 'Ovos', 'UN', 120.000, '2026-03-12 19:09:18', '2026-03-12 19:09:18'),
(8, 1, 'Café em Pó', 'KG', 8.000, '2026-03-12 19:15:45', '2026-03-12 19:15:45'),
(9, 3, 'Caixas para Doces', 'UN', 60.000, '2026-03-12 19:22:12', '2026-03-12 19:22:12'),
(10, 2, 'Manteiga', 'KG', 9.000, '2026-03-12 19:28:50', '2026-03-12 19:28:50');

-- --------------------------------------------------------

--
-- Estrutura para tabela `tbl_produtos`
--

CREATE TABLE `tbl_produtos` (
  `id_produto` int(11) NOT NULL,
  `id_categoria` int(11) NOT NULL,
  `nome_produto` varchar(30) NOT NULL,
  `descricao_produto` text NOT NULL,
  `tamanho_produto` varchar(10) NOT NULL,
  `unid_medida_produto` varchar(2) NOT NULL,
  `valor_produto` double(10,2) NOT NULL,
  `foto_produto` varchar(60) NOT NULL,
  `status_produto` varchar(10) NOT NULL DEFAULT 'ATIVO',
  `criado_em_produto` datetime NOT NULL DEFAULT current_timestamp(),
  `atualizado_em_produto` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `tbl_produtos`
--

INSERT INTO `tbl_produtos` (`id_produto`, `id_categoria`, `nome_produto`, `descricao_produto`, `tamanho_produto`, `unid_medida_produto`, `valor_produto`, `foto_produto`, `status_produto`, `criado_em_produto`, `atualizado_em_produto`) VALUES
(1, 2, 'Brigadeiro Gourmet', '6 brigadeiros sortidos', 'Médio', 'CX', 18.00, 'produto/brigadeiro-gourmet-(6un)', 'ATIVO', '2026-03-10 08:51:19', '2026-03-10 09:05:10'),
(4, 1, 'Bolo de Cenoura (Fatia)', 'Fatia com cobertura de chocolate belga', 'Pequeno', 'FT', 23.00, 'produto/bolo-de-cenoura-(fatia)', 'ATIVO', '2026-03-10 09:19:33', '2026-03-10 09:19:33'),
(5, 3, 'Capuccino 300ml', 'Capuccino cremoso', 'Grande', 'ML', 13.75, 'produto/capuccino-300ml', 'ATIVO', '2026-03-10 09:24:16', '2026-03-10 09:24:16'),
(6, 1, 'Bolo de Chocolate Fatia', 'Fatia de bolo de chocolate com cobertura', 'Médio', 'FT', 12.50, 'produto/bolo-de-chocolate-fatia.png', 'ATIVO', '2026-03-12 17:20:05', '2026-03-12 17:20:05'),
(7, 1, 'Bolo Red Velvet Fatia', 'Fatia de bolo red velvet com cream cheese', 'Grande', 'FT', 14.00, 'produto/bolo-red-velvet-fatia.png', 'ATIVO', '2026-03-12 17:26:15', '2026-03-12 17:26:15'),
(8, 2, 'Beijinho Gourmet', 'Beijinho gourmet tradicional', 'Pequeno', 'UN', 3.50, 'produto/beijinho-gourmet.png', 'ATIVO', '2026-03-12 17:33:40', '2026-03-12 17:33:40'),
(9, 2, 'Caixa com 6 Doces Finos', 'Caixa com 6 doces finos variados', 'Médio', 'CX', 19.90, 'produto/caixa-com-6-doces-finos.png', 'ATIVO', '2026-03-12 17:39:22', '2026-03-12 17:39:22'),
(10, 4, 'Torta de Limão Fatia', 'Fatia de torta de limão', 'Pequeno', 'FT', 13.00, 'produto/torta-de-limao-fatia.png', 'ATIVO', '2026-03-12 17:46:10', '2026-03-12 17:46:10'),
(11, 4, 'Cheesecake de Frutas Vermelhas', 'Pedaço de cheesecake com frutas vermelhas', 'Grande', 'UN', 15.50, 'produto/cheesecake-de-frutas-vermelhas.png', 'ATIVO', '2026-03-12 17:52:45', '2026-03-12 17:52:45'),
(12, 3, 'Café Expresso 80ml', 'Café expresso tradicional', 'Pequeno', 'ML', 6.00, 'produto/cafe-expresso.png', 'ATIVO', '2026-03-12 17:59:18', '2026-03-12 17:59:18'),
(13, 3, 'Cappuccino 600ml', 'Cappuccino cremoso servido quente', 'Grande', 'ML', 10.50, 'produto/cappuccino-cremoso.png', 'ATIVO', '2026-03-12 18:05:30', '2026-03-12 18:05:30'),
(14, 5, 'Kit Presente Doce', 'Kit com mini bolo e doces especiais', 'Grande', 'UN', 49.90, 'produto/kit-presente-doce.png', 'INATIVO', '2026-03-12 18:12:55', '2026-03-12 18:12:55'),
(15, 1, 'Bolo de Cenoura Mini', 'Mini bolo de cenoura com cobertura de chocolate', 'Pequeno', 'UN', 18.00, 'produto/mini-bolo-de-cenoura.png', 'ATIVO', '2026-03-12 18:18:40', '2026-03-12 18:18:40');

-- --------------------------------------------------------

--
-- Estrutura para tabela `tbl_usuarios`
--

CREATE TABLE `tbl_usuarios` (
  `id_usuario` int(11) NOT NULL,
  `nome_usuario` varchar(50) NOT NULL,
  `email_usuario` varchar(80) NOT NULL,
  `senha_usuario` varchar(255) NOT NULL,
  `perfil_usuario` varchar(13) NOT NULL,
  `foto_usuario` varchar(30) NOT NULL,
  `status_usuario` varchar(10) NOT NULL,
  `criado_em_usuario` datetime NOT NULL DEFAULT current_timestamp(),
  `atualizado_em_usuario` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `tbl_usuarios`
--

INSERT INTO `tbl_usuarios` (`id_usuario`, `nome_usuario`, `email_usuario`, `senha_usuario`, `perfil_usuario`, `foto_usuario`, `status_usuario`, `criado_em_usuario`, `atualizado_em_usuario`) VALUES
(1, 'Roberto Souza', 'roberto.atend@davilla.com.br', 'senha123', 'ATENDENTE', 'usuario/roberto-souza.png', 'ATIVO', '2026-03-10 09:58:36', '2026-03-10 09:58:36'),
(2, 'Ana Caixa', 'ana.atend@davilla.com', '123456', 'ATENDENTE', 'usuario/ana-caixa.jpg', 'ATIVO', '2026-03-12 15:56:53', '2026-03-12 15:56:53'),
(3, 'Beatriz Vendas', 'beatriz.atend@davilla.com', '123456', 'ATENDENTE', 'usuario/beatriz-vendas.jpg', 'ATIVO', '2026-03-12 16:27:12', '2026-03-12 16:27:12'),
(4, 'Carlos Gerente', 'carlos.gerend@davilla.com', '123456', 'GERENTE', 'usuario/carlos-gerente.jpg', 'ATIVO', '2026-03-12 16:28:46', '2026-03-12 16:28:46'),
(5, 'Daniela Admin', 'daniela.admind@davilla.com', '123456', 'ADMIN', 'usuario/daniela-admin.jpg', 'ATIVO', '2026-03-12 16:30:36', '2026-03-12 16:30:36'),
(6, 'Eduardo Produção', 'eduardo.confe@davilla.com', '123456', 'CONFEITEIRO', 'usuario/eduardo-producao.jpg', 'INATIVO', '2026-03-12 16:32:00', '2026-03-12 16:32:00');

-- --------------------------------------------------------

--
-- Estrutura para tabela `tbl_vendas`
--

CREATE TABLE `tbl_vendas` (
  `id_venda` int(11) NOT NULL,
  `id_cliente` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `data_venda` datetime NOT NULL DEFAULT current_timestamp(),
  `valor_venda` double(10,2) NOT NULL,
  `status_venda` varchar(12) NOT NULL DEFAULT 'EM ANDAMENTO',
  `data_entrega_venda` datetime DEFAULT NULL,
  `atualizado_em_venda` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `tbl_vendas`
--

INSERT INTO `tbl_vendas` (`id_venda`, `id_cliente`, `id_usuario`, `data_venda`, `valor_venda`, `status_venda`, `data_entrega_venda`, `atualizado_em_venda`) VALUES
(1, 1, 1, '2026-03-13 14:42:31', 77.75, 'FINALIZADA', '2026-03-05 15:30:00', '2026-03-13 15:10:40'),
(2, 2, 2, '2026-03-12 19:40:15', 12.50, 'FINALIZADA', '2026-03-05 16:00:00', '2026-03-13 15:11:39'),
(3, 3, 1, '2026-03-12 19:46:22', 60.40, 'FINALIZADA', '2026-03-06 10:00:00', '2026-03-13 15:14:48'),
(4, 4, 3, '2026-03-12 19:53:40', 15.50, 'FINALIZADA', '2026-03-07 18:30:00', '2026-03-19 10:52:14'),
(5, 5, 2, '2026-03-12 19:59:55', 61.40, 'FINALIZADA', '2026-03-07 14:00:00', '2026-03-13 15:17:55'),
(6, 6, 1, '2026-03-12 20:06:10', 0.00, 'CANCELADA', '2026-03-07 16:20:00', '2026-03-12 20:06:10'),
(7, 7, 4, '2026-03-12 20:12:30', 39.00, 'FINALIZADA', '2026-03-08 11:00:00', '2026-03-13 15:19:09'),
(8, 8, 2, '2026-03-12 20:19:45', 0.00, 'EM ANDAMENTO', '2026-03-08 17:00:00', '2026-03-12 20:19:45');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `tbl_banner`
--
ALTER TABLE `tbl_banner`
  ADD PRIMARY KEY (`id_banner`);

--
-- Índices de tabela `tbl_categorias`
--
ALTER TABLE `tbl_categorias`
  ADD PRIMARY KEY (`id_categoria`);

--
-- Índices de tabela `tbl_clientes`
--
ALTER TABLE `tbl_clientes`
  ADD PRIMARY KEY (`id_cliente`),
  ADD UNIQUE KEY `cpf_cnpj_cliente` (`cpf_cnpj_cliente`),
  ADD UNIQUE KEY `email_cliente` (`email_cliente`);

--
-- Índices de tabela `tbl_contato`
--
ALTER TABLE `tbl_contato`
  ADD PRIMARY KEY (`id_contato`);

--
-- Índices de tabela `tbl_controle_materia_prima`
--
ALTER TABLE `tbl_controle_materia_prima`
  ADD PRIMARY KEY (`id_controle`),
  ADD KEY `fk_controle_materia_prima_materiaprima` (`id_materia_prima`);

--
-- Índices de tabela `tbl_fornecedores`
--
ALTER TABLE `tbl_fornecedores`
  ADD PRIMARY KEY (`id_fornecedor`),
  ADD UNIQUE KEY `email_fornecedor` (`email_fornecedor`);

--
-- Índices de tabela `tbl_itens_venda`
--
ALTER TABLE `tbl_itens_venda`
  ADD PRIMARY KEY (`id_item`),
  ADD KEY `fk_intens_venda_venda` (`id_venda`),
  ADD KEY `fk_intens_venda_produto` (`id_produto`);

--
-- Índices de tabela `tbl_materia_prima`
--
ALTER TABLE `tbl_materia_prima`
  ADD PRIMARY KEY (`id_materia_prima`),
  ADD KEY `fk_materia_prima_fornecedor` (`id_fornecedor`);

--
-- Índices de tabela `tbl_produtos`
--
ALTER TABLE `tbl_produtos`
  ADD PRIMARY KEY (`id_produto`),
  ADD KEY `fk_produtos_categorias` (`id_categoria`);

--
-- Índices de tabela `tbl_usuarios`
--
ALTER TABLE `tbl_usuarios`
  ADD PRIMARY KEY (`id_usuario`),
  ADD UNIQUE KEY `email_usuario` (`email_usuario`);

--
-- Índices de tabela `tbl_vendas`
--
ALTER TABLE `tbl_vendas`
  ADD PRIMARY KEY (`id_venda`),
  ADD KEY `fk_vendas_clientes` (`id_cliente`),
  ADD KEY `fk_vendas_usuarios` (`id_usuario`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `tbl_banner`
--
ALTER TABLE `tbl_banner`
  MODIFY `id_banner` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de tabela `tbl_categorias`
--
ALTER TABLE `tbl_categorias`
  MODIFY `id_categoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `tbl_clientes`
--
ALTER TABLE `tbl_clientes`
  MODIFY `id_cliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de tabela `tbl_contato`
--
ALTER TABLE `tbl_contato`
  MODIFY `id_contato` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de tabela `tbl_controle_materia_prima`
--
ALTER TABLE `tbl_controle_materia_prima`
  MODIFY `id_controle` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de tabela `tbl_fornecedores`
--
ALTER TABLE `tbl_fornecedores`
  MODIFY `id_fornecedor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `tbl_itens_venda`
--
ALTER TABLE `tbl_itens_venda`
  MODIFY `id_item` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de tabela `tbl_materia_prima`
--
ALTER TABLE `tbl_materia_prima`
  MODIFY `id_materia_prima` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de tabela `tbl_produtos`
--
ALTER TABLE `tbl_produtos`
  MODIFY `id_produto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de tabela `tbl_usuarios`
--
ALTER TABLE `tbl_usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `tbl_vendas`
--
ALTER TABLE `tbl_vendas`
  MODIFY `id_venda` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `tbl_controle_materia_prima`
--
ALTER TABLE `tbl_controle_materia_prima`
  ADD CONSTRAINT `fk_controle_materia_prima_materiaprima` FOREIGN KEY (`id_materia_prima`) REFERENCES `tbl_materia_prima` (`id_materia_prima`);

--
-- Restrições para tabelas `tbl_itens_venda`
--
ALTER TABLE `tbl_itens_venda`
  ADD CONSTRAINT `fk_intens_venda_produto` FOREIGN KEY (`id_produto`) REFERENCES `tbl_produtos` (`id_produto`),
  ADD CONSTRAINT `fk_intens_venda_venda` FOREIGN KEY (`id_venda`) REFERENCES `tbl_vendas` (`id_venda`);

--
-- Restrições para tabelas `tbl_materia_prima`
--
ALTER TABLE `tbl_materia_prima`
  ADD CONSTRAINT `fk_materia_prima_fornecedor` FOREIGN KEY (`id_fornecedor`) REFERENCES `tbl_fornecedores` (`id_fornecedor`);

--
-- Restrições para tabelas `tbl_produtos`
--
ALTER TABLE `tbl_produtos`
  ADD CONSTRAINT `fk_produtos_categorias` FOREIGN KEY (`id_categoria`) REFERENCES `tbl_categorias` (`id_categoria`);

--
-- Restrições para tabelas `tbl_vendas`
--
ALTER TABLE `tbl_vendas`
  ADD CONSTRAINT `fk_vendas_clientes` FOREIGN KEY (`id_cliente`) REFERENCES `tbl_clientes` (`id_cliente`),
  ADD CONSTRAINT `fk_vendas_usuarios` FOREIGN KEY (`id_usuario`) REFERENCES `tbl_usuarios` (`id_usuario`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
