<?php

//get all posts in db
if (!function_exists('getListPostAdm')) {
    function getListPostAdm()
    {
        $db = getConnect();
        $q = $db->prepare("SELECT post.id AS posted, img, title, detail, statut, users.username AS username, DATE_FORMAT(post.update_time, '%d/%m/%Y') AS date_fr
                           FROM post
                           LEFT OUTER JOIN users ON users.id = post.user_id
                           WHERE statut ='0'
                           ORDER BY post.id ASC");
        $q->execute();
        $posts = $q->fetchAll(PDO::FETCH_OBJ);
        return $posts;
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

//get all comments in db
if (!function_exists('getCommentAdm')) {
    function getCommentAdm()
    {
        $db = getConnect();
        $q = $db->prepare("SELECT comment.id AS commentid, author, email, active, commContent, post_id, post.title AS poststitle, DATE_FORMAT(comment.created_date, '%d/%m/%Y à %Hh%imin') AS dated
                           FROM comment
                           LEFT OUTER JOIN post ON post.id = post_id 
                           WHERE active = '0'                           
                           ORDER BY comment.created_date DESC");
        $q->execute();
        $data = $q->fetchAll(PDO::FETCH_OBJ);
        return $data;
    }
}

//update statut
if (!function_exists('updateActive')) {
    function updateActive()
    {
        $db = getConnect();
        $q = $db->prepare("UPDATE comment
                           SET active = :active
                           WHERE id = :id");
        $q->execute([
            'active'        => !empty($_POST['active']) ? '1' : '0',
            'id'            => e($_POST['commentid'])
         ]);
    }
}