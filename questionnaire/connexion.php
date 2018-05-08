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
			
			echo"=============GESTION QUESTIONS EXISTANTES=============";
			
			echo "<br><br>Sondages de satisfaction  :<br><br>";
			
			// affichage des questions (enquêtes) en cours
			//
			ControleurQuestions::getInstance();

			$tab=ControleurQuestions::getLesQuestions($verif->getId());

			$cpt = 1;
			for ($i=0;$i<count($tab);$i++){
				echo "<form action=\"/questionnaire/supprimer.php\" method=\"post\">";
				echo "<br/>";
				echo "<input id=\"idquest\" name=\"idquest\" type=\"hidden\" value=".$tab[$i]->getId().">";
				echo $cpt . ")";
				echo $tab[$i]->getLibelle()." <input type='submit' value='Supprimer' name='".$tab[$i]->getId()."'></form>";
				$cpt++;
				echo "<br/>";
			}	
			
		} else {
			echo "Authentification incorrecte";
			session_destroy();
		}

		?>

	<!---</form> -->
	</body>
</html>

