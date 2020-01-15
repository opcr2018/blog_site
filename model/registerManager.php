<?php

//add a user in db
if (!function_exists('adduser')) {
    function adduser()
    {
        $db = getConnect();
        $q = $db->prepare("INSERT INTO users(name, username, email, password)
                          VALUES(:name, :username, :email, :password)");
        $q->execute([
        'name'     => e($_POST['name']),
        'username' => e($_POST['username']),
        'email'    => e($_POST['email']),
        'password' => password_hash($_POST['password'], PASSWORD_BCRYPT, array($options = 12))
        ]);
    }
}