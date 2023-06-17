<?php

require_once '../dbconnect.php';

class UserLogic
{
	/**
	 * ユーザを登録する
	 * @param array $userData;
	 * @return  bool $result;
	 * 
	 */
	public static function createUser($userData)
	{
		$result=false;
		$sql = 'INSERT INTO users (name , email, password) VALUES ( ?, ?, ?)';

		$arr = [];
		$arr [] = $userData['username'];
		$arr [] = $userData['email'];
		$arr [] = password_hash( $userData['password'], PASSWORD_DEFAULT);

		try{
			$stmt = connect()-> prepare($sql);
			$result = $stmt->execute($arr);
			return $result;	
		}catch( Exception $e){
			return $result;

		}


	}
	/**
	 * ログイン処理
	 * @param string $email
	 * @param string $password
	 * @return bool $result
	 */
	public static function login( $email ,$password){
		echo "login() process...";

		$result = false;
		// ユーザをemailから検索して取得
		$user = self::getUserByEmail( $email);
		echo "getUserByEmail() return code  ". $user;

		if ( !$user){
			$_SESSION['msg'] = 'emailが一致しません。';
			return $result;
		}
		
		if(password_verify($password, $user['pasword'])){
			// ログイン成功時の処理
			session_regenerate_id(true);
			$_SESSION['login_useer'] = $user;
			$result - true;
			return $result;
		}

		$_SESSION['msg'] = 'password not mutch.';
		return $result;

	}
	/**
	 * email からユーザを取得
	 * @parame string $email
	 * @return array|bool $user|false
	 */
	public static function getUserByEmail( $email ){
		echo 'getUserByEmail('.$email.') process...';

		$sql = 'SELECT * FROM users WHERE email=?';

		$arr = [];
		$arr[] = $email;

		try{
			echo 'SQL: '.$sql;

			$stmt = connect()->prepare($sql);
			$stmt->execute( $arr);
			$user = $stmt->fetch();
			return $user;
		}catch(Exception $e){
			return false;
		}
	}
}