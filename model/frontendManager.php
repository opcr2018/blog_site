<?php
require(MODEL.'_connect.php');

if (!function_exists('getUsers')) {
    function getUsers($id)
    {
        $db = getConnect();
        $q = $db->prepare("SELECT id, username FROM users WHERE id=?");
        $q->execute([$id]);
        $users = $q->fetchAll(PDO::FETCH_OBJ);
        $q->closeCursor();
        return $users;
    }
}

//compare what is it already in db
if (!function_exists('is_already_in_use')) {
    function is_already_in_use($field, $value, $table)
    {       
        $db = getConnect();
        $q = $db->prepare("SELECT id FROM $table WHERE $field = ?");
        $q->execute([$value]);

        $count = $q->rowCount();

        $q->closeCursor();

        return $count;
    }
}

//Find an user by id
if (!function_exists('find_user_by_id')) {
    function find_user_by_id($id)
    {
        $db = getConnect();
        $q = $db->prepare('SELECT * FROM users WHERE id = ?');
        $q->execute([$id]);
        $data = $q->fetch(PDO::FETCH_OBJ);
        $q->closeCursor();
        return $data;
    }
}