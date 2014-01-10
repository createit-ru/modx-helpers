-- запрос удаляет таблицу modx_session и создает новую
-- используется при невозможности входа в админку после сбоя в работе mysql


DROP TABLE IF EXISTS `modx_session`;
CREATE TABLE IF NOT EXISTS `modx_session` (
  `id` varchar(255) NOT NULL DEFAULT '',
  `access` int(20) unsigned NOT NULL,
  `data` mediumtext,
  PRIMARY KEY (`id`),
  KEY `access` (`access`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
