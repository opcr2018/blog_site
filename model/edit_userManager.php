<?php

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
