<?php
	#paramètre de connexion à la base de donnée
	$user = "root";
	$pass = "1234";
	$port = "3306";
	$host = "127.0.0.1";
	$dbame = "iot_led_pilot";
	$led_id = 1;

	#on essaye de se connecter à la base de donnée
	try {
		$bdd = new PDO("mysql:host={$host};port={$port};dbname={$dbame}", $user, $pass);

	} catch (PDOException $e) {
		echo "Erreur !: " . $e->getMessage() . "<br/>";
		die();
	}

	#on récupère le status de la led enregistré dans la base de donnée
	$request = $bdd->prepare("SELECT status FROM leds WHERE id = {$led_id}");
	$request->execute();
	$value = $request->fetchColumn();

	#on stocke ici le status de la led qu'on transforme en booléen (plus facile pour les conditions dans le code html)
	$led_status = $value == 1 ? true : false;

	#lorsque nous appuions sur un bouton (allumer ou éteindre)
	if(isset($_POST['submit'])){
		#en fonction du bouton on défini le futur status 
		$status = $_POST['submit'] == "on" ? "1" : "0";
		#on execute le code python en passsant le status voulu via les paramètres
		shell_exec("python3 python/script.py {$status}");

		#pour changer la couleur de l'affichage du status (ne s'actualise pas tout seul car methode POST)
		if($led_status && $status == "0") {
			$led_status = false;

		} else if($led_status == false && $status == "1") {
			$led_status = true;
		}
	}

?>