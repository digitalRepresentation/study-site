<?php
    require_once($_SERVER['DOCUMENT_ROOT'] . "/lib/config.php");
    require_once(DOCUMENT_ROOT .'/lib/DB.php');

    session_start();
    # session auth
    if($_SESSION['token'] !== $_POST['token']) {
        # 403error
        http_response_code(403);
        die('403 Forbidden!');
    }

    # SELECT
    $stmt = $pdo->prepare("SELECT * FROM user WHERE user_id = :id AND password = :password ");
    # PARAM
    $stmt->bindValue(':id', $_POST['id']);
    $stmt->bindValue(':password', $_POST['password']);
    # SQL実行
    $res = $stmt->execute();
    # SQL 一つの値を取得する。
    $data = $stmt->fetch();

    # login成功
    if ($data) {
        $_SESSION['login_id'] = $data['id'];
        $_SESSION['login_password'] = $data['password'];
        header("Location: " . HTTP_ADDRESS . "/index.php");
    # login失敗
    }else {
        # 失敗メッセージ
        $_SESSION['message'] = "IDまたはパスワードが間違いました。確認後試してくださいませ";
        header("Location: " . HTTP_ADDRESS . "/login/index.php");
    }
    
    

?>