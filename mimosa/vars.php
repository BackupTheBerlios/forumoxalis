<?php

// Informations propres � la base de donn�es
$mysql_server                           = "localhost";
$mysql_login                            = "";
$mysql_pass                             = "";
$mysql_db                               = ""; // Base de donn�es
$mysql_table                            = "forumoxalis"; // "forumoxalis" est la table par d�faut


$sujets_par_page                        = 15; // nombre de sujets par page
$reponses_par_page                      = 10; // nombre de r�ponses par page

// taille maximum des champs
$taille_max_titre                       = 60; // En caract�res
$taille_max_nom                         = 25;

// Para-SPAM @ . -
$remplacer_at_par                       = "_CHEZ_"; // On remplace @ par une cha�ne d�finie
$remplacer_point_par                    = "_POINT_";
$remplacer_tiret_par                    = "_TIRET_";

//Modules
$module_administration                  = true; //true : activ�, false : d�sactiv�
$module_administration_pass             = $mysql_pass; // d�finition du mot de passe


//Affichage du memo de mise en page
$afficher_memo				= 1; // 1 : oui // 0 : non (ne pas le mettre entre guillemets)
$memo					= "<table class='memo'><tr><td>" .
						"<strong>M�mo de mise en page :</strong><br><br>" .
						"&lt;b&gt;<strong>Gras</strong>&lt;/b&gt;<br>" .
						"&lt;i&gt;<em>Italique</em>&lt;/i&gt;<br>" .
						"<pre>&lt;pre&gt;Code&lt;/pre&gt;</pre></td><td>" .
						"<strong>Liens :</strong><br><br>[url]http://forumoxalis.ehol.org[/url]<br>" .
						"&gt; <a href=\"http://forumoxalis.ehol.org\">http://forumoxalis.ehol.org</a><br>" .
						"[url=http://forumoxalis.ehol.org]LE Forum (l�ger et performant)[/url]<br>" .
						"&gt; <a href=\"http://forumoxalis.ehol.org\">LE Forum (l�ger et performant)</a>" .
						"</td></tr></table>";

// Partie affichant les liens : Revenir � la liste des sujets - Rechercher
// Le lien Administration se trouve dans forum.php et ne s'affiche que si le module est activ�
$liens = "<a href='?action=sujet'>Revenir � la liste des sujets</a> -	<a href='?action=recherche'>Rechercher</a>";

// Ce mode permet d'�viter que de nouveaux messages soient ajout�s � la BDD
// C'est � dire qu'il cache le formulaire et interdit l'utilisation de la
// fonction d'enregistrement
$geler_enregistrement		= 0; // 1 : oui --- 0 : non
$geler_enregistrement_phrase	= "<div class='information'>Le forum �tant en maintenance vous ne pouvez poster de messages pour le moment.<br>Nous nous excusons de cette g�ne temporaire.</div>";



$version                                = "0.1.2"; // PAS TOUCHE !
$footer                                 = "<hr>Page g�n�r�e par <a href='http://forumoxalis.ehol.org'>Forum Oxalis $version</a> conform�ment aux recommandations du <a href='http://w3.org'>W3C</a> - <a href='http://validator.w3.org/check/referer'>HTML 4.01</a> et <a href='http://jigsaw.w3.org/css-validator/'>CSS</a><br>Programme diffus� sous licence libre : <a href='http://www.gnu.org/licenses/gpl.html'>GPL</a>. Copyright 2003 <a href='mailto:forumoxalis_CHEZ_ehol_POINT_org'>MM</a>.";

// On se connecte � la BDD (ne pas toucher !)
mysql_connect($mysql_server,$mysql_login,$mysql_pass);
mysql_select_db($mysql_db);
?>
