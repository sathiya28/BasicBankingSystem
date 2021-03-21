<?php
ini_set('display_errors','on');
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "transaction";

$conn = mysqli_connect($servername, $username, $password, $dbname);


	if(!$conn){
		die("Could not connect to the database due to the following error --> ".mysqli_connect_error());
	}

?>