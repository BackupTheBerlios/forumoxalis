<?php
// inclusion du fichier des variables et du fichier de fonctions
if ($module_administration == true) include "modules/admin.php";

// Réception des variables générales
$page = $_GET['page'];
$id = $_GET['id'];

// La variable action peut venir d'un formulaire, la méthode de réception est donc différente.
if ($_GET['action'] === NULL) { $action = $_POST['action']; }
                         else { $action = $_GET['action']; };

// Réceptions des variables
$titre = $_POST['titre'];
$texte = $_POST['texte'];
$reponse_a_id = $_POST['reponse_a_id'];
$arechercher = $_POST['arechercher'];

// Au cas où le code de la première page a été oublié
if ($nom    === NULL) $nom   = $_POST['nom'];
if ($email  === NULL) $email = $_POST['email'];

// actions par défaut
if ($action === NULL) $action = "sujet";
if ($page   === NULL) $page   = 1; // Si aucune page définie alors on est sur la première

// on affiche la liste des liens paramétrée dans vars.php si l'action actuelle n'est pas de poster
if ($action != "poster") {
	echo "<div class='liens'>";
	echo $liens;
	if ($module_administration == true) echo " - <a href='?admin=login1'>Administration</a>";
	echo "</div>";
};

switch ($action)
{
	case "previsualisation":
		if ($reponse_a_id < 1) $type = "sujet"; else $type = "message";
		echo "<div class='information'>Prévisualisation, vous devrez cliquer sur <b>Poster</b> pour soumettre votre nouveau $type.</div>";
		echo "<div class='detail-des-messages'>";
		affichage_message('', stripslashes($nom), stripslashes($email), date('j-m-Y G:i:s'), stripslashes($texte), '', stripslashes($titre), '', $type, '', '', 1);
		echo "</div>";
		break;

	case "poster":
		$res = entree($nom, $email, $titre, $texte, $reponse_a_id);
		//
		switch ($res)
		{
			case -1:
				echo "<div class='information'>Ce message a déjà été posté.</div>";
				break;
			case 0:
				echo "<div class='information'>Erreur de base de données.</div>";
				break;
			case 1:
				echo "<div class='information'>Votre message a bien été enregistré.</div>";
				break;
			case 2:
				echo "<div class='information'>Vous ne pouvez pas poster un message vide, merci de revenir en arrière et de modifier votre message.</div>";
				break;
			case 3:
				echo $geler_enregistrement_phrase;
				break;
		}
		echo "<a href='". $_SERVER["PHP_SELF"] . "'><br>Retourner à la liste des sujets</a></div>";
		break;


	case "recherche":
		rechercher($arechercher);
          break;

	case "message":
		lister_messages($id, $page, $reponses_par_page);
		$reponse_a_id = $id;
		break;

	case "sujet":
		lister_sujets($page, $sujets_par_page);
		$reponse_a_id = 0;
		break;
};

if ($geler_enregistrement != 1 AND $action != "recherche" AND $action != "poster") {

?>

<div class='formulaire'>
<h2 class='titre'>
<?

	if ($bouton2 === NULL) $bouton2 = "poster";
	if ($action === "sujet" OR $reponse_a_id === 0)
	{
		echo "Poster un nouveau sujet";
	}elseif ($action == "modifier")
	{
		echo "Modifier le message $id posté le $date";
	}else
	{
		echo "Répondre";
	}
?>
</h2>
<form action='.' method='post'>
<div>
<input type="hidden" name="reponse_a_id" value="<? echo $reponse_a_id ?>">
<input type="hidden" name="id" value="<? echo $id ?>">
Nom : <input name="nom" value="<? echo stripslashes($nom); ?>" class="champ-nom" maxlength='<? echo $taille_max_nom; ?>'>
Email : <input name="email" value="<? echo stripslashes($email); ?>"><br>
 <? if ($action === "sujet" OR $reponse_a_id < 1 AND $type != "reponse") echo "Titre : <input name='titre' class='champ-titre' maxlength='$taille_max_titre' value='". stripslashes($titre) . "'><br>"; ?>
Texte : <textarea name="texte" class="champ-texte" cols="50" rows="10"><? echo stripslashes($texte); ?></textarea><br>
<? if ($action != "modifier") echo "<input type='submit' value='previsualisation' name='action'>"; ?>
<input type='submit' value='<? echo $bouton2; ?>' name='action'>
</div>
</form>
</div>
<?
	if ($afficher_memo === 1) echo $memo;
}
	elseif ($geler_enregistrement === 1) echo $geler_enregistrement_phrase;
?>
<div class="copyright"><? echo $footer; ?></div>
