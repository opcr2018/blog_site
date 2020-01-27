<?php
filter_guest();
require(ADMIN.'model_admin.php');
$posts = getListPostAdm();
$comments = getCommentAdm();
$users = getListUsers();

// ==========================================================
//Posts part
// ==========================================================
//update statut of the post published or draft
if (isset($_POST['statut'])) {
    //if fields have been fullfilled
    if (not_empty(['statut', 'postid'])) {
        $errors=[];
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
if (isset($_POST['deletepost'])) {
    if (not_empty(['deletepost'])) {
        $errors=[];
        $posted = e($_POST['posted']);
        
        deletePostAdm();
        
        set_flash("Votre article a été supprimé avec succès.", "info");
        redirect('admin');
    } else {
        set_flash("l'article n'a pas été supprimé", "danger");
    }
}


// ==========================================================
//Comments Part
// ==========================================================
//update statut of the comment published or draft
if (isset($_POST['valide'])) {
    //if fields have been fullfilled
    if (not_empty(['valide'])) {
        $errors=[];
        $valide = e($_POST['valide']);
        $commentid = e($_POST['commented']);
        updateActive();
        set_flash("Le commentaire vient d'être validé", "info");
        redirect('admin');
    }
} else {
    clear_input_data();
}

//delete a comment
if (isset($_POST['deletecomm'])) {
    if (not_empty(['deletecomm'])) {
        $errors=[];
        $commentid = e($_POST['commented']);
    
        deleteCommentAdm();
        
        set_flash("Votre commentaire a été supprimé avec succès.", "info");
        redirect('admin');
    } else {
        set_flash("le commentaire n'a pas été supprimé", "danger");
    }
}

// ==========================================================
// Management Part
// ==========================================================


//get permission's profile

//update information provided by the form
if (isset($_POST['updateInfo'])) {
    //if fields have been fullfilled
    if (not_empty(['manager', 'userid'])) {
        $errors=[];      
        
        $manager = e($_POST['manager']);
        $active  = e($_POST['active']);
        $id      = e($_POST['userid']);

        updateGrant($manager, $active, $id);

        set_flash("Les informations de l'utilisateur ont été mis à jour", "info");
        redirect('admin');
    }
} else {
    clear_input_data();
}



include(ADMIN.'admin.view.php');
