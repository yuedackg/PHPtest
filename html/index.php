<?php

function connect_db(){
	$host = "mysql5.7";
	$db = "test";
	$charset ="utf8"; 
	$dsn = "mysql:host=$host; dbname=$db; charset=$charset";

	$user = "test";
	$pass = "test";

	$option = [
		PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
		PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
		PDO::ATTR_EMURATE_PREPARES => false,
	
	];

	try{
		$pdo = new PDO( $dsn, $user, $pass, $option);

	}catch( PDOException $e){
		echor $e -> getMessage();
	}
	return $pdo;

}

$pdo 	= connect_db();
$sql 	= "SELECT * FROM user";
$stmt 	= $pdo -> prepare( $sql);
$stmt -> execute();

$result = $stmt -> fetchall();

?>
<!DOCTYPE html>
<html lang="ja">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
</head>
<body>
	<?php
		foreach( $result as $r ){
			echo 'username: '. $r["username"];
			echo '<br>'
			echo 'email: '. $r["email"];
			echo '<hr>'
			
		}
	?>
</body>
</html>