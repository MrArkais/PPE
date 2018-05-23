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
		require_once('../PartieUtilisation/Salarie.php');
//typseuser = 1 => élève, 2 => entrepreneur et 3 => prof

session_start();		
$verif=$_SESSION['connexion'];
$test=$verif->getTypeUser();
if($test==2 OR $test==3) {

		// authentification
		//
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
				echo "<form action=\"supprimer.php\" method=\"post\">";
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
}
else echo "Vous n'avez pas les droits suffisants pour accéder à cette page !";
		?>

	<!---</form> -->
	</body>
</html>

