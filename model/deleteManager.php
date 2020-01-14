<?php

        $db = getConnect();
        $q = $db->prepare("SELECT user_id FROM post 
                           WHERE id = :id");
        $q->execute(
            ['id' => $_GET['id']]
        );
        $data = $q->fetch(PDO::FETCH_OBJ);
