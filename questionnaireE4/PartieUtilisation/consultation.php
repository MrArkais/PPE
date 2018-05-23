<HTML>
<HEAD>
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>	
   <meta charset="UTF-8">
</HEAD>
  
<?php

require_once('../PartieUtilisation/Salarie.php');
//typseuser = 1 => élève, 2 => entrepreneur et 3 => prof

session_start();		
$verif=$_SESSION['connexion'];
$test=$verif->getTypeUser();
if($test==2) {
	require 'DbCnx.php';
	$sql = 'SELECT count(*) as count, services.id as idserv, services.libelle as services'.
	' FROM salarie'.
	' INNER JOIN services'.
	' ON services.id = salarie.idservice'.
	' GROUP BY services.libelle';
	
	;

	$dbCnx = new DbCnx() ;
	$dbInstance = $dbCnx->getDb() ;
	$res = $dbInstance->prepare($sql);

	$res->execute();
	$dataLib = $res->fetchAll(PDO::FETCH_ASSOC);
	$res->closeCursor(); ?>
	
	<body>
	
	<?php foreach ($dataLib as $row):
			echo $row["idserv"];
			echo ")";
			echo ' <b>'.$row["services"].'</b>';
			echo '--';
			echo 'Nombre de salaries :'.$row["count"];
			echo '  ';
			echo '<br/>';
			endforeach ?>
			
		<?php
}else 
{
	echo "Vous n'avez pas les droits suffisants pour accéder à cette page !";
}
?>
  
</body>
</HTML>