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

//delete a post
if (!function_exists('deletePostAdm')) {
    function deletePostAdm()
    {
        $db = getConnect();
        $q = $db->prepare("DELETE FROM post 
                           WHERE id = :id");
        $q->execute([
            'id' => $_POST['postid']
        ]);
    }
}


//get all comments in db
if (!function_exists('getCommentAdm')) {
    function getCommentAdm()
    {
        $db = getConnect();
        $q = $db->prepare("SELECT comment.id AS commented, author, email, active, commContent, post_id, post.title AS poststitle, DATE_FORMAT(comment.created_date, '%d/%m/%Y à %Hh%imin') AS dated
                           FROM comment
                           LEFT OUTER JOIN post ON post.id = post_id 
                           WHERE active = '0'                           
                           ORDER BY comment.created_date DESC");
        $q->execute();
        $data = $q->fetchAll(PDO::FETCH_OBJ);
        return $data;
    }
}

//activate comment
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

//delete a comment
if (!function_exists('deleteCommentAdm')) {
    function deleteCommentAdm()
    {
        $db = getConnect();
        $q = $db->prepare("DELETE FROM comment 
                           WHERE id = :id");
        $q->execute([
            'id' => e($_POST['commentid'])
            ]);
    }
}

//get a list of users
if (!function_exists('getListUsers')) {
    function getListUsers()
    {
        $db = getConnect();
        $q = $db->prepare("SELECT users.id AS usered, username, email, active, manager, city, country, twitter, github, avatar, DATE_FORMAT(create_time, '%d/%m/%Y') AS usersdate 
                          FROM users
                          ORDER BY active AND username DESC"
    );
        $q->execute();
        $users = $q->fetchAll(PDO::FETCH_OBJ);
        return $users;
    }
}

//update the grant
if (!function_exists('updateGrant')) {
    function updateGrant()
    {
        $db = getConnect();
        $q = $db->prepare("UPDATE users
                           SET manager = :manager, active = :active
                           WHERE id = :id");
        $q->execute([
            //'manager'       => $_POST['manager'],
            'active'        => $_POST['activate'],
            'id'            => $_POST['userid']
         ]);
    }
}

