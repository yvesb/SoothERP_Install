<?php
// "Installeur Sooth ERP" , BSD license, http://www.sootherp.fr/
// "Installeur Sooth ERP" makes use of "Spin.js" and "JQuery", both under MIT license
// See README and LICENSE files.
if ((isset($_POST['step'])) && (strlen(trim($_POST['step'])) > 0)) {



	Switch ($_POST['step']) {

		//////////
		//
		// ETAPE 1
		//
		//////////

		case "1":

		$zip_proc="";


		// Les archives ont déjà été dézippées ?
		if ($_POST['unzipped'] == "false") {

			// Non, on les dézippe
			foreach (glob("./archives/*.zip") as $filename) {

				// Recherche du zip des fichiers dans le dossier archives (i.e. commence par un chiffre)
				if (preg_match ('/^[0-9]/',basename($filename))) {
					$zip = new ZipArchive;
					if ($zip->open("$filename") === TRUE) {
						$zip->extractTo('../');
						$zip->close();
					}
					else {
						$zip_proc .= 'erreur désarchivage fichiers\n';
					}
				}

				//  Recherche du zip sql dans le dossier archives (i.e.commence par 'sooth')
				if (preg_match ('/^sooth/i',basename($filename))) {
					$zip = new ZipArchive;
					if ($zip->open("$filename") === TRUE) {
						$zip->extractTo('./');
						$zip->close();
					}
					else {
						$zip_proc .= 'erreur désarchivage sql\n';
						}
				}
			}
		}

		// Si problème de dézippage, on retourne une erreur
		if ($zip_proc != "") {
		echo $zip_proc;
		break;
		}

		// On retourne un nouveau formulaire contenant le statut des dossiers avec droits en écriture nécessaires
		echo '<form name="process" method="post" action="">';
		echo is_writable('../echange_lmb/')? "<pre class=\"pre\">Droits en &eacute;criture ../echange_lmb/ <span class=\"great\">OK</span></pre>": "<pre class=\"pre\">Droits en &eacute;criture ../echange_lmb/ <span class=\"warning\">insuffisants</span></pre>";
		echo is_writable('../ressources/')? "<pre class=\"pre\">Droits en &eacute;criture ../ressources/ <span class=\"great\">OK</span></pre>": "<pre class=\"pre\">Droits en &eacute;criture ../ressources/ <span class=\"warning\">insuffisants</span></pre>";
		echo is_writable('../config/')? "<pre class=\"pre\">Droits en &eacute;criture ../config/ <span class=\"great\">OK</span></pre>": "<pre class=\"pre\">Droits en &eacute;criture ../config/ <span class=\"warning\">insuffisants</span></pre>";
		echo is_writable('../modeles_pdf/')? "<pre class=\"pre\">Droits en &eacute;criture ../modeles_pdf/ <span class=\"great\">OK</span></pre>": "<pre class=\"pre\">Droits en &eacute;criture ../modeles_pdf/ <span class=\"warning\">insuffisants</span></pre>";
		echo is_writable('../modeles_pdf/config/')? "<pre class=\"pre\">Droits en &eacute;criture ../modeles_pdf/config/ <span class=\"great\">OK</span></pre>": "<pre class=\"pre\">Droits en &eacute;criture ../modeles_pdf/config/ <span class=\"warning\">insuffisants</span></pre>";
		echo is_writable('../modeles_ods/')? "<pre class=\"pre\">Droits en &eacute;criture ../modeles_ods/ <span class=\"great\">OK</span></pre>": "<pre class=\"pre\">Droits en &eacute;criture ../modeles_ods/ <span class=\"warning\">insuffisants</span></pre>";
		echo is_writable('../modeles_ods/config/')? "<pre class=\"pre\">Droits en &eacute;criture ../modeles_ods/config/ <span class=\"great\">OK</span></pre>": "<pre class=\"pre\">Droits en &eacute;criture ../modeles_ods/config/ <span class=\"warning\">insuffisants</span></pre>";
		echo is_writable('../profil_admin/')? "<pre class=\"pre\">Droits en &eacute;criture ../profil_admin/ <span class=\"great\">OK</span></pre>": "<pre class=\"pre\">Droits en &eacute;criture ../profil_admin/ <span class=\"warning\">insuffisants</span></pre>";
		echo is_writable('../profil_collab/')? "<pre class=\"pre\">Droits en &eacute;criture ../profil_collab/ <span class=\"great\">OK</span></pre>": "<pre class=\"pre\">Droits en &eacute;criture ../profil_collab/ <span class=\"warning\">insuffisants</span></pre>";
		echo is_writable('../modules/')? "<pre class=\"pre\">Droits en &eacute;criture ../modules/ <span class=\"great\">OK</span></pre>": "<pre class=\"pre\">Droits en &eacute;criture ../modules/ <span class=\"warning\">insuffisants</span></pre>";
		echo is_writable('../fichiers/')? "<pre class=\"pre\">Droits en &eacute;criture ../fichiers/ <span class=\"great\">OK</span></pre>": "<pre class=\"pre\">Droits en &eacute;criture ../fichiers/ <span class=\"warning\">insuffisants</span></pre>";
		
		// Au moins un des dossiers n'a pas de droits en écriture ?
		if (!is_writable('../echange_lmb/') OR 
		!is_writable('../ressources/') OR 
		!is_writable('../config/') OR 
		!is_writable('../modeles_pdf/') OR 
		!is_writable('../modeles_pdf/config/') OR 
		!is_writable('../modeles_ods/') OR 
		!is_writable('../modeles_ods/config/') OR 
		!is_writable('../profil_admin/') OR
		!is_writable('../profil_collab/') OR
		!is_writable('../modules/') OR
		!is_writable('../fichiers/')
		) {
			// Droits insufisants, message en conséquence et redirection du formulaire vers la mme étape
			echo '<input id="unzipped" type="hidden" value="true" /><br />';
			echo 'Veuillez autoriser en &eacute;criture les &eacute;l&eacute;ments list&eacute;s ci-dessus et   <input type="submit" name="submit" class="button1" id="submit_btn" value=" Revérifier " /></form>';
			}
			else {
				// Droits suffisants, on soumet le formulaire vers l'étape suivante
				echo '<input id="unzipped" type="hidden" value="true" /><br />';
				echo 'Les droits en &eacute;criture requis sont valides   <input type="submit" name="submit" class="button1b" id="submit_btn" value=" Continuer " />';
			}
		// Fin étape 1
		break;

		//////////
		//
		// ETAPE 1b
		//
		//////////

		// Simple étape de transition, on retourne true.
		case "1b":
		echo 'true';
		// Fin étape 1b
		break;


		//////////
		//
		// ETAPE 2
		//
		//////////

		case "2":

		// Tous les champs contiennent une valeur, excepté le mot de passe qui dans l'absolu peut rester vide ?
		if(!empty($_POST['host']) && !empty($_POST['username']) && !empty($_POST['dbname'])) {
		
			// On teste la connexion à la bdd
			try {
			$dsn = 'mysql:host='.$_POST['host'];
			$dbh = new PDO ($dsn, $_POST['username'], $_POST['pass']);
			$base=$_POST['dbname'];
			$create = $dbh -> exec("CREATE DATABASE IF NOT EXISTS `$base`;");
			} catch (PDOException $e) {
				$fp = fopen('error.log', 'a+');
				fwrite($fp, $e);
				fclose($fp);
				echo "<span class='warning'>Connexion à la base de donnée impossible.<br /></span> <br />Veuillez vérifier les paramètres saisis. <br /> Vérifiez également les droits de l'utilisateur si la base doit être créée, ou bien créez au préalable une base avec les droits d'accès pour l'utilisateur saisi (si celui-ci ne possède pas les permissions suffisantes pour la création d'une base).";

echo '<form name="process" method="post" action="">';
echo '<table>';
echo '<tr><td class="padding">';
echo '<label for="host">Adresse du serveur: </label></td><td class="padding">';
echo '<input type="text" id="host"  /></td><td class="padding">';
echo '<label class="error" for="host" id="host_error">Saisie de l\'adresse du serveur obligatoire</label></br></td>';
echo '</tr>';
echo '<tr><td class="padding">';
echo '<label for="dbname">Nom de la base: </label></td><td class="padding">';
echo '<input type="text" id="dbname" /></td><td class="padding">';
echo '<label class="error" for="dbname" id="dbname_error">Saisie du nom de la base obligatoire</label></br></td>';
echo '</tr>';
echo '<tr><td class="padding">';
echo '<label for="username">Utilisateur: </label></td><td class="padding">';
echo '<input type="text" id="username" /></td><td class="padding">';
echo '<label class="error" for="username" id="username_error">Saisie du nom d\'utilisateur obligatoire</label></br></td>';
echo '</tr>';
echo '<tr><td class="padding">';
echo '<label for="pass">Mot de passe: </label></td><td class="padding">';
echo '<input type="password" id="pass" /></br></td><td class="padding">';
echo '</td>&nbsp;<td>';
echo '</tr>';
echo '</table>';
echo '<br />';
echo '<input type="submit" name="submit" class="button2" id="submit_btn" value=" Continuer "/>';
echo '</form>';
		
				break;
				}
		
			// On modifie en conséquence le fichier de config de la BDD
			$fp = fopen('../config/config_bdd.inc.php', 'wb');
			fwrite($fp, "<?php\n");
			fwrite($fp, "\n");
			fwrite($fp, "// *************************************************************************************************************\n");
			fwrite($fp, "// PARAMETRES DE CONNEXION A LA BASE DE DONNEE\n");
			fwrite($fp, "// *************************************************************************************************************\n");
			fwrite($fp, "\n");
			fwrite($fp, "// Base TRAVAIL\n");
			fwrite($fp, '$bdd_hote = "'.$_POST['host']."\";\n");
			fwrite($fp, '$bdd_user = "'.$_POST['username']."\";\n");
			fwrite($fp, '$bdd_pass = "'.$_POST['pass']."\";\n");
			fwrite($fp, '$bdd_base = "'.$_POST['dbname']."\";\n");
			fwrite($fp, "\n");
			fwrite($fp, "?>");
			fclose($fp);
			
			echo 'La connexion à la base de donnée à été vérifiée, les paramètres ont été inscrits dans le fichier de configuartion de Sooth ERP <br /><br /><br />';
			echo '<input type="submit" name="submit" class="button2b" id="submit_btn" value=" Continuer "/>';
			}

		// Fin étape 2
		break;

		//////////
		//
		// ETAPE 3
		//
		//////////

		case "3":

		// On charge le fichier de config de la BDD
		$fileConf = file ('../config/config_bdd.inc.php');


		// Initialisation des variales correspondant aux paramètres de connexion
		$host="";
		$user="";
		$pass="";
		$base="";


		// On parcourt le fichier de config.
		foreach ($fileConf as $line) {

			// Chargement du paramètre 'host' dans la variable
			if (preg_match('/bdd_hote/', trim($line))) {
			$host=preg_replace('/\$bdd_hote = "/', "",trim($line));
			$host=preg_replace('/";/', "",$host);
			}

			// Chargement du paramètre 'user' dans la variable
			if (preg_match('/bdd_user/', trim($line))) {
			$user=preg_replace('/\$bdd_user = "/', "",trim($line));
			$user=preg_replace('/";/', "",$user);
			}

			// Chargement du paramètre 'pass' dans la variable
			if (preg_match('/bdd_pass/', trim($line))) {
			$pass=preg_replace('/\$bdd_pass = "/', "",trim($line));
			$pass=preg_replace('/";/', "",$pass);
			}

			// Chargement du paramètre 'base' dans la variable
			if (preg_match('/bdd_base/', trim($line))) {
			$base=preg_replace('/\$bdd_base = "/', "",trim($line));
			$base=preg_replace('/";/', "",$base);
			}
		}



		// Initialisation de la connexion bdd
		$dsn = 'mysql:host='.$host;
		$dsn1 = 'mysql:host='.$host.';dbname='.$base;

		// Si la base n'existe pas, on la crèe (si possible, i.e. droits suffisants
		try {
			$dbh = new PDO ($dsn, $user, $pass);
			$create = $dbh -> exec("CREATE DATABASE IF NOT EXISTS `$base`;");
			} catch (PDOException $e) {
				// Echec, on crée un fichier log d'erreur
				$fp = fopen('error.log', 'a+');
				fwrite($fp, $e);
				fclose($fp);

				break;
				}


		try {
			$dbh1 = new PDO ($dsn1, $user, $pass);
			} catch (PDOException $e) {
				$fp = fopen('error.log', 'a+');
				fwrite($fp, $e);
				fclose($fp);
				break;
				}


				foreach (glob("./*.sql") as $filename) {

				// Recherche du zip des fichiers dans le dossier archives (i.e. commence par un chiffre)
				if (preg_match ('/^sooth/i',basename($filename))) {
					$file = file ("$filename");

					}
					else {
					$fp = fopen('error.log', 'a+');
					fwrite($fp, "\nFichier sql introuvable");
					fclose($fp);
					break;
					}
				}

		// Import du fichier sql

		$linebuffer='';
		$error=false;
		$queryCount=0;
		foreach ($file as $line)
		{
			if ( preg_match('/--.*\Z/',$line) OR preg_match('/^\Z/',$line))	{
			continue;
			}
			if (preg_match('/;\Z/', trim($line))){

				$linebuffer .=$line;
				$sqlQuery = $dbh1 -> exec(utf8_decode($linebuffer));
				$queryCount++;


				$linebuffer='';
				}
				else {
				$linebuffer .=$line;
			}

		}

		break;
	}



}





?>