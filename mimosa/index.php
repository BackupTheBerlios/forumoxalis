<?php
// Le cookie est mis en place, si vous modifiez la page,
// veillez à bien ajouter cette partie au TOUT DEBUT de votre code.

 if ($_POST['nom'] === NULL) { $nom = $_COOKIE[nom]; } else { $nom = $_POST[nom]; };
 if ($_POST['email'] === NULL) { $email = $_COOKIE[email]; } else { $email = $_POST[email]; };

 setcookie('nom',$nom,time()+365*24*60*60,'/');
 setcookie('email',$email,time()+365*24*60*60,'/');
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN"
    "http://www.w3.org/TR/html40/loose.dtd">
  <html>

  <head>
      <meta http-equiv='Content-Type' content='text/html; charset=iso-8859-15'>
		<title>Oxalis Forum</title>
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
