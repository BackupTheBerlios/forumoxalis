<?php

// Le cookie est mis en place, si vous modifiez la page,
// veillez à bien ajouter cette partie au TOUT DEBUT de votre code.
include "vars.php";
include "func.php";

if ($_POST['nom'] === NULL) { $nom = $_COOKIE[nom]; } else { $nom = $_POST[nom]; };
if ($_POST['email'] === NULL) { $email = $_COOKIE[email]; } else { $email = $_POST[email]; };

setcookie('nom',$nom,time()+365*24*60*60,'/');
setcookie('email',$email,time()+365*24*60*60,'/');

$admin = $_GET["admin"];
if ($admin == "login2")
{
		$admin_password = $_POST["password"];

		if ($module_administration_pass == $admin_password) setcookie('admin',md5($module_administration_pass),time()+365*24*60*60,'/');
		else setcookie('admin',"",time()+365*24*60*60,'/');
		header("Location: ". $_SERVER["PHP_SELF"]);

}

?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN"
    "http://www.w3.org/TR/html40/loose.dtd">

<html>
	<head>
		<meta http-equiv='Content-Type' content='text/html; charset=iso-8859-15'>
		<title>Forum Oxalis</title>
		<meta name='generator' content='Human'>
		<link title='Default' type='text/css' href='layout.css' rel='stylesheet' media='screen'>
	</head>
<body>

<h1>Forum</h1>
<div class="forum">
<?php include "forum.php" ?>
</div>

</body>
</html>
