<!DOCTYPE html>
<html lang="fr">
<head>
    <title></title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="css/style.css" rel="stylesheet">
</head>
<body>
<?php
require_once("ControleurSalaries.php");
//require_once("ControleurServices.php");//
require_once("ControleurQuestions.php");
require_once("ControleurReponses.php");

session_start();
ControleurQuestions::getInstance();
$verif=$_SESSION['connexion'];
$id = $verif->getId();

$rep = $_POST ['re'];

echo $rep;


header("Location: repondre.php");
exit;



?>


</body>
</html>

