<?php
// inclusion du fichier des variables et du fichier de fonctions
include "vars.php";
include "func.php";

// R�ception des variables g�n�rales
$page = $_GET['page'];
$id = $_GET['id'];

// la variable action peut venir d'un formulaire, la m�thode de r�ception est donc diff�rente.
if ($_GET['action'] === NULL)
{ $action = $_POST['action']; } else { $action = $_GET['action']; };

// R�ceptions des variables
$titre = $_POST['titre'];
$texte = $_POST['texte'];
$reponse_a_id = $_POST['reponse_a_id'];
$arechercher = $_POST['arechercher'];

// Au cas o� le code de la premi�re page a �t� oubli�
if ($nom === NULL) { $nom = $_POST['nom']; };
if ($email === NULL) { $email = $_POST['email']; };


if ($action === "post")
{ entree($nom, $email, $titre, $texte, $reponse_a_id); echo "Votre message a bien �t� enregistr�"; };

// actions par d�faut
if ($action === NULL OR $action === "post") {$action = "sujet";}; // Si pas d'action alors on affiche les sujets
if ($page === NULL) {$page = 1;};           // Si aucune page d�finie alors on est sur la premi�re

echo "<div class='liens'><a href='?action=sujet'>Revenir � la liste des sujets</a> - <a href='?action=recherche'>Rechercher</a></div>";

if ($action === "recherche")
{
   rechercher($arechercher);
}
elseif ($action === "message")
{
   lister_messages($id, $page, $reponses_par_page);
   $reponse_a_id = $id;
}
elseif ($action === "sujet")
{
   lister_sujets($page, $sujets_par_page);
   $reponse_a_id = 0;
};


if ($mode_administration != 1 AND $action != "recherche") {
?>

<div class='formulaire'>
<h2 class='titre'>
<? if ($action === "sujet") { echo "Poster un nouveau sujet"; } else { echo "R�pondre"; }; ?>
</h2>
<form action='.' method='post'>
<div><input type='hidden' name='action' value='post'>
<input type="hidden" name="reponse_a_id" value="<? echo $reponse_a_id ?>">
Nom : <input name="nom" value="<? echo $nom; ?>" class="champ-nom" maxlength='<? echo $taille_max_nom; ?>'>
Email : <input name="email" value="<? echo $email; ?>"><br>
 <? if ($action === "sujet") { echo "Titre : <input name='titre' class='champ-titre' maxlength='$taille_max_titre'><br>"; }; ?>
Texte : <textarea name="texte" class="champ-texte" cols="50" rows="10"></textarea><br>
<input type='submit' value='poster'>
</div>
</form>
</div>
<?
   if ($afficher_memo === 1) { echo $memo; };
}  elseif ($mode_administration === 1) { echo $mode_administration_phrase; };
?>
<div class="copyright"><? echo $footer; ?></div>
