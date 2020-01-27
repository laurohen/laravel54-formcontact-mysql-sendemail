#
# Structure for table "lista_form_contatos"
#

DROP TABLE IF EXISTS `lista_form_contatos`;
CREATE TABLE `lista_form_contatos` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `telefone` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mensagem` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `url_file` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ip_user` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `data` date DEFAULT NULL,
  `hora` time DEFAULT NULL,
  `updated_at` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=0 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
