<?php

require( "env.php");

function connect(){
	$host = DB_HOST;
	$db = 	DB_NAME;
	$user =	DB_USER;
	$pass =	DB_PASS;

	$option = [
		PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES   => false,
	];



    $dsn = "mysql:host=$host;dbname=$db;charset=utf8mb4";

    try{
        $pdo = new PDO($dsn, $user, $pass, $options);
		return $pdo;
	}catch(PDOException $e){
        echo 'error: '. $e->getMessage();
    }
}

?>
