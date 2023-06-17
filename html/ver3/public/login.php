<?php
	session_start();
	// var_dump($_SESSION);
	$err = $_SESSION;

	$_SESSION = array();
	session_destroy();
?>
<!DOCTYPE html>
<html lang="ja">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>ログイン画面</title>
	<style>
		.errComment{
			color: red;
			font: bold;
		}
	</style>
</head>

<body>
	<h2>ログインフォーム</h2>

	<?php if ( isset( $err['msg'])) : ?>
		<p><?php echo $err['msg'] ; ?></p>
	<?php endif; ?>

	<form action="top.php" method="POST">

		<p>
			<label for="email">メールアドレス：</label>
			<input type="email" name="email" id="">
			<?php if ( isset($err['email'])): ?>
				<p class="errComment"><?php echo $err['email'] ?></p>
			<?php endif ?>
		</p>
		<p>
			<label for="password">パスワード：</label>
			<input type="password" name="password" id="">
			<?php if ( isset($err['password']) ): ?>
				<p class="errComment"><?php echo $err['password'] ?></p>
			<?php endif; ?>
		</p>

		<p><input type="submit" value="ログイン"></p>

	</form>
	<a href="signup_form.html">新規登録はこちら</a>
</body>

</html>