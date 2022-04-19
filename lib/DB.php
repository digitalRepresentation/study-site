<?php
// DB設定
define("DB_HOST_NAME", "");
define("DB_ID", "");
define("DB_PASSWORD", "");
define("DB_DB_NAME", "");

try {
    $pdo = new PDO('mysql:dbname=' . DB_DB_NAME . ';host=' . DB_HOST_NAME . ';charset=UTF8;', DB_ID, DB_PASSWORD);
} catch(PDOException $e) {
    echo 'DB接続エラー！：'.$e->getMessage();
}
?>