<?php

/*------------------ Listage et affichage des sujets ------------------*/

function lister_sujets($page,$parpage)
{
	global $mysql_table; // la variable est nécessaire pour cette fonction, on la récupère donc
	// on calcule quelles limites doivent être envoyées à MySQL selon la syntaxe :
	// LIMIT 0 , 10 signifie :
	// à partir de l'enregistrement 0 -- afficher 10 résultats

	$limit1 = $page * $parpage - $parpage; //on obtient le nombre à partir duquel on va commencer la recherche

	//$resu = mysql_query("select * from forum where reponse_a_id < 1 order by date desc");
	$resu = mysql_query("SELECT * FROM `$mysql_table` WHERE 1 AND `reponse_a_id` < 1 ORDER BY `derniereReponse` DESC LIMIT $limit1 , $parpage");

	// affichage de la barre de titres du tableau
	echo "<table class='sujets'>\n";
	echo "<tr class='titre'>";
	echo "<td class='colonne-sujet'>Sujet</td>";
	echo "<td>Réponses</td>";
	echo "<td>Auteur</td>";
	echo "<td>Dernière réponse</td>";
	echo "</tr>\n";

	while ($msg = mysql_fetch_row($resu)) {
		// couleur des lignes (il faut alterner pour que ce soit plus lisisble)
		if ( $couleur == 1){$couleur = 0;} else {$couleur = 1;};
		affichage_sujet($msg[0], $msg[1], $msg[2], $msg[3], $msg[4], $msg[5], $msg[6], $msg[7], $couleur);
	};

	echo "</table>\n\n";

	echo "<div class='navigation-par-page'>";
	afficher_navigation_par_page($id, "reponse_a_id < 1", $page, $parpage, "sujet");
	echo "</div>";
};

function affichage_sujet($id, $nom, $email, $date, $texte, $reponse_a_id, $titre, $derniereReponse, $couleur)
{
	global $mysql_table, $taille_max_titre, $taille_max_nom, $module_administration_pass;
	$reponses_pour_sujet = mysql_query("select * from `$mysql_table` where reponse_a_id = $id order by id desc");
	$nombre_reponses_sujet = mysql_num_rows($reponses_pour_sujet);

	//formatage de la date
	$date = date("d/m/Y à H:i", strtotime($derniereReponse));

	// On limite la taille du titre et du du nom
	$titre = substr($titre, 0, $taille_max_titre);
	$nom = substr($nom, 0, $taille_max_nom);

	// on vire l'HTML
	$nom    = str_replace("<","&lt;",$nom);
	$nom    = str_replace(">","&gt;",$nom);
	$titre  = str_replace("<","&lt;",$titre);
	$titre  = str_replace(">","&gt;",$titre);

	if ($_COOKIE["admin"] == md5($module_administration_pass)) $fonctions_admin = "<a href='?admin=effacer1&id=$id'>[-]</a>&nbsp;<a href='?admin=modifier1&id=$id'>[M]</a>&nbsp;";

	// affichage HTML
	echo "<tr class='couleur$couleur'>";
	echo "<td class='colonne-sujet'>$fonctions_admin<a href='?id=$id&amp;action=message'>$titre</a></td>";
	echo "<td>$nombre_reponses_sujet</td>";
	echo "<td>$nom</td>";
	echo "<td>$date</td>";
	echo "</tr>\n";
};


/*------------------ Listage et affichage des messages ------------------*/

function lister_messages($id, $page, $parpage)
{
	global $mysql_table;
	// Affichage du sujet
	$resu = mysql_query("select * from `$mysql_table` where id=$id");
	$nombre_messages = mysql_num_rows($resu);

	$sujet = mysql_fetch_row($resu);

	echo "<div class='detail-des-messages'>";

	affichage_message($sujet[0], $sujet[1], $sujet[2], $sujet[3], $sujet[4], $sujet[5], $sujet[6], $sujet[7], "sujet", $page, $parpage, 0);

	// Affichage des réponses
	$limit1 = $page * $parpage - $parpage;
	$resu = mysql_query("SELECT * FROM `$mysql_table` WHERE 1 AND `reponse_a_id` = $id ORDER BY `date` ASC LIMIT $limit1 , $parpage");

	$nombre_messages = mysql_num_rows($resu);

	if ($nombre_messages < 1) { echo "<div class='information'>pas de réponses pour le moment</div>"; }
		else { echo "<h3>Réponses</h3>";
		while ($msg = mysql_fetch_row($resu)) {
		affichage_message($msg[0], $msg[1], $msg[2], $msg[3], $msg[4], $msg[5], $sujet[6], $msg[7], "message", $page, $parpage, 0);
		};
	};

	echo "<p class='navigation-par-page'>";
	afficher_navigation_par_page($id, "reponse_a_id = $id", $page, $parpage, "message");
	echo "</p>";

	echo "</div>";
};

function affichage_message($id, $nom, $email, $date, $texte, $reponse_a_id, $titre, $derniere_reponse, $type, $page, $parpage, $previsualisation)
{
	global $remplacer_at_par, $remplacer_point_par, $remplacer_tiret_par, $module_administration_pass;

	// Ici on va corriger le bug possible lorsqu'un utilisateur oublie le tag de fermeture
	$texte = ajout_tags_finaux_eventuels($texte);
	if ($_COOKIE["admin"] == md5($module_administration_pass)) $fonctions_admin = "<a href='?admin=effacer1&id=$id'>[-]</a>&nbsp;<a href='?admin=modifier1&id=$id'>[M]</a>&nbsp;";
	// on remplace les & par leur équivalent pour éviter les liens non conformes au w3c
	// la ligne a été retirée car elle va à l'encontre de l'utilisation d'une langue avec d'autres caractères
	// $texte = str_replace("&","&amp;",$texte);

	// On fait en sorte que l'HTML ne soit pas pris en compte
	$texte = str_replace("<","&lt;",$texte);
	$texte = str_replace(">","&gt;",$texte);
	$email = str_replace("<","&lt;",$email);
	$email = str_replace(">","&gt;",$email);
	$titre = str_replace("<","&lt;",$titre);
	$titre = str_replace(">","&gt;",$titre);
	$nom   = str_replace("<","&lt;",$nom);
	$nom   = str_replace(">","&gt;",$nom);

	$texte = str_replace("\n","<br>","$texte"); // On affiche les retours à la ligne façon HTML
	$texte = stripslashes($texte);
	$texte = preg_replace('/\[url\](.+?)\[\/url\]/','<a href="\\1">\\1</a>',$texte); // ne me demandez pas de vous expliquer ce que ça veut dire, merci à yandal de phpscripts-fr.net
	$texte = preg_replace('/\[url=(.+?)\](.+?)\[\/url\]/','<a href='.htmlentities("\\1").">\\2</a>",$texte);

// On restaure certains tags HTML : B (strong) I (em) U PRE
	$texte = str_replace("&lt;b&gt;","<strong>",$texte);
	$texte = str_replace("&lt;/b&gt;","</strong>",$texte);
	$texte = str_replace("&lt;i&gt;","<em>",$texte);
	$texte = str_replace("&lt;/i&gt;","</em>",$texte);
	$texte = str_replace("&lt;pre&gt;","<pre>",$texte);
	$texte = str_replace("&lt;/pre&gt;","</pre>",$texte);

// para-spam taga-didou@moumou.doudou donnera (par défaut) "taga TIRET didou CHEZ moumou POINT doudou"
	$email = str_replace("@",$remplacer_at_par, $email);
	$email = str_replace(".",$remplacer_point_par, $email);
	$email = str_replace("-", $remplacer_tiret_par, $email);

// Si l'email n'est pas nul on met en place le lien
	if ($email != NULL) { $nom = "<a href='mailto:$email?subject=Re:$titre'>$nom</a>"; };

	if ($type == "sujet") { echo "<h2>Sujet : $titre</h2>\n"; };
	echo "<hr>\n";
	echo "<div class='$type'>";
	echo "<div class='ligne-auteur'>$fonctions_admin Auteur : $nom, $date</div>\n";
	echo "<div class='texte'>$texte</div>\n";
	if ($type == "sujet" AND $previsualisation != 1)
	{
		echo "<div class='pages'>";
		afficher_navigation_par_page($id, "reponse_a_id = $id", $page, $parpage, "message");
		echo "</div>";
	};
	echo "</div>";
};

function ajout_tags_finaux_eventuels($texte)
{
// un grand merci à "honolulu" pour la simplification
	$tableau = array("i","pre","b");
	for ($i = 0; $i < count($tableau); $i++){
		$nombre_de_tags_ouverts = substr_count($texte,"<".$tableau[$i].">");
		$nombre_de_tags_fermes = substr_count($texte,"</".$tableau[$i].">");
	if ($nombre_de_tags_ouverts > $nombre_de_tags_fermes)
		{
			for ($nombre_de_tags_ouverts ; $nombre_de_tags_ouverts > $nombre_de_tags_fermes ; $nombre_de_tags_fermes++)
			{ $texte = $texte . "</".$tableau[$i].">"; };
		};
	};
	return $texte;
};

