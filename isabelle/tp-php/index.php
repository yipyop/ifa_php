<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
		<link rel="stylesheet" type="text/css" href="main.css" media="all">
	<meta name="viewport" content="width=device-width, user-scalable=no">
	<title>Document</title>
</head>
<body>


	
		<h2>Coordonnées</h2>

		<form method="post" action="cible.php">
		<aside>
		<div class="main-wrapper">
			<fieldset id="coordonnees">
				<p id="civilite"><label>Civilité : </label>
					      <input type="radio" name="civilite" value="M." />M.
					      <input type="radio" name="civilite" value="Mlle" />Mlle
					      <input type="radio" name="civilite" value="Mme" />Mme
				</p>
			
			<label>Nom : </label>
			    <input type="text" name="nom" size="30" value="Indiquez votre nom" /><br />
			<label>Prénom : </label>
			    <input type="text" name="prenom" value="Votre prénom" /><br />
			<label>Age: </label>
			    <input type="text" name="age" value="Votre age" /><br />
			<label>Votre date de naissance</label>
			<input type="date" name="anniversaire"></br>
			<label>Nationalité : </label>
			<input type="text" name="age" value="Votre nationalité" /><br />
			<label>Code Postale: </label>
			<input type="text" name="codepostal" value="Votre code postal" /><br />
			<label>Votre résidence fiscale: </label>
			<input type="text" name="adresse" value="Votre résidence fiscale" /><br />
	
			<label>Ville : </label>
			<input type="text" name="ville" value="le nom de votre ville" /><br />
			<label>Votre E-mail : </label>
			<input type="text" name="email" value="Votre adresse email" /><br />
			<label>Votre téléphone : </label>
			<input type="text" name="telephone" value="Votre téléphone fixe" /><br />
			<label>Votre téléphone gsm : </label>
			<input type="text" name="gsm" value="Votre téléphone gsm" /><br />
			<label>Votre profession : </label>
			<input type="text" name="profession" value="votre profession" /><br />
			<label>Vos revenus : </label>
			<input type="text" name="revenus" value="vos revenus" /><br />
			 <label>Situation de famille : </label>
			    <select name="situationfamille">
				      <option value="marié">Marié(e)</option>
				      <option value="celibataire">Celibataire</option>
				      <option value="séparé">Séparé(e)</option>
				      <option value="divorcé">Divorcé(e)</option>
			    </select>
</fieldset>

			<aside><fieldset id="coordonnees">
				<p id="civilite"><label>Civilité : </label>
					      <input type="radio" name="civilite" value="M." />M.
					      <input type="radio" name="civilite" value="Mlle" />Mlle
					      <input type="radio" name="civilite" value="Mme" />Mme
				</p>
			
			<br />
			<label>Nom du conjoint: </label>
			    <input type="text" name="nom" size="30" value="Indiquez votre nom" /><br />
			<label>Prénom du conjoint : </label>
			    <input type="text" name="prenom" value="Votre prénom" /><br />
			<label>Age du conjoint: </label>
			    <input type="text" name="age" value="Votre age" /><br />
			<label>Votre date de naissance du conjoint</label>
			<input type="date" name="anniversaire"></br>
			<label>Nationalité du conjoint : </label>
			<input type="text" name="age" value="Votre nationalité" /><br />
			<label>Code Postale du conjoint: </label>
			<input type="text" name="codepostal" value="Votre code postal" /><br />
			<label>Votre résidence fiscale du conjoint: </label>
			<input type="text" name="adresse" value="Votre résidence fiscale" /><br />
			<label>Ville du conjoint: </label>
			<input type="text" name="ville" value="le nom de votre ville" /><br />
			<label>E-mail du conjoint : </label>
			<input type="text" name="email" value="Votre adresse email" /><br />
			<label>Votre téléphone : </label>
			<input type="text" name="telephone" value="Votre téléphone fixe" /><br />
			<label>Votre téléphone gsm : </label>
			<input type="text" name="gsm" value="Votre téléphone gsm" /><br />
			<label>Votre profession : </label>
			<input type="text" name="profession" value="votre profession" /><br />
			<label>Vos revenus du conjoint : </label>
			<input type="text" name="revenus" value="vos revenus" /><br />
			 <label>Situation de famille : </label>
			    <select name="situationfamille">
				      <option value="marié">Marié(e)</option>
				      <option value="celibataire">Celibataire</option>
				      <option value="séparé">Séparé(e)</option>
				      <option value="divorcé">Divorcé(e)</option>
			    </select></fieldset></aside>

			<aside><fieldset id="coordonnees"><label>Prénom des enfants: </label>
				<input type="text" name="enfants" value="enfants" /><br />
				<label>date de naissance des enfants: </label>
				<input type="date" name="anniversaire"></br>
				<label>Prénom des enfants: </label>
				<input type="text" name="enfants" value="enfants" /><br />
				<label>date de naissance des enfants: </label>
				<input type="date" name="anniversaire"></br>

			</fieldset>
		</aside>
	</div>






</form>	


</body>
</html>