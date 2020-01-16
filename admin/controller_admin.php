<?php
filter_guest();
require(ADMIN.'model_admin.php');
$posts = getListPostAdm();


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


include(ADMIN.'admin.view.php');
