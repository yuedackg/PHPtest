<?php
require_once('./dbconnect.php');

class UserLogic
{
    /**
     * ユーザを登録する
     * @param array $userData
     * @return bool $result
     */
    public static function createUser($userData)
    {
        $result = false;
        $sql = 'INSERT INTO users (name, email, password) VALUES (?, ?, ?)';

        // ユーザデータを配列に入れる
        $arr = [];
        $arr[] = $userData['username'];
        $arr[] = $userData['email'];
        $arr[] = password_hash($userData['password'], PASSWORD_DEFAULT);
		// echo ($sql);

        // try{
        //     $stmt = connect()->prepare($sql);
        //     $result = $stmt->execute($arr);
        //     return $result;
        // }catch( Exception $e){
        //     return $result;
        // }
		$host = DB_HOST;
		$db = 	DB_NAME;
		$user =	DB_USER;
		$pass =	DB_PASS;
		$option = [
			PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION,
			PDO::ATTR_DEFAULT_FETCH_MODE=>PDO::FETCH_ASSOC,
			PDO::ATTR_EMULATE_PREPARES=>false,
		];
		$dsn = "mysql:host=$host;dbname=$db;charset=utf8mb4";

		
		try{
			$pdo = new PDO( $dsn, $user, $pass, $option );
			$sql = 'INSERT INTO users (name, email, password)  VALUES (:myid, :myemail, :mypass)';
			$stat = $pdo -> prepare( $sql);
			$stat -> execute( array(	
								":myid"=>$userData['username'],
								":myemail"=>$userData['email'],
								":mypass"=>$userData['password']
							));

		}catch( PDOException $e){
			echo  "Error: ". $e -> getMessage();

		}

    }
}

?>