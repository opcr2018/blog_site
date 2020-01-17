<?php
filter_guest();
require(ADMIN.'model_admin.php');
$posts = getListPostAdm();
$comments = getCommentAdm();


//update statut of the post published or draft
if (isset($_POST['statut'])) {
    //if fields have been fullfilled
    if (not_empty(['statut'])) {
        $errors = [];
        $statut = e($_POST['statut']);
        $postid = e($_POST['postid']);
        updateStatut();
        set_flash("L'article vient d'être publié", "info");
        redirect('admin');   
    }
} else {
    clear_input_data();
}

//delete a post
if (isset($_POST['delete'])) {
    if (not_empty(['delete'])) {
        $errors = [];
        $posted = e($_POST['posted']);  
        
        deletePostAdm();
        
        set_flash("Votre article a été supprimé avec succès.", "info");
        redirect('admin');
    }
    else {
        set_flash("l'article n'a pas été supprimé", "danger");
    }
}

//update statut of the comment published or draft
if (isset($_POST['active'])) {
    //if fields have been fullfilled
    if (not_empty(['active'])) {
        $errors = [];
        $activecomment = e($_POST['active']);
        $commentid = e($_POST['commentid']);
        updateActive();
        set_flash("Le commentaire vient d'être validé", "info");
        redirect('admin');
    }
} else {
    clear_input_data();
}


if (isset($_POST['delete'])) {
    if (not_empty(['delete'])) {
        $errors = [];
        $commented = e($_POST['commented']);
          
        deleteCommentAdm();
        
        set_flash("Votre commentaire a été supprimé avec succès.", "info");
        redirect('admin');
    }
    else {
        set_flash("le commentaire n'a pas été supprimé", "danger");
    }
}


include(ADMIN.'admin.view.php');
