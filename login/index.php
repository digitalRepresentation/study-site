<?php
    require_once($_SERVER['DOCUMENT_ROOT'] . "/lib/config.php");
    // ログインページのコントローラー。
    
    session_start();
    //token作成 php 5 version
    $token = bin2hex(openssl_random_pseudo_bytes(32));
    $_SESSION['token'] = $token;

    //login失敗時のエラーメッセージ
    if(!empty($_SESSION['message'])) {
        $message = $_SESSION['message'];
        unset($_SESSION['message']);
    }else {
        $message = '';
    }
    // PCバージョン
    include DOCUMENT_ROOT . "/login/index_pc.html";
?>