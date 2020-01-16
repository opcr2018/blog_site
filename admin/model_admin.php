<?php

//get all posts in db
if (!function_exists('getListPostAdm')) {
    function getListPostAdm()
    {
        $db = getConnect();
        $q = $db->prepare("SELECT post.id AS posted, img, title, detail, statut, users.username AS username, DATE_FORMAT(post.update_time, '%d/%m/%Y à %Hh%imin') AS date_fr
                           FROM post
                           LEFT OUTER JOIN users ON users.id = post.user_id
                           WHERE statut ='0'
                           ORDER BY post.id ASC");
        $q->execute();
        $posts = $q->fetchAll(PDO::FETCH_OBJ);
        return $posts;
    }
}

//read one post
if (!function_exists('getPostAdm')) {
    function getPostAdm($postId)
    {
        $db = getConnect();
        $q = $db->prepare("SELECT post.id AS posted, statut, DATE_FORMAT(post.update_time, '%d/%m/%Y à %Hh%imin') AS date_fr
                   FROM post
                   LEFT OUTER JOIN users ON users.id = post.user_id
                   WHERE post.id = ?
                   ORDER BY post.id ASC");
        $q->execute([$postId]);
        $postId = $q->fetch(PDO::FETCH_OBJ);
        $q->closeCursor();
        return $postId;
    }
}

//update statut 
if (!function_exists('updateStatut')) {
    function updateStatut()
    {
        $db = getConnect();
        $q = $db->prepare("UPDATE post
                           SET statut = :statut, update_time = NOW()
                           WHERE id = :id");
        $q->execute([
            'statut'        => !empty($_POST['statut']) ? '1' : '0',
            'id'            => e($_POST['postid'])
         ]);
    }
}
