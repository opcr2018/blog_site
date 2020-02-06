<?php

//find user already exists
    if (!function_exists('verifylogin')) {
        function verifyLogin($identifiant, $password)
        {
            $db = getConnect();
            $q = $db->prepare("SELECT id, username, email, manager, password AS pass FROM users 
                   WHERE (username = :identifiant OR email = :identifiant)
                   AND active = 'Y'");
            $q->execute([
                'identifiant' => $identifiant,
                'password' => $password              
]);
            $user = $q -> fetch(PDO::FETCH_OBJ);
            
            return $user;
        }
    }