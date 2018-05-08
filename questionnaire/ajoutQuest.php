<html lang="fr">
	<head>
		<title></title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="style.css">
	</head>
	<body>
	<!-- <form action="valider.php" method="POST"> -->
		<?php
		require_once("ControleurSalaries.php");
		require_once("ControleurEntreprises.php");
		require_once("ControleurQuestions.php");
		require_once("ControleurReponses.php");
		header('Content-type: text/html; charset=UTF-8');

		// authentification
		//
			session_start();
			if (isset($_SESSION['connexion']))
			{

				$verif=$_SESSION['connexion'];
			}
			
			else 
			{
				ControleurSalaries::getInstance();
				$verif=ControleurSalaries::recupererIdSalarie($_POST['login'],$_POST['mdp']);
				$_SESSION['connexion']=$verif;	
			
			}
					
			if ($verif instanceof Salarie)
			{
		
			echo"====================AJOUT QUESTION====================";
			echo"<br> <br>";
			
			echo"<form action=\"/questionnaire/valider.php\" method=\"post\">";
			
				echo"Insérer une question :";
				echo"<br>";
				echo"<input type=\"text\" name=\"inserLibel\">";
				echo"<br>";
				echo"<input type=\"text\" name=\"inserDetail\">";
				echo"<br>";
				echo"<input type=\"date\" name=\"inserDateDeb\">";
				echo"<br>";
				echo"<input type=\"date\" name=\"inserDateFin\">";
				echo"<br>";
				echo "<input type='submit' value='Insérer'>";			
			
			echo"</form>";

		} else {
			echo "Authentification incorrecte";
			session_destroy();
		}

		?>

	<!---</form> -->
	</body>
</html>

