<?php

require_once('env.php');

function connect()
{
	$host = DB_HOST;
	$db = DB_NAME;
	$user = DB_USER;
	$pass = DB_PASS;

	$dsn = "mysql:host=$host;dbname=$db;charset=utf8mb4";
	echo $dsn ;
	echo "<br>";

	$pdo =null;
	try {
		$pdo = new PDO($dsn, $user, $pass, [
			PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
			PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
		]);
		// var_dump($pdo->errorInfo());

		return $pdo;
	} catch (PDOException $e) {
		echo "接続失敗です" . $e->getMessage();
		// var_dump($pdo->errorInfo());

		exit();
	}


}
