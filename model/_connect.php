<?php
//Connect to database

define('DB_HOST', 'localhost');
define('DB_NAME', 'blog');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', 'root');

function getConnect()
{
    try {
        $db = new PDO("mysql:host=".DB_HOST.";charset=UTF8;dbname=".DB_NAME, DB_USERNAME, DB_PASSWORD);
        $db ->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        die('Erreur:'.$e->getMessage());
    }
    return $db;
}
