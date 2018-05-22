<?php
	$ident = $_POST["ident"];

	require 'DbCnx.php';
	$sql = "SELECT COUNT(*) as count, MONTH(question.dateDebut) as mois  
			FROM reponse 
			INNER JOIN salarie
			ON reponse.idSalarie = salarie.id
			INNER JOIN entreprise
			ON entreprise.id = salarie.idEntreprise
			INNER JOIN question
			ON reponse.idQuestion = question.id
			WHERE idEntreprise = '".$ident."' 
			GROUP BY (mois)";
			

	$dbCnx = new DbCnx() ;
	$dbInstance = $dbCnx->getDb() ;
	$res = $dbInstance->prepare($sql);
	$res->execute();
	$dataLib = $res->fetchAll(PDO::FETCH_ASSOC);
	$res->closeCursor();
	$dataLib = json_encode(array_column($dataLib, 'count'),JSON_NUMERIC_CHECK);
	
?>

<!DOCTYPE html>
<html>
<head>
	<title>HighChart</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.js"></script>
	<script src="https://code.highcharts.com/highcharts.js"></script>
</head>
<body>

<script type="text/javascript">

$(function () { 

    var data_viewer = <?php echo $dataLib; ?>;

    $('#container').highcharts({
        chart: {
            type: 'column'
        },
        title: {
            text: 'Comparaison des réponses'
        },
        xAxis: {
            categories: ['AVRIL','MAI','JUIN', 'JUILLET']
        },
        yAxis: {
            title: {
                text: 'Réponses'
            }
        },
        series: [{
            name: 'Nombre reponses',
            data: data_viewer
            
        }]
    });
});

</script>

<div class="container">
	<br/>
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>
                <div class="panel-body">
                    <div id="container"></div>
                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>