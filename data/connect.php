<?php

require_once "../conf.php";

try {
    $dsn = sprintf("mysql:dbname=%s;port=%d;host=%s;charset=utf8;", __DBNAME__ , __DBPORT__ , __DBHOST__ );
    $pdo = new \PDO($dsn,__DBUSER__, __DBPASSWORD__);
    $pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
}catch (Exception $e){
    die($e->getMessage());
}