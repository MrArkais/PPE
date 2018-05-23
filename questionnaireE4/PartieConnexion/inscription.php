<!doctype html>

<head>
<meta charset="utf-8">
<meta name="description" content="">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Inscription</title>
<link rel="stylesheet" href="../css/bootstrap.min.css">
<link rel="stylesheet" href="../css/jquery.fancybox.css">
<link rel="stylesheet" href="../css/owl.carousel.css">
<link rel="stylesheet" href="../css/owl.transitions.css">
<link rel="stylesheet" href="../css/main.css">
<link rel="stylesheet" href="../css/responsive.css">
<link rel="stylesheet" href="../css/animate.min.css">
<link rel="stylesheet" href="../css/line-icon.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
</head>

<body>
	<div class="container">

		<form class="well form-horizontal" action="validation.php" method="post"  id="contact_form">
			<fieldset>
				<legend><center><b>Inscrivez-vous!</b></center></legend>
				<div class="form-group">
					<label class="col-md-4 control-label">Nom </label>  
					<div class="col-md-4 inputGroupContainer">
						<div class="input-group">
							<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
							<input  name="nom" placeholder="Nom" class="form-control"  type="text">
						</div>
					</div>
				</div>

			<div class="form-group">
				<label class="col-md-4 control-label" >Prénom </label> 
				<div class="col-md-4 inputGroupContainer">
					<div class="input-group">
						<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
						<input name="prenom" placeholder="Prénom" class="form-control"  type="text">
					</div>
				</div>
			</div>
			
			<div class="form-group">
				<label class="col-md-4 control-label">Nom d'utilisateur  </label>  
				<div class="col-md-4 inputGroupContainer">
					<div class="input-group">
						<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
						<input  name="username" placeholder="Nom d'utilisateur" class="form-control"  type="text">
					</div>
				</div>
			</div>
			
			<div class="form-group">
				<label class="col-md-4 control-label">Mot de passe </label>  
				<div class="col-md-4 inputGroupContainer">
					<div class="input-group">
						<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
						<input  name="password" placeholder="Mot de passe" class="form-control"  type="password">
					</div>
				</div>
			</div>

			<div class="form-group">
				<label class="col-md-4 control-label">Confirmation Mot de passe </label>  
				<div class="col-md-4 inputGroupContainer">
					<div class="input-group">
						<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
						<input  name="confirmpassword" placeholder="Confirmation mot de passe" class="form-control"  type="password">
					</div>
				</div>
			</div>
			
			<div class="form-group">
				<label class="col-md-4 control-label">Qui êtes-vous ? </label>  
				<div class="col-md-4 inputGroupContainer">
					Etudiant
					<INPUT type="radio" name="typeuser" value="Etudiant">
					Professeur
					<INPUT type="radio" name="typeuser" value="Professeur" disabled>
					Entrepreneur
					<INPUT type="radio" name="typeuser" value="Entrepreneur" disabled>
				</div>
			</div>

			<div class="form-group">
				<label class="col-md-4 control-label"></label>
				<div class="col-md-4">
					<button type="submit" class="btn btn-warning" >Créer </button>
				</div>
			</div>
			</fieldset>
		</form>
		<form class="well form-horizontal" action="../index.php" method="post"  id="contact_form">
			<div class="form-group">
				<label class="col-md-4 control-label"></label>
				<div class="col-md-4">
					<button type="submit" class="btn btn-warning" >Vous avez déjà un compte ? </button>
				</div>
			</div>
		</form>
	</div>
</body>
</html>