<html lang="fr">
	<head>
		<title></title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="style.css">
		<script type="text/javascript" src="js1/menu.js" ></script>
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
			
			$_SESSION['personne']=$_POST['login'];
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
			
			echo "Bonjour ".$verif->getPrenom()." ".$verif->getNom()." de l'entreprise ".$verif->getIdEntreprise();
			echo"<br> <br>";

			echo "<div id=\"tabs\">";			
				echo "<ul>";
					echo "<li><a href=\"#\" rel=\"connexion.php\" class=\"selected\" onClick=\"loadit(this)\">Gestion</a></li>";
					echo "<li><a href=\"#\" rel=\"ajoutQuest.php\" onClick=\"loadit(this)\">Ajout</a></li>";
					echo "<li><a href=\"#\" rel=\"repondre.php\" onClick=\"loadit(this)\">Réponses</a></li>"; 	
					echo "<li><a href=\"#\" rel=\"PartieHighchart/gchart.php\" onClick=\"loadit(this)\">Statistiques</a></li>"; 					
				echo "</ul>";
			echo "<iframe id=\"container\"></iframe>";
			echo "</div>";
			
			echo "<form action='identification.php'>";
			echo "<input type='submit' value='Deconnexion'> </form>";

		} else {
			echo "Authentification incorrecte";
			session_destroy();
		}

		?>

	<!---</form> -->
	</body>
</html>

