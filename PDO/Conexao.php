<?php

define("HOST", "localhost");
define("SGBD", "mysql");
define("DB_NAME", "app-php-mvc");
define("USER", "root");
define("PWSD", "root");

function Conectar() {
    try {
        $conn = new PDO(SGBD . ":host=" . HOST . ";dbname=" . DB_NAME, USER, PWSD, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $conn;
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}
