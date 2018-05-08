<!DOCTYPE html>
<html lang="fr">
	<head>
		<title></title>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link href="style.css" rel="stylesheet">
	</head>
	<body>
	<?php session_start(); 
	session_destroy() ; ?>
		Identification <br>
		<form action="main.php" method="POST">
			Login <input type="text" name="login"><br>
			Mot de passe <input type="password" name="mdp"><br>
			<input type="submit" value="S'identifier">
		</form>
	</body>
</html>