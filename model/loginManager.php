<?php

//find user already exists
    if (!function_exists('verifylogin')) {
        function verifyLogin()
        {
            $db = getConnect();
            $q = $db->prepare("SELECT id, username, email, password AS pass FROM users 
                   WHERE (username = :identifiant OR email = :identifiant)
                   AND active = '1'");
            $q->execute([
                'identifiant' => e($_POST['identifiant'])                
]);
            $user = $q -> fetch(PDO::FETCH_OBJ);
            
            return $user;
        }
    }