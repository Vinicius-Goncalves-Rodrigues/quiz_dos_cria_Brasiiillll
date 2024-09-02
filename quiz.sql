-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 02/09/2024 às 13:26
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
-- Banco de dados: `meubrasilbrasileiro`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `quiz`
--

CREATE TABLE `quiz` (
  `id` int(11) NOT NULL,
  `tipo` varchar(9) NOT NULL,
  `texto_pergunta` text DEFAULT NULL,
  `resposta_certa` varchar(1) DEFAULT NULL,
  `opcao_1` varchar(255) DEFAULT NULL,
  `opcao_2` varchar(255) DEFAULT NULL,
  `opcao_3` varchar(255) DEFAULT NULL,
  `opcao_4` varchar(255) DEFAULT NULL,
  `total_perguntas` int(11) DEFAULT NULL,
  `pergunta_atual_id` int(11) DEFAULT NULL,
  `pontuacao_time_1` int(11) DEFAULT NULL,
  `pontuacao_time_2` int(11) DEFAULT NULL,
  `perguntas_restantes` text DEFAULT NULL,
  `vencedor` varchar(255) DEFAULT NULL,
  `pontuacao_final_time_1` int(11) DEFAULT NULL,
  `pontuacao_final_time_2` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Despejando dados para a tabela `quiz`
--

INSERT INTO `quiz` (`tipo`, `texto_pergunta`, `resposta_certa`, `opcao_1`, `opcao_2`, `opcao_3`, `opcao_4`) VALUES
('pergunta', 'Qual é a famosa sobremesa brasileira feita de leite condensado, chocolate e manteiga?', 'B', 'Pudim  ', 'Brigadeiro  ', 'Churros  ', 'Bolo de Rolo'),
('pergunta', 'Qual é a cidade brasileira conhecida como a \"Capital Nacional do Rodeio\"?', 'B', 'Salvador  ', 'Barretos', 'Goiânia', 'Campo Grande'),
('pergunta', 'Quem é a escritora brasileira autora de \"A Hora da Estrela\"?', 'B', 'Rachel de Queiroz  ', 'Clarice Lispector  ', 'Cecília Meireles  ', 'Lygia Fagundes Telles'),
('pergunta', 'Qual é a principal bebida alcoólica utilizada na caipirinha?', 'B', 'Vodka', 'Cachaça', 'Rum', 'Gin'),
('pergunta', 'Qual é o evento literário mais importante do Brasil, realizado em Paraty?', 'B', 'Bienal do Livro  ', 'FLIP (Festa Literária Internacional de Paraty)  ', 'Salão do Livro ', 'Feira do Livro de Porto Alegre'),
('pergunta', 'Qual é a cidade conhecida como \"Veneza Brasileira\"?', 'C', 'Salvador', 'Florianópolis', 'Recife', 'Manaus'),
('pergunta', 'Qual é o nome do famoso biscoito/cookie brasileiro?', 'C', 'Pão de queijo', 'Casadinho', 'Biscoito de polvilho  ', 'Pastel de nata'),
('pergunta', 'Quem é o compositor da música \"Garota de Ipanema\"?', 'A', 'Tom Jobim  ', 'Caetano Veloso  ', 'Chico Buarque  ', 'Gilberto Gil'),
('pergunta', 'Qual é o movimento artístico brasileiro conhecido por suas cores vibrantes e formas abstratas?', 'C', 'Barroco', 'Modernismo', 'Concretismo', 'Tropicalismo'),
('pergunta', 'Qual é o nome do parque nacional brasileiro famoso por suas formações rochosas em chapadas?', 'B', 'Parque Nacional do Itatiaia  ', 'Parque Nacional da Chapada Diamantina  ', 'Parque Nacional do Iguaçu  ', 'Parque Nacional de Jericoacoara'),
('pergunta', 'Qual é o famoso arquiteto responsável pelo projeto de Brasília?', 'A', 'Oscar Niemeyer  ', 'Lúcio Costa  ', 'Paulo Mendes da Rocha  ', 'Roberto Burle Marx'),
('pergunta', 'Qual é o estilo musical que mistura rock com música popular brasileira e foi popular nos anos 1980?', 'A', 'Axé', 'Tropicália ', 'Bossa Nova  ', 'Rock Nacional'),
('pergunta', 'Qual é o nome do famoso festival de folclore realizado em Parintins?', 'D', 'Carnaval', 'São João  ', 'Bumba Meu Boi  ', 'Festival de Parintins'),
('pergunta', 'Qual é a dançarina brasileira que ficou famosa no exterior como \"Carmen Miranda\"?', 'C', 'Maria Rita  ', 'Elza Soares  ', 'Carmem Miranda  ', 'Anitta'),
('pergunta', 'Qual é o nome do popular ritmo musical da região Nordeste do Brasil, conhecido por sua batida rápida?', 'C', 'Maracatu', 'Forró', 'Frevo', 'Axé'),
('pergunta', 'Qual é a música mais famosa da banda Legião Urbana?', 'B', 'Tempo Perdido  ', 'Faroeste Caboclo  ', 'Pais e Filhos  ', 'Que País é Este?'),
('pergunta', 'Qual é o nome do famoso escritor brasileiro que escreveu \"O Alquimista\"?', 'C', 'Machado de Assis  ', 'Jorge Amado  ', 'Paulo Coelho  ', 'Carlos Drummond de Andrade'),
('pergunta', 'Qual é o nome do famoso doce brasileiro feito com coco e leite condensado?', 'B', 'Quindim  ', 'Cocada', 'Beijinho', 'Manjar'),
('pergunta', 'Quem é a artista visual brasileira conhecida por suas esculturas de formas alongadas?', 'C', 'Lygia Clark  ', 'Tarsila do Amaral  ', 'Maria Martins  ', 'Ana Maria Pacheco'),
('pergunta', 'Qual é o estado brasileiro famoso por suas cachoeiras e pelo turismo de aventura?', 'B', 'Espírito Santo  ', 'Mato Grosso do Sul  ', 'Goiás', 'Minas Gerais'),
('pergunta', 'Quem foi o arquiteto responsável pela construção de Brasília?', 'A', 'OSCAR NIEMEYER ', 'JUSCELINO KUBITSCHEK ', 'MACHADO DE ASSIS ', 'DOM PEDRO 1 '),
('pergunta', ' Qual é o prato típico mais famoso do Brasil?', 'B', 'Tacos ', 'Feijoada', 'Sushi  ', 'Paella'),
('pergunta', 'Qual é o ritmo musical que se originou no Rio de Janeiro?', 'C', 'Tango  ', 'Flamenco  ', 'Samba  ', 'Reggae'),
('pergunta', 'Qual é a maior festa popular do Brasil?', 'C', 'Oktoberfest  ', 'Festa Junina  ', 'Carnaval  ', 'Natal'),
('pergunta', 'Qual é o feriado brasileiro que celebra a independência do Brasil?', 'A', '7 de setembro  ', ' 12 de outubro  ', '15 de novembro  ', '25 de dezembro'),
('pergunta', 'Qual é a língua oficial do Brasil?', 'D', ' Espanhol ', 'Inglês  ', 'Francês  ', 'Português'),
('pergunta', 'Qual é a cidade conhecida como a \"Capital Nacional do Forró\"?', 'C', 'Recife  ', 'Salvador  ', 'Campina Grande  ', 'Fortaleza'),
('pergunta', 'Quem é considerado o \"Rei do Futebol\" no Brasil?', 'C', 'Maradona  ', 'Messi  ', 'Pelé  ', 'Zico'),
('pergunta', 'Qual é o instrumento principal na música Bossa Nova?', 'D', 'Violino  ', 'Guitarra elétrica  ', 'Flauta  ', 'Violão'),
('pergunta', 'Qual é a dança folclórica típica da região nordeste do Brasil?', 'C', 'Flamenco  ', 'Valsa  ', 'Frevo  ', 'Tango'),
('pergunta', 'Quem é o autor do livro \"Dom Casmurro\"?', 'B', 'Jorge Amado  ', 'Machado de Assis  ', 'Clarice Lispector', 'Graciliano Ramos'),
('pergunta', 'Qual é o maior bioma brasileiro?', 'C', 'Pantanal  ', 'Cerrado  ', 'Amazônia  ', 'Caatinga'),
('pergunta', 'Qual é a capital cultural do Brasil, conhecida por suas praias e vida noturna?', 'C', 'Brasília  ', ' São Paulo  ', 'Rio de Janeiro  ', 'Porto Alegre'),
('pergunta', 'Qual é o estilo arquitetônico predominante em Brasília?', 'C', 'Gótico  ', 'Barroco  ', 'Modernista  ', 'Neoclássico'),
('pergunta', 'Quem é a cantora brasileira conhecida como \"Rainha do Axé\"?', 'B', 'Elis Regina ', 'Ivete Sangalo  ', 'Marisa Monte  ', ' Anitta'),
('pergunta', 'Qual é a data comemorativa que celebra o Dia da Consciência Negra?', 'A', '20 de novembro  ', '21 de abril', '1 de maio ', '7 de setembro'),
('pergunta', 'Qual é o símbolo nacional presente na bandeira do Brasil?', 'B', 'Águia  ', 'Estrela  ', 'Leão  ', 'Cruz'),
('pergunta', 'Qual é a música tema do carnaval que ficou famosa no Brasil e no mundo?', 'B', 'Despacito  ', 'Aquarela do Brasil  ', 'Garota de Ipanema  ', 'Tico-Tico no Fubá'),
('pergunta', 'Qual é o nome da maior festividade junina do Brasil, realizada em Campina Grande?', 'B', 'Festa do Peão  ', 'São João', ' Parintins', 'Bumba Meu Boi'),
('pergunta', ' Quem é a artista brasileira conhecida internacionalmente por sua pintura naif?', 'A', 'Tarsila do Amaral  ', 'Anita Malfatti  ', 'Candido Portinari ', 'Tarsila do Amaral');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `quiz`
--
ALTER TABLE `quiz`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `quiz`
--
ALTER TABLE `quiz`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
