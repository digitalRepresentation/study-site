<?php
    require_once($_SERVER['DOCUMENT_ROOT'] . "/lib/config.php");
    require_once(DOCUMENT_ROOT .'/lib/DB.php');

    session_start();
    if($_SESSION['token'] !== $_POST['token']) {
        //403error
    }

    //SELECT
    $stmt = $pdo->prepare("SELECT * FROM user WHERE user_id = :id AND password = :password ");
    //PARAM
    $stmt->bindValue(':id', $_POST['id']);
    $stmt->bindValue(':password', $_POST['password']);
    //SQL実行
    $res = $stmt->execute();
    
    $data = $stmt->fetch();

    #loginが可能になった。
    if ($data) {
        
        $_SESSION['login_id'] = $data['id'];
        $_SESSION['login_password'] = $data['password'];
        include DOCUMENT_ROOT . "/index.php";
    }else {
        echo "IDまたはパスワードが違います。";
        include DOCUMENT_ROOT . "/login/index_pc.html";
    }
    
    

?>