<?php
//ouverture session

session_start();
$_SESSION['ACCES_INDIRECT']= 1;
$_SESSION['username']= $_POST['username'];
  //connection au serveur
  $cnx = new PDO('mysql:host=localhost;dbname=sondage', 'sondage', 'sondage');
 
 If (isset($_POST['nom']) AND isset($_POST['prenom']) AND isset($_POST['username']) AND isset($_POST['password']) AND isset($_POST['typeuser'])   ) 
{
	
  //récupération des valeurs des champs:
  //nom:
  $typeuser=$_POST['typeuser'];
  
  if ($typeuser=="Etudiant")
  {
	  $typeuser=1;
  }
  else if ($typeuser=="Professeur")
  {
	  $typeuser=2;
  }
  else $typeuser=3;

  $nom     = $_POST["nom"] ;
  //prenom:
 
  $prenom = $_POST["prenom"] ;
  
  //adresse:
  $username = $_POST["username"] ;

  //mdp:
  $password       = $_POST["password"] ;
  $confirmation = $_POST["confirmpassword"];
  
  $idEntreprise=1;
  
if ($password == $confirmation)
{
  //création de la requête SQL:
 $stmt = $cnx->prepare("INSERT INTO salarie(prenom, nom, login, mdp, idEntreprise, typeuser) VALUES (:prenom, :nom, :username, :password, :idEntreprise, :typeuser)");

 $stmt->bindParam(':username', $username);
 $stmt->bindParam(':password', $password);
 $stmt->bindParam(':prenom', $prenom);
 $stmt->bindParam(':nom', $nom);
 $stmt->bindParam(':typeuser', $typeuser);
 $stmt->bindParam(':idEntreprise', $idEntreprise);
 
 $resultat = $stmt->execute() ;
 
header("Location: ../index.php");
}
}	
?>