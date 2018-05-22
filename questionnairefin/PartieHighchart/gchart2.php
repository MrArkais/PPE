<HTML>
<HEAD>
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>	

  
<?php

require_once('../PartieUtilisation/Salarie.php');
//typseuser = 1 => élève, 2 => entrepreneur et 3 => prof

session_start();		
$verif=$_SESSION['connexion'];
$test=$verif->getTypeUser();
if($test==2) {
	require 'DbCnx.php';
	$sql2 = 'SELECT Distinct id, nom '. 'FROM entreprise';
	
	
	$dbCnx = new DbCnx() ;
	$dbInstance = $dbCnx->getDb() ;
	$res2 = $dbInstance->prepare($sql2);
	$res2->execute();
	$dataLib2 = $res2->fetchAll(PDO::FETCH_ASSOC);
	$res2->closeCursor();
	?>
	
	<body>
		
	<?php	foreach ($dataLib2 as $row): 
			echo $row["id"];
			echo ')  ';
			echo $row["nom"];
			echo '<br/>';
			endforeach ?>
			
	<form method = "POST" action="modif.php">
	
		Selectionnez l'entreprise : 
		<select name="ident" id="ident">
			<?php foreach ($dataLib2 as $row): ?>
			<option><?=$row["id"]?></option>
			<?php endforeach ?>
		</select>
		<input type="submit" value="Valider">
		</form>
		
		
		
		
		<?php
}else 
{
	echo "Vous n'avez pas les droits suffisants pour accéder à cette page !";
}
?>
  
</body>
</HTML>