<?php

//find user already exists
    if (!function_exists('verifylogin')) {
        function verifyLogin()
        {
            $db = getConnect();
            $q = $db->prepare("SELECT id, username, email, password AS pass FROM users 
                   WHERE (username = :identifiant OR email = :identifiant)
                   AND password = :password
                   AND active = '1'");
            $q->execute([
                'identifiant' => e($_POST['identifiant']),
                'password' =>  sha1(e($_POST['password']))
]);
            $user = $q -> fetch(PDO::FETCH_OBJ);
            $q->closeCursor();
            return $user;
        }
    }