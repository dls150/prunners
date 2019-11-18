--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`id`, `email`, `senha`, `permissao`) VALUES
(1, 'teste@teste.com.br', '698dc19d489c4e4db73e28a713eab07b', 'A');
--
-- Extraindo dados da tabela `atleta`
--
-- --------------------------------------------------------

INSERT INTO `atleta` (`idatleta`, `nome`, `idequipe`, `idcategoria`, `documento`, `infoadicionais`) VALUES
(1, 'Atleta 1', 1, 12, '95262849', 'telefone 1234-5678 e mais observacoes'),
(2, 'Atleta 2', 1, 10, '78747249', 'responsavel legal Pai'),
(3, 'Atleta 3', 1, 13, '10224520', 'telefone 0987-6543'),
(4, 'Atleta 4', 1, 13, '12390485', 'sem obs'),
(5, 'Atleta 5', 2, 10, '60705040', 'responsavel legal avó categoria kids 10 anos ');

--
-- Extraindo dados da tabela `categoria`
--

INSERT INTO `categoria` (`idcategoria`, `categoria`) VALUES
(1, 'Categoria Kids'),
(2, '16/19 anos (2000/2003) - M/F'),
(3, '20/24 anos (1995/1999) - M/F'),
(4, '25/29 anos (1990/1994) - M/F'),
(5, '30/34 anos (1985/1989) - M/F'),
(6, '40/44 anos (1975/1979) - M/F'),
(7, '45/49 anos (1970/1974) - M/F'),
(8, '50/54 anos (1965/1969) - M/F'),
(9, '55/59 anos (1960/1964) - M/F');
--
-- Extraindo dados da tabela `estado`
--
INSERT INTO `estado` (`idestado`, `nome`, `uf`) VALUES
(1, 'Rio Grande do Sul', 'RS');
--
-- Extraindo dados da tabela `cidade`
--
INSERT INTO `cidade` (`idcidade`, `nome`, `idestado`) VALUES
(1, 'Soledade', 1),
(2, 'Erechim', 1);

-- --------------------------------------------------------

--
-- Extraindo dados da tabela `corrida`
--

INSERT INTO `corrida` (`idcorrida`, `nomecorrida`, `data`, `kilometragem`, `regiao`, `infoadicionais`) VALUES
(1, 'RÃºstica Ong Amor 2019', '2019-06-16', '5 km', 'Passo Fundo', 'Corrida da Imed > Ong Amor'),
(2, 'Primeira Etapa Corrida de Rua de Passo Fundo 2019', '2019-07-24', '5 km', 'Passo Fundo', '1Â° etapa de 2019 - adultos'),
(3, 'Circuito SESC Passo Fundo', '2019-07-12', '6 km', 'Passo Fundo', 'Ver no site'),
(4, 'Meia Maratona de Passo Fundo', '2019-08-04', '21km', 'Passo Fundo', 'Percurso completo 21 km, + circuito de 5 km'),
(5, 'Segunda Rustica das CrianÃ§as FASURGS', '2019-10-06', '3 km', 'Passo Fundo', 'Rustica da FASURGS');

-- --------------------------------------------------------

--
-- Extraindo dados da tabela `equipe`
--

INSERT INTO `equipe` (`idequipe`, `equipe`) VALUES
(1, 'No Mercy Runners'),
(2, 'Equipe Kids');

--
-- Extraindo dados da tabela `evento`
--

INSERT INTO `evento` (`idevento`, `idatleta`, `idcorrida`) VALUES
(1, 1, 1),
(2, 1, 4);
(3, 2, 4);
(4, 3, 4);
(5, 4, 5);
(6, 5, 3);
