<?php
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

//Get list posts of user_id
if (!function_exists('getPosts')) {
    function getPosts()
    {
        $db = getConnect();
        $q = $db->prepare("SELECT id AS posted, title, detail, DATE_FORMAT(created_date, '%d/%m/%Y à %Hh%imin') AS date_fr
                           FROM  post
                           WHERE post.user_id = :user_id
                           ORDER BY created_date ASC");
        $q->execute(
            [
                'user_id' => $_GET['id']
            ]
        );
        $posts = $q->fetchAll(PDO::FETCH_OBJ);
        return $posts;
    }
}


