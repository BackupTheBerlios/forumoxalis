<?php

// Informations propres à la base de données
$mysql_server      = "localhost";
$mysql_login       = "";
$mysql_pass        = "";
$mysql_db          = ""; // Base de données
$mysql_table       = "forumoxalis"; // "forumoxalis" est la table par défaut


$sujets_par_page   = 15; // nombre de sujets par page
$reponses_par_page = 10; // nombre de réponses par page

// taille maximum des champs
$taille_max_titre  = 50; // En caractères
$taille_max_nom    = 20;

// Para-SPAM @ . -
$remplacer_at_par    = "_CHEZ_"; // On remplace @ par une chaîne définie
$remplacer_point_par = "_POINT_";
$remplacer_tiret_par = "_TIRET_";

//Affichage du memo de mise en page
$afficher_memo     = 1; // 1 : oui --- 0 : non (ne pas le mettre entre guillemets)
$memo              = "<table class='memo'><tr><td>" .
                     "<strong>Mémo de mise en page :</strong><br><br>" .
                     "&lt;b&gt;<strong>Gras</strong>&lt;/b&gt;<br>" .
                     "&lt;i&gt;<em>Italique</em>&lt;/i&gt;<br>" .
                     "<pre>&lt;pre&gt;Code&lt;/pre&gt;</pre></td><td>" .
                     "<strong>Liens :</strong><br><br>[url]http://forumoxalis.ehol.org[/url]<br>" .
                     "&gt; <a href=\"http://forumoxalis.ehol.org\">http://forumoxalis.ehol.org</a><br>" .
                     "[url=http://forumoxalis.ehol.org]LE Forum (léger et performant)[/url]<br>" .
                     "&gt; <a href=\"http://forumoxalis.ehol.org\">LE Forum (léger et performant)</a>" .
                     "</td></tr></table>";

// Ce mode permet d'éviter que de nouveaux messages soient ajouté à la BDD
// C'est à dire qu'il cache le formulaire et interdit l'utilisation de la
// fonction d'enregistrement
$mode_administration = 0; // 1 : oui --- 0 : non
$mode_administration_phrase = "<div class='centrage'>Le forum étant en maintenance vous ne pouvez poster de messages pour le moment.<br>Nous nous excusons de cette gêne temporaire.</div>";

$version           = "0.1.1"; // PAS TOUCHE !
$footer            = "<hr>Page générée par <a href='http://forumoxalis.ehol.org'>Forum Oxalis $version</a> conformément aux recommandations du <a href='http://w3.org'>W3C</a> - <a href='http://validator.w3.org/check/referer'>HTML 4.01</a> et <a href='http://jigsaw.w3.org/css-validator/'>CSS</a><br>Programme diffusé sous licence libre : <a href='http://www.gnu.org/licenses/gpl.html'>GPL</a>. Copyright 2003 <a href='forumoxalis_CHEZ_ehol_POINT_org'>MM</a>.";


// On se connecte à la BDD (ne pas toucher !)
mysql_connect($mysql_server,$mysql_login,$mysql_pass);
mysql_select_db($mysql_db);
?>
