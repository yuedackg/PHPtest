<?php

require_once('../classes/UserLogic.php');

// エラーメッセージ
$err = [];

// バリデーション
if(!$username = filter_input(INPUT_POST, 'username')){
    $err[] = 'ユーザ名を記入してください';
}

if(!$email = filter_input(INPUT_POST, 'email')){
    $err[] = 'メールアドレスを記入してください';
}

$password = filter_input(INPUT_POST, 'password');
// 正規表現
if(!preg_match("/\A[a-z\d]{8,100}+\z/i", $password)){
    $err[] = 'パスワードは英数字８文字以上１００文字以下にしてください。';
}

$password_conf = filter_input(INPUT_POST, 'password_conf');
if($password !== $password_conf){
    $err[] = '確認用パスワードと異なっています';
}

if(count($err) === 0){
    //ユーザを登録する処理
    $hasCreated = UserLogic::createUser($_POST);

    if(!$hasCreated){
        $err[] = '登録に失敗しました';
    }
}
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
<a href="signup_form.php">戻る</a>
</body>
</html>