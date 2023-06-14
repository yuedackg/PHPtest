<?php
	require_once '../Classes/UserLogic.php';

	// error message.
	$err = [];

	// varidation 
	if ( !$username = filter_input( INPUT_POST, 'username')){
		$err[] = 'メールアドレスを記入してください.';
	}
	$password_condition = '/\A[a-z\d]{8,100}+\z/i';
	$password =filter_input(INPUT_POST, 'password');
	if (!preg_match($password_condition, $password)){
		$err[] = 'パスワードは英数字８文字以上１００文字以下にしてください';
	}
	$password_conf =filter_input(INPUT_POST, 'password');
	if ($password !== $password_conf){
		$err []='確認用パスワードと異なっています';
	}

	if ( count( $err) === 0 ){
		// ユーザ登録処理
		$hasCreated = UserLogic::createUser($_POST);

		if ( !$hasCreated){
			$err[] = '登録に失敗しました'
		}
	}
	

?>
<!DOCTYPE html>
<html lang="ja">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>ユーザ登録完了画面</title>
</head>
<body>
	<?php if (count( $err )> 0 ) : ?>
		<?php foreach( $err as $e ) : ?>
			<p><?php echo $e ?></p>
		<?php endforeach ?>
	<? else: ?>
		<p>ユーザ登録が完了しました。</p>
	<?php endif ?>

<a href="./signup_form.html">戻る</a>
</body>
</html>


