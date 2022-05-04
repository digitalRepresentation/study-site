<?php
    require_once($_SERVER['DOCUMENT_ROOT'] . "/lib/config.php");
    // ログインページのコントローラー。
    
    session_start();
    //token作成 php 5 version
    $token = bin2hex(openssl_random_pseudo_bytes(32));
    $_SESSION['token'] = $token;

    //login失敗時のエラーメッセージ
    if(isset($_SESSION['message']))
        {
            echo $_SESSION['message'];
            unset($_SESSION['message']);
        }

    // PCバージョン
    include DOCUMENT_ROOT . "/login/index_pc.html";
?>