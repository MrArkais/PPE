<?php
	$idquest = $_POST["idquest"];

	require 'DbCnx.php';
	$sql = "SELECT COUNT(reponseON) as count 
			FROM reponse 
			INNER JOIN question
			ON reponse.idQuestion = question.id
			WHERE reponseON = 'O' AND question.id='".$idquest."'
			GROUP BY (reponseON)";
			
	$sql2 = "SELECT COUNT(reponseON) as count 
			FROM reponse 
			INNER JOIN question
			ON reponse.idQuestion = question.id
			WHERE reponseON = 'N' AND question.id='".$idquest."'
			GROUP BY (reponseON)";

	$dbCnx = new DbCnx() ;
	$dbInstance = $dbCnx->getDb() ;
	$res = $dbInstance->prepare($sql);
	$res->execute();
	$dataLib = $res->fetchAll(PDO::FETCH_ASSOC);
	$res->closeCursor();
	$dataLib = json_encode(array_column($dataLib, 'count'),JSON_NUMERIC_CHECK);
	
	//Deux requêtes différentes
	
	$dbInstance = $dbCnx->getDb() ;
	$res2 = $dbInstance->prepare($sql2);	
	$res2->execute();
	$dataLib2 = $res2->fetchAll(PDO::FETCH_ASSOC);
	$res2->closeCursor();
	$dataLib2 = json_encode(array_column($dataLib2, 'count'),JSON_NUMERIC_CHECK);
	
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

    var data_click = <?php echo $dataLib2; ?>;
    var data_viewer = <?php echo $dataLib; ?>;

    $('#container').highcharts({
        chart: {
            type: 'column'
        },
        title: {
            text: 'Comparaison des réponses'
        },
        xAxis: {
            categories: ['.','.','.', '.']
        },
        yAxis: {
            title: {
                text: 'Réponses'
            }
        },
        series: [{
            name: 'Non',
            data: data_click
        }, {
            name: 'Oui',
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