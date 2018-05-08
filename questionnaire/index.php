<!doctype html>

<head>
<meta charset="utf-8">
<meta name="description" content="">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Connexion</title>
<link rel="stylesheet" href="css/bootstrap.min.css">
<link rel="stylesheet" href="css/jquery.fancybox.css">
<link rel="stylesheet" href="css/owl.carousel.css">
<link rel="stylesheet" href="css/owl.transitions.css">
<link rel="stylesheet" href="css/main.css">
<link rel="stylesheet" href="css/responsive.css">
<link rel="stylesheet" href="css/animate.min.css">
<link rel="stylesheet" href="css/line-icon.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
</head>

<body>
	<?php session_start(); 
	session_destroy() ; ?>
	<div class="container">
		<form class="well form-horizontal" action="PartieUtilisation/main.php" method="post"  id="contact_form">
			<fieldset>
				<legend><center><b>Connexion</b></center></legend>
				<div class="form-group">
					<label class="col-md-4 control-label">Nom d'utilisateur</label>  
					<div class="col-md-4 inputGroupContainer">
						<div class="input-group">
							<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
							<input  name="login" placeholder="Nom d'utilisateur" class="form-control"  type="text">
						</div>
					</div>
				</div>
				<div class="form-group">
					<label class="col-md-4 control-label">Mot de passe</label>  
					<div class="col-md-4 inputGroupContainer">
						<div class="input-group">
							<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
							<input  name="mdp" placeholder="Mot de passe" class="form-control"  type="password">
						</div>
					</div>
				</div>

				<div class="form-group">
					<label class="col-md-4 control-label"></label>
					<div class="col-md-4">
						<button type="submit" class="btn btn-warning" >Se connecter </button>
					</div>
				</div>
			</fieldset>
		</form>
		<form class="well form-horizontal" action="PartieConnexion/inscription.php" method="post"  id="contact_form">
			<div class="form-group">
				<label class="col-md-4 control-label"></label>
				<div class="col-md-4">
					<button type="submit" class="btn btn-warning" >Vous n'avez pas de compte ? </button>
				</div>
			</div>
		</form>
	</div>
</body>
</html>

