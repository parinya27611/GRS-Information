<?php
$servername = "localhost";
$username = "id8769990_ojoe";
$password = "17599";
$database="id8769990_db_grsgroup";

// Create connection
$conn = new mysqli($servername, $username,$password,$database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$conn->query("SET NAMES UTF8");
	$conn->query("SET character_set_results=UTF8");
	$conn->query("SET character_set_client=UTF8");
	$conn->query("SET character_set_connection=UTF8");


?>