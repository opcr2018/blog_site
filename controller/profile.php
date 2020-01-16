<?php
filter_guest();
require(MODEL.'profilManager.php');

if (!empty($_GET['id'])) {
    //recuperer les infos d'user en bdd
    $user = find_user_by_id($_GET['id']);
    $posts = getPosts($_GET['id']);   

    if (!$user) {
        redirect('home');
    }
} else {
    redirect('profil&id='.$user);
}


include(VIEW.'profile.view.php');
