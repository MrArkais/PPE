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
	$sql = 'SELECT Distinct id, prenom, nom  '.
	' FROM salarie';

	$dbCnx = new DbCnx() ;
	$dbInstance = $dbCnx->getDb() ;
	$res = $dbInstance->prepare($sql);

	$res->execute();
	$dataLib = $res->fetchAll(PDO::FETCH_ASSOC);
	$res->closeCursor(); ?>
	
	<body>
	
	<?php foreach ($dataLib as $row): 
			echo $row["id"];
			echo ')  ';
			echo $row["prenom"];
			echo '  ';
			echo $row["nom"];
			echo '<br/>';
			endforeach ?>
			
	<form method = "POST" action="valide4.php">
	
		Selectionnez le salarie : 
		<select name="idsalar" id="idsalar">
			<?php foreach ($dataLib as $row): ?>
			<option><?=$row["id"]?></option>
			<?php endforeach ?>
		</select>
		<input type="submit" value="Valider">
		</form>
		
		
		
		<form method = "POST" action="testplus.php">
	
		[TEST] Selectionnez les salaries : 
		
			<?php foreach ($dataLib as $row): ?>
			<input type="checkbox" name='idsalars' value'<?.=$row["id"].?'> <?=$row["id"]?> </input>
			<?php endforeach ?>
		
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