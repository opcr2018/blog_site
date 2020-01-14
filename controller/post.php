<?php
require(MODEL.'postManager.php' );

//display a post
if (!isset ($post) && $_GET['id'] < 0 ) {
    set_flash("Il n'y a pas d'articles disponibles", "info");
    redirect('home');
} else {
    $user = find_user_by_id($_GET['id']); 
    $post = getPost($_GET['id']);
    $comments = getComment($_GET['id']);  
}

//add a comment
if (isset($_POST['comment'])) {

    filter_guest();

    if (!empty($_POST['commContent'])) {
        $errors = [];

        $author         = get_session('username');
        $email          = get_session('email');
        $commContent    = e($_POST['commContent']);
        $postid         = e($_POST['post_id']);        
        
        if (mb_strlen($_POST['commContent']) < 3) {
            $errors[] = "Minimum 3 caractères";
        }

        if (mb_strlen($_POST['commContent']) > 140) {
            $errors[] = "Maximum 140 caractères";
        }

        if (count($errors) == 0) {
            
            addComment(); 

            set_flash('le message a été envoyé en attente de modération', 'info');
            //redirect_intent_or($url);

        } else {
            set_flash('Contenu invalide', 'warning');
            //redirect_intent_or($url);            
        }
    }
}

include(VIEW.'post.view.php');