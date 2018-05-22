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

$s = $id;
$q = $_POST ['idquest'];
$r= $_POST ['nomradio'];

// $reco = $_POST ['re'];
echo "la question est ".$q." et reponse ".$r;
$reponse = new Reponse($s, $q, $r);
ControleurReponses::ajouterReponse($reponse);

header("Location: repondre.php");
exit;
?>

</body>
</html>