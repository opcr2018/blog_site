<?php

//get all posts in db
if (!function_exists('getListPost')) {
    function getListPost()
    {
        $db = getConnect();
        $q = $db->prepare("SELECT post.id AS posted, img, title, detail, statut, users.username AS username, DATE_FORMAT(post.update_time, '%d/%m/%Y à %Hh%imin') AS date_fr
                           FROM post
                           LEFT OUTER JOIN users ON users.id = post.user_id
                           WHERE statut = '1'
                           ORDER BY post.id ASC");
        $q->execute();
        $posts = $q->fetchAll(PDO::FETCH_OBJ);
        return $posts;
    }
}

//get all comments
if (!function_exists('getListComment')) {
    function getListComment()
    {
        $db = getConnect();
        $q = $db->prepare("SELECT  comment.id, author, email, commContent, post_id, DATE_FORMAT(comment.created_date, '%d/%m/%Y à %Hh%imin') AS dated, post.title AS postitle
                           FROM comment
                           LEFT OUTER JOIN post ON post_id = post.id
                           WHERE active = '1'                           
                           ORDER BY comment.created_date DESC LIMIT 5");
        $q->execute();
        $comments = $q->fetchAll(PDO::FETCH_OBJ);
        return $comments;
    }
}

//find the author by id
if (!function_exists('getAuthor')) {
    function getAuthor()
    {
        $db = getConnect();
        $q = $db->prepare("SELECT user_id FROM post 
                   WHERE id = :id");
        $q->execute(
            ['id' => $_GET['id']]
        );
        $author = $q->fetch(PDO::FETCH_OBJ);
        return $author;
    }
}


//==========================================
// C.R.U.D.
//==========================================

//create a post
if (!function_exists('addPost')) {
    function addPost()
    {
        $db = getConnect();
        $q = $db->prepare("INSERT INTO post(img, title, postContent, detail,  user_id, created_date)
                           VALUES(:img, :title, :postContent, :detail,  :user_id, NOW())");
        $q->execute([
            'img'           => empty(e($_POST['linkImg'])) ? '' : e($_POST['linkImg']),
            'title'         => e($_POST['title']),
            'postContent'   => e($_POST['postContent']),
            'detail'        => e($_POST['detail']),
            'user_id'       => get_session('user_id')
        ]);
    }
}

//read one post
if (!function_exists('getPost')) {
    function getPost($postId)
    {
        $db = getConnect();
        $q = $db->prepare("SELECT post.id AS posted, img, title, detail, postContent, users.username AS username, DATE_FORMAT(post.update_time, '%d/%m/%Y à %Hh%imin') AS date_fr
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

//update a post
if (!function_exists('updatePost')) {
    function updatePost()
    {
        $db = getConnect();
        $q = $db->prepare("UPDATE post
                           SET img = :img, title = :title, statut = :statut, postContent = :postContent, detail = :detail,
                           user_id = :user_id, update_time = NOW()
                           WHERE id = :id");
        $q->execute([
            'img'           => empty(e($_POST['linkImg'])) ? '' : e($_POST['linkImg']),
            'title'         => e($_POST['title']),
            'postContent'   => e($_POST['postContent']),
            'detail'        => e($_POST['detail']),
            'statut'        => !empty($_POST['statut']) ? '1' : '0',
            'user_id'       => get_session('user_id'),
            'id'            => $_GET['id']

         ]);
    }
}


//delete a post
if (!function_exists('deletePost')) {
    function deletePost()
    {
        $db = getConnect();
        $q = $db->prepare("DELETE FROM post 
                           WHERE id = :id");
        $q->execute(
            ['id' => $_GET['id']]
        );
    }
}



//add a comment
if (!function_exists('addComment')) {
    function addComment()
    {
        $db = getConnect();
        $q = $db->prepare("INSERT INTO comment(author, email, commContent, user_id, post_id, created_date )
                           VALUES(:author, :email, :commContent, :user_id, :post_id, NOW())");
        $q->execute([
            'author'      => get_session('username'),
            'email'       => get_session('email'),
            'commContent' => e($_POST['commContent']),
            'post_id'     => e($_POST['post_id']),
            'user_id'     => get_session('user_id')
        ]);
    }
}

//fetch comments by id
if (!function_exists('getComment')) {
    function getComment()
    {
        $db = getConnect();
        $q = $db->prepare("SELECT id, author, email, commContent, post_id, DATE_FORMAT(created_date, '%d/%m/%Y à %Hh%imin') AS dated
                           FROM comment
                           WHERE (post_id = :post_id && active = '1')                           
                           ORDER BY created_date DESC");
        $q->execute(
            [
                'post_id' => $_GET['id']
            ]
        );
        $comments = $q->fetchAll(PDO::FETCH_OBJ);
        return $comments;
    }
}

//upload an img
if (!function_exists('uploadImg')) {
    function uploadImg()
    {
        $db = getConnect();
        $q = $db->prepare("UPDATE post
                               SET img = :img
                               WHERE id = :id");
        $q->execute([
            'img' => 'uploads/' . md5(uniqid(rand())) . strrchr($_FILES['img']['name'], "."),
            'id'     => $_GET['id']
        ]);
    }
}
