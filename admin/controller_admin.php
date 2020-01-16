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
        $postId = e($_POST['postid']);
        updateStatut();
        set_flash("L'article vient d'être publié", "info");
        redirect('admin');
    } else {
    }
} else {
    clear_input_data();
}

if (isset($_POST['active'])) {
    //if fields have been fullfilled
    if (not_empty(['active'])) {
        $errors = [];
        
        $statut = e($_POST['active']);
        $commentid = e($_POST['commentid']);
        updateActive();
        set_flash("Le commentaire vient d'être validé", "info");
        redirect('admin');
    } else {
    }
} else {
    clear_input_data();
}


include(ADMIN.'admin.view.php');
