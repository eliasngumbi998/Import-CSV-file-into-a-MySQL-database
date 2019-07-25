<?php
	 /*
	  * sCRIPT TO IMPORT CSV FILE INTO DATABASE TABLE 
	 */

	require "./config.php";

	$db = new Database(); //instantiating the class class Database
	$db_conn = $db->connect(); // passing the connect method in the Database class

	$csvFileToLoad = "articles.csv"; //
	$isSavingToDB = false;

	if(($readCSVFile = fopen("{$csvFileToLoad}", "r")) != false) {

		while(!feof($readCSVFile) && ($data = fgetcsv($readCSVFile)) !== false) {
	      	
	      	try {
	      		$query = $db_conn->prepare("INSERT INTO articles (int_value,title,msg,created_at,updated_at) VALUES(:int_value,:title,:msg,:created_at,:updated_at)");
				$values = array("int_value"=>$data[0],"title"=>$data[1],"msg"=>$data[2],"created_at"=>$data[3],"updated_at"=>$data[4]);
				//data[0] to data[3] refers to the array position of the data content
				$query->execute($values);
				$isSavingToDB = true;

	      	} catch (PDOException $e) {
	      		die("Error: " . $e->getMessage());
	      	}
	    }

	    fclose($readCSVFile);

	    //check file imported
	    if($isSavingToDB) {
	    	echo "&#x1F601; Data Successfully imported into database";
	    }else{
	    	echo "&#x1F914; Something went wrong";
	    }
	}else{
		die("Can't read file");
	}


