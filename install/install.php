<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
	<head>

		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<title>Installation de Sooth ERP </title>

		<link rel="stylesheet" href="./css/SEinstall.css" />

		<script type="text/javascript" src="./lib/JQuery/jquery.js"></script>
		<script type="text/javascript" src="./lib/spin/spin.min.js"></script>
		<script type="text/javascript" src="./lib/install.js"></script>

	</head>
	<body>
		<div class="container">
			<h1>Installation de Sooth ERP<br />
				<span class="h1mini">Un fork du logiciel open source Lundi Matin Business®</span>
			</h1>
			<h2 class="menuHeader" style="background-image: url('./images/h2square.png'); background-repeat: no-repeat" id="h2-1"><img src="./images/down.png" id="icon1">
					<span class="h2text">Extraction des archives</span>
					<div id="spin1" class="my_spinner"></div>
			</h2>
			<div class="menuContainer">
				<div class="block">
					<div id="process_form">
	  					<form name="process" method="post" action="">
							<?php echo (is_writable(dirname(__DIR__)) && is_writable(__DIR__) && is_writable((dirname(__DIR__)."/index.php")))?"":"<span class=\"warning\">Le dossier racine de l'installeur, le fichier 'index.php' du même dossier et le sous-dossier 'install' doivent posséder des droits en écriture.<br /></span>"; ?>
							Cette étape va déployer les fichiers contenus dans les archives. <br />
							Le chemin vers l'application finale sera le même que celui du présent dossier d'installation. <br />
							Ce dossier pourra à tout moment être renomé en cas de nécessité. <br />
 	     					<br />
							<input type="hidden" id="unzipped" value="false" />
   		   					<input type="submit" name="submit" class="button1" id="submit_btn" value=" Continuer " <?php echo (is_writable(dirname(__DIR__)) && is_writable(__DIR__) && is_writable((dirname(__DIR__)."/index.php")))?"":"disabled=\"disabled\"" ?>/>

  						</form>
					</div>
				</div>
			</div>

			<h2 class="menuHeader" style="background-image: url('./images/h2.png'); background-repeat: no-repeat" id="h2-2"><img src="./images/right.png" id="icon2">
				<span class="h2text">Saisie des paramètres de la base de donnée</span>
				<div id="spin2" class="my_spinner"></div>
			</h2>

			<div class="menuContainer">
				<div class="block">
				
					<div id="process_form2">
					Veuillez saisir les paramètres de la base de données<br />
	  					<form name="process" method="post" action="">
							<table>
								<tr><td class="padding">
	    						<label for="host">Adresse du serveur: </label></td><td class="padding">
	    						<input type="text" id="host"  /></td><td class="padding">
	      						<label class="error" for="host" id="host_error">Saisie de l'adresse du serveur obligatoire</label></br></td>
								</tr>

								<tr><td class="padding">
	      						<label for="dbname">Nom de la base: </label></td><td class="padding">
	      						<input type="text" id="dbname" /></td><td class="padding">
	      						<label class="error" for="dbname" id="dbname_error">Saisie du nom de la base obligatoire</label></br></td>
								</tr>


								<tr><td class="padding">
	      						<label for="username">Utilisateur: </label></td><td class="padding">
	      						<input type="text" id="username" /></td><td class="padding">
	      						<label class="error" for="username" id="username_error">Saisie du nom d'utilisateur obligatoire</label></br></td>
								</tr>

								<tr><td class="padding">
	      						<label for="pass">Mot de passe: </label></td><td class="padding">
      							<input type="password" id="pass" /></br></td><td class="padding">
								</td>&nbsp;<td>
								</tr>
							</table>

    							<br />
      							<input type="submit" name="submit" class="button2" id="submit_btn" value=" Continuer "/>

  						</form>
					</div>
				</div>
			</div>

			<h2 class="menuHeader" style="background-image: url('./images/h2.png'); background-repeat: no-repeat" id="h2-3"><img src="./images/right.png" id="icon3">
				<span class="h2text">Construction de la base</span>
				<div id="spin3" class="my_spinner"></div>
			</h2>

			<div class="menuContainer">
				<div class="block">
					<div id="process_form3">
  						<form name="process" method="post" action="">
  							Cette étape va construire la base de donnée à partir du fichier sql extrait des archives. <br />
	    					<br />

	      					<input type="submit" name="submit" class="button3" id="submit_btn" value=" Continuer " />

	  					</form>
					</div>
				</div>
			</div>

			<h2 class="menuHeader" style="background-image: url('./images/h2.png'); background-repeat: no-repeat" id="h2-4"><img src="./images/right.png" id="icon4">
				<span class="h2text">Connexion</span>
			</h2>
			<div class="menuContainer">
				<div class="block">
					<span class="warning">Veillez à effacer le dossier install contenu dans le dossier racine de l'application<br /></span>
					Les paramètres pour vous connecter sont<br />
					- identifiant: <b>admin@domain.ltd </b><br />
					- mot de passe: <b>admin </b>
					<span class="warning"><br />Pensez à les modifier!<br /><br /></span>
					<input type="submit" value=" Lancer l'application ! " onclick="document.location = '../index.php';" />
				</div>
			</div>

		</div>

	</body>
</html>