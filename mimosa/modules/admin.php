<?

$admin = $_GET["admin"];

$reponse_a_id = $_POST['reponse_a_id'];

if ($reponse_a_id == -1)
{
	$id = $_POST['id'];
	$admin = "modifier2";
}

if ($_COOKIE["admin"] == md5($module_administration_pass))
{
	?>
		Vous êtes en mode administration. <a href="?admin=login2">Retourner en mode normal</a>
	<?
}

switch ($admin)
{
	case "login1":
		?>
	<form method="post" action="?admin=login2" class="information">
		<table>
			<tr>
				<td>Mot de passe d'administration</td>
				<td><input type="password" size="20" name="password"></td>
				<td><input type="submit" value="Valider"></td>
			</tr>
		</table>
	</form>
		<?
		break;
	case "effacer1":
		if ($_COOKIE["admin"] != md5($module_administration_pass)) die("Erreur d'authentification");
		$id = $_GET["id"];
		echo "<div class='information'>Sur et certain de vouloir effacer le message $id et toutes ses réponses ? <a href='?admin=effacer2&id=$id'>Oui</a> <a href='?action=sujet'>Non</a></div>";
		break;
	case "effacer2":
		if ($_COOKIE["admin"] != md5($module_administration_pass)) die("Erreur d'authentification");
		$id = $_GET["id"];
		$res = mysql_query("select * from `$mysql_table` where id=$id");
		if ($res AND mysql_num_rows($res)>0)
		{
			$res = mysql_query("delete from `$mysql_table` where id=$id or reponse_a_id=$id");
			if ($res) echo "<div class='information'>Le message $id et ses réponses ont étés effacés avec succès</div>";
			else echo "<div class='information'>Erreur lors de l'effacement du message" . $mysql_error() . "</div>";

		}
		else
		{
			echo "Impossible d'effacer le message" . mysql_error();
		}
		break;
	case "modifier1":
		if ($_COOKIE["admin"] != md5($module_administration_pass)) die("Erreur d'authentification");
		$id = $_GET["id"];
		$query = "select * from `$mysql_table` where id=$id";
		$res = mysql_query($query);
		$msg = mysql_fetch_array($res);
		$nom = $msg["nom"];
		$email = $msg["email"];
		$date = date("d/m/Y à H:i", strtotime($msg["date"]));
		$_POST["titre"] = $msg["titre"];
		$_POST["texte"] = $msg["texte"];
		$_POST['reponse_a_id'] = -1;

		$query = "select * from `$mysql_table` where id=$id";
		$res = mysql_query($query);
		$msg = mysql_fetch_array($res);
		$type_rai = $msg["reponse_a_id"];
		if ($type_rai > 0) $type = "reponse";
		else $type = "sujet";

		$_GET["action"] = "modifier";
		$bouton2 = "Modifier";
		break;
	case "modifier2":
		if ($_COOKIE["admin"] != md5($module_administration_pass)) die("Erreur d'authentification");
		$nom = addslashes($_POST["nom"]);
		$email = addslashes($_POST["email"]);
		$titre = addslashes($_POST["titre"]);
		$texte = addslashes($_POST["texte"] . "\n\n<b>Ce message a été modifié par l'administrateur le " . date("d/m/Y à H:i") . "</b>");

		$query = "update `$mysql_table` set nom='$nom', email='$email', titre='$titre', texte='$texte' where id=$id";
		$res = mysql_query($query);
		if ($res) echo "<div class='information'>Message $id modifié avec succès</div>";
		else echo "<div class='information'>Erreur!</div>";


		/*$id = $_GET["id"];
		$query = "select * from `$mysql_table` where id=$id";
		$res = mysql_query($query);
		$msg = mysql_fetch_array($res);
		$nom = $msg["nom"];
		$email = $msg["email"];
		$date = date("d/m/Y à H:i", strtotime($msg["date"]));
		$_POST["titre"] = $msg["titre"];
		$_POST["texte"] = $msg["texte"];
		$_POST['reponse_a_id'] = -1;
		$_GET["action"] = "modifier";
		$bouton2 = "Modifier";*/

		break;
}

?>
