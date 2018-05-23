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
	$sql = 'SELECT Distinct id, libelle  '.
	' FROM services';

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
			echo $row["libelle"];
			echo '<br/>';
			endforeach ?>
			
	<form method = "POST" action="valide5.php">
	
		Selectionnez le service a affecter au salarie <?php echo $_POST['idsalar'] ?> : 
		<select name="idservice" id="idservice">
			<?php foreach ($dataLib as $row): ?>
			<option><?=$row["id"]?></option>
			<?php endforeach ?>
			<?php echo "<input id=\"idsalar\" name=\"idsalar\" type=\"hidden\" value=".$_POST['idsalar'].">"; ?>
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