<?php 
require 'DbCnx.php';
$salarie = $_POST['idsalars'];
//$service = $_POST['idservice'];



echo $salarie;
echo "<br/>";
//echo $service;


/*
$requete = "UPDATE salarie 
SET idservice = '".$service."' 
WHERE id ='".$salarie."'";

$dbCnx = new DbCnx() ;
	$dbInstance = $dbCnx->getDb() ;
	$res = $dbInstance->prepare($requete);
	$res->execute();
	$dataLib = $res->fetchAll(PDO::FETCH_ASSOC);
	$res->closeCursor();
	
	header("Location: e4.php");
	*/
	
?>