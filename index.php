<?php // Christophe -Johan - Isabelle - Pascal ?>

<?php require 'cible.php'; ?>


<!DOCTYPE html>
<html lang="fr">
	<head>
		<meta http-equiv="content-type" content="text/html; charset=UTF-8">
		<meta charset="utf-8">
		<title>Projet Formulaire PHP</title>
		<meta name="generator" content="Bootply" />
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
		<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
		<link href="css/styles.css" rel="stylesheet">
	</head>
	<body>
		<div class="navbar navbar-inverse navbar-fixed-top">
			<div class="container">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a class="navbar-brand" href="formulaire.html">Projet PHP</a>
				</div>
				<!--<div class="collapse navbar-collapse">
					<ul class="nav navbar-nav">
						<li class="active"><a href="index.html">Liste des utilisateurs</a></li>
						<li><a href="mon-profil.html">Mon profil</a></li>
					</ul>
				</div>-->
				<!--/.nav-collapse -->
			</div>
		</div>

		<div id="main-container" class="container">

			<?php include 'formulaire.html'; ?>

			<?php 
			if( isset($array_client_france) || isset($array_client_luxembourg) ) {
				if( $array_client_france && isset($array_client_france['etat_civil']['vous']['nom']) && iset($array_client_france['etat_civil']['vous']['prenom']) ) {
					echo ' Nom : ' . $array_client_france['etat_civil']['vous']['nom'] . ' Prénom : ' . $array_client_france['etat_civil']['vous']['prenom'] . '<br/>' ;
					echo ' Nationalité : ' . $array_client_france['etat_civil']['vous']['nationalite'] . '<br/>' ;
					echo '<pre>' . var_dump($array_client_france) . '</pre>' ;
					
				} 
				
				if( $array_client_luxembourg && isset($array_client_luxembourg['etat_civil']['vous']['nom']) && iset($array_client_luxembourg['etat_civil']['vous']['prenom'])) {
					echo ' Nom : ' . $array_client_luxembourg['etat_civil']['vous']['nom'] . ' Prénom : ' . $array_client_luxembourg['etat_civil']['vous']['prenom'] . '<br/>' ;
					echo ' Nationalité : ' . $array_client_luxembourg['etat_civil']['vous']['nationalite'] . '<br/>' ;
					echo '<pre>' . var_dump($array_client_luxembourg) . '</pre>' ;
					
				}
				if( $erreurs ) {
					echo '<h2>Erreurs : </h2><br/>' ;
					echo '<pre>' . var_dump($erreurs) . '</pre>' ;
				}
			}
			?>

		</div><!-- /.container -->

		
		<!-- script references -->
		
		
	</body>
</html>