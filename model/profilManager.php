<?php
//Get list posts of user_id
if (!function_exists('getPosts')) {
    function getPosts()
    {
        $db = getConnect();
        $q = $db->prepare("SELECT id AS posted, user_id AS userid, title, detail, img, DATE_FORMAT(created_date, '%d/%m/%Y à %Hh%imin') AS date_fr
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

if (!function_exists('updateUser')) {
    function updateUser()
    {
        $db = getConnect();
        $q = $db->prepare('UPDATE users
                           SET name = :name, city = :city, country = :country,
                           twitter = :twitter, github = :github, bio = :bio
                           WHERE id = :id');
        $q->execute([
            'name'        => e($_POST['name']),
            'city'        => e($_POST['city']),
            'country'     => e($_POST['country']),
            'twitter'     => e($_POST['twitter']),
            'github'      => e($_POST['github']),            
            'bio'         => e($_POST['bio']),
            'id'          => get_session('user_id')
            
         ]);
    }
}

if (!function_exists('uploadAvatar')) {
    function uploadAvatar($targetFolder, $file_rand_name)
    {
        $db = getConnect();
        $q = $db->prepare("UPDATE users
        SET avatar = :avatar
        WHERE id = :id");
        $q->execute([
            'avatar' => $targetFolder.'/'.$file_rand_name,
            'id'     => $_SESSION['user_id']         
]);
    }
}


