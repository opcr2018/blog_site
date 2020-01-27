<?php

 if (!function_exists('verifActivation')) {
     function verifActivation()
     {
         $db = getConnect();
         $q = $db->prepare('SELECT email, password FROM users WHERE username = ?');
         $q->execute(['username']);

         $data = $q->fetch(PDO::FETCH_OBJ);
         return $data;
     }
 }

 if (!function_exists('activation')) {
     function activation()
     {
         $db = getConnect();
         $q = $db->prepare("UPDATE users SET active = 'Y' WHERE username = ?");
         $q->execute(['username']);
     }
 }