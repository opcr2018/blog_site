<?php
filter_guest();
require(MODEL.'postManager.php');

$post = getPost($_GET['id']);

if (isset($_POST['edit']) ) {
    //if fields have been fullfilled
    if (not_empty(['title','detail','statut', 'postContent'])) {
        $errors = [];
             
        $title          = e($_POST['title']);
        $detail         = e($_POST['detail']);
        $postContent    = e($_POST['postContent']);
        $statut         = e($_POST['statut']);

        updatePost();

        set_flash("L'article a été modifié.");
        redirect('profil&id='.get_session('user_id'));
    } else {
        save_input_data();
        $errors[] = "Veuillez remplir tous les champs marqués d'un (*)";
    }
} else {
    clear_input_data();
}

require(VIEW.'edit_post.view.php');
