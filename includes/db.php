<?php
session_start();
	$host = 'localhost';
	$dbname = 'garden_center';
	$user = 'gardener';
	$pass = 'supersecurepassword123';

	try {
		$DBH = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);
	}
	catch(PDOException $e) {
		echo $e->getMessage();
	}
?>