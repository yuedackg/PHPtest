<?php

require_once('../classes/UserLogic.php');

session_start();

// エラーメッセージ
$err = [];

// バリデーション
if(!$email = filter_input(INPUT_POST, 'email')){
    $err['email'] = 'メールアドレスを記入してください';
}

if(!$password = filter_input(INPUT_POST, 'password')){
    $err['password'] = 'パスワードを記入してください';
}

if(count($err) > 0){
    // エラーがあった場合は戻す
    $_SESSION = $err;
    header('Location: login.php');
    return;
}
// ログイン成功時の処理
echo 'ログインしました！';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ユーザ登録完了画面</title>
</head>
<body>
<?php if (count($err) > 0) : ?>
<!-- エラーがある場合にforeachで該当エラーを表示させる -->
    <?php foreach($err as $e) : ?>
    <p><?php echo $e ?></p>
    <?php endforeach; ?>
<!-- $err配列に何もない＝エラーがない　から完了画面を表示させる -->
<?php else: ?>
    <p>ユーザー登録が完了しました。</p>
<?php endif ; ?>
<a href="login.php">戻る</a>
</body>
</html>