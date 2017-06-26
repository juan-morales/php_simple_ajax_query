<?php
	/*
		File used to code the logic to perform the Search determined by the Query
	*/
	header('Access-Control-Allow-Origin:*');
	//header('Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept');
	header('Content-type: text/html; charset=ISO-8859-1');
	
	$db = new mysqli("localhost", "root", "", "your_db");
	
	if ($db->connect_errno) {
	    echo "<p class=\"w3-red\">DB Service not available.</p>";// . $db->connect_error;
	    exit(0);
	}

	/*List your parameters here*/	
	$p_1 = mysqli_real_escape_string($db,$_POST['parameter_1']);
	if (strlen($p_1) == 0){
		echo "<p><b>Parameter 1 is required.</b></p>";
		exit(0);
	} 

	$p_2 = mysqli_real_escape_string($db,$_POST['parameter_2']);
	if (strlen($p_2) == 0){
		echo "<p><b>Parameter 2 is required.</b></p>";
		exit(0);
	} 
	
	/*
		Perform your query
	*/
	$result = $db->query("SELECT some_field from some_table where some_condition = " . $p_1 . " AND some_condition = " . $p_2);
	
	if (!$result) {
		echo "<p><b>No results found.</b></p>";
		exit(0);
	}
	

	/* Your results formatted */
	if ($result->num_rows > 0) {
		$row = $result->fetch_assoc();
		
		/*Here your can create your HTML results set, echoing it.*/
		
	} else {
		echo "<p><b>No results available.</b></p>";
		exit(0);
	}

	
?>