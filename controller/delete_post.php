<?php
filter_guest();
require(MODEL.'postManager.php');


if (!empty($_GET['id'])) {
    $author = getAuthor();
    $user_id=$author->user_id;
    
    if ($user_id == get_session('user_id')) {
        deletePost();
        
        set_flash("Votre publication a été supprimée avec succès.", "info");
        redirect('admin&id='.get_session('user_id'));
    }
}