function entree($nom, $email, $titre, $texte, $reponse_a_id)
{
	global $mysql_table, $geler_enregistrement, $geler_enregistrement_phrase;

	// On va éviter que le champ nom et/ou titre reste vide à l'enregistrement
	if ($nom   === "") $nom = "Anonyme";
	if ($titre === "") $titre = "Message sans titre";

	// Analyse des raisons pouvant justifier l'interdiction d'enregistrement
	if ($texte === "") { $ne_pas_enregistrer = 1 ; return 2; };
	if ($geler_enregistrement === 1 ) { $ne_pas_enregistrer = 1; return 3; };

	// Enregistrement
	if ($ne_pas_enregistrer != 1 )
	{
		$md5 = md5($texte . $email . $titre . $nom);

		$query = "select * from `$mysql_table` where md5='$md5' order by derniereReponse desc";
		$res = mysql_query($query);
		if (mysql_num_rows($res) > 0) {
			$msg = mysql_fetch_array($res);
			$oldmsg = strtotime($msg["derniereReponse"]);
			$interval = time() - $oldmsg;
			if ($interval < 300) return -1;
		};

		$date = date('y-m-j G:i:s'); //on met la date du jour

		// On va sauvegarder les données en remplaçant les
		//' par \' par exemple afin d'éviter les problèmes
		$nom   = addslashes($nom);
		$texte = addslashes($texte);
		$email = addslashes($email);

		//$titre = addslashes($titre);
		//on insère les données dans la BDD
		$res = mysql_query("INSERT INTO `$mysql_table` VALUES('','$nom','$email','$date','$texte','$reponse_a_id','$titre','$date', '$md5')");
		if ($res)
		{
			//on met à jour la date de réponse pour le sujet concerné
			mysql_query("UPDATE `$mysql_table` SET `derniereReponse` = '$date' WHERE `id` =  '$reponse_a_id';");
			return 1;
		} else return 0;

	};
};



function afficher_navigation_par_page($id, $condition, $page, $parpage, $type)
{
	global $mysql_table;
	$resu = mysql_query("SELECT * FROM `$mysql_table` WHERE 1 AND $condition");
	$total = mysql_num_rows($resu); // on compte combien d'enregistrements sont concernés
	$nombredepages = (int)($total / $parpage); // on obtient le nombre de pages pleines
	if ($total % $parpage > 0) { $nombredepages++; }; // $nombredepages était égal au nombre de pages PLEINES, il faut ajouter une page si une des pages n'est pas pleine

	if ($nombredepages > 1) { //on lance le code uniquement s'il y a besoin

	echo "Pages ";
	if ($type == "message") { $petit_ajout_message = "&amp;id=$id"; }
		for ($i = 1; $i <= $nombredepages; $i++)
		{
			if ($page == $i) { echo " - $i"; } else { echo "- <a href='?page=$i&amp;action=$type" . $petit_ajout_message . "'>$i</a>"; }
		};
	};
};


function rechercher($arechercher)
{
	global $mysql_table;
	echo "<form action='.?action=recherche' method='post'>";
	echo "<p class='recherche'>";
	echo "<input type='hidden' name='action' value='recherche'>";
	echo "Rechercher : ";
	echo "<input name='arechercher' value='$arechercher'>";
	echo "</p>";
	echo "</form>";

	if ($arechercher != NULL) {
		echo "<h1>Votre recherche : \"$arechercher\". </h1>";
		$resu = mysql_query("SELECT * FROM `$mysql_table` WHERE 1 AND texte LIKE '%$arechercher%' ORDER BY reponse_a_id");

		echo "<div class='detail-des-messages'>";
		while ($msg = mysql_fetch_row($resu))
		{
			affichage_message($msg[0], $msg[1], $msg[2], $msg[3], $msg[4], $msg[5], $msg[6], $msg[7], "message", "", "", 0);
			if ($msg[5] != 0) { $id = $msg[5]; } else { $id = $msg[0]; };
			echo "<div><a href='?id=$id&action=message'>Allez à la discussion</a></div>";
		};
		echo "</div>\n";
	};
};
?>
