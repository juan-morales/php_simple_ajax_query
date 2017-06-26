<?php
	/*
		Use this file, to code the logic to retrieve the last update received in the DB
	*/
	header('Access-Control-Allow-Origin:*');
	//header('Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept');
	header('Content-type: text/html; charset=ISO-8859-1');
		
	$db = new mysqli("127.0.0.1", "root", "password", "your_db");
	$resultado = $db->query("SELECT some_field from some_table where some_condition = 1");

	if (!$resultado) {
		echo "-";
		exit(0);
	}

	if ($resultado->num_rows > 0) {
		$row = $resultado->fetch_assoc();
		echo $row['some_field'];
	}
?>
