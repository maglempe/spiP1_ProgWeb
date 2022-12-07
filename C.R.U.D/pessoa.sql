-- --------------------------------------------------------

--
-- Estrutura da tabela `pessoa`
--

CREATE TABLE `pessoa` (
  `id` int(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  `nome` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `cpf` varchar(35) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(40) COLLATE utf8_unicode_ci NOT NULL
  
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
