<?php
/* ForumOxalis 0.1.2 -- 30/11/2003 */

include "../vars.php";

mysql_query("

#
# Structure de la table `forumoxalis`
#

CREATE TABLE `forumoxalis` (
  `id` int(11) unsigned NOT NULL auto_increment,
  `nom` varchar(255) NOT NULL default '',
  `email` varchar(255) NOT NULL default '',
  `date` datetime NOT NULL default '0000-00-00 00:00:00',
  `texte` text NOT NULL,
  `reponse_a_id` int(11) unsigned NOT NULL default '0',
  `titre` varchar(255) NOT NULL default '- pas de titre -',
  `derniereReponse` datetime NOT NULL default '0000-00-00 00:00:00',
  `md5` varchar(50) NOT NULL default '',
  PRIMARY KEY  (`id`),
  KEY `reponse_a_id` (`reponse_a_id`),
  KEY `derniereReponse` (`derniereReponse`)
) TYPE=MyISAM;

) or die("<b>Impossible de creer la table</b><br>Ceci est surement du a une
mauvaise configuration de votre part... Verifiez le fichier vars.php.");?>
