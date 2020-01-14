<?php

//add a user in db
if (!function_exists('adduser')) {
    function adduser()
    {
        $db = getConnect();
        $q = $db->prepare("INSERT INTO users(name, username, email, password)
                          VALUES(:name, :username, :email, :password)");
        $q->execute([
        'name'     => $_POST['name'],
        'username' => $_POST['username'],
        'email'    => $_POST['email'],
        'password' => sha1($_POST['password'])
        ]);
    }
}