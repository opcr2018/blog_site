<?php
filter_guest();
require(ADMIN.'model_admin.php');
$posts = getListPostAdm();
$comments = getCommentAdm();

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

//get permission's profile with pagination
$countusers = getTotalUsers();

if ($countusers >= 1) {
    $users_par_page = 6;
    $beforeafter = 2;
    $total_page = ceil($countusers / $users_par_page);

    if (!empty($_GET['id']) && is_numeric($_GET['id']) && $_GET['id'] > 0) {
        $_GET['id'] = intval($_GET['id']);
        $page_num = $_GET['id'];
      
    } else {
        $page_num = 1;
    }

    if ($page_num < 1) {
        $page_num = 1;
    } elseif ($page_num > $total_page) {
        $page_num = 1;
    }

    $limit = 'LIMIT ' . ($page_num - 1) * $users_par_page . ',' . $users_par_page;

    $users = getListUsers($page_num, $limit);

    $pagination = '<nav><ul class="pagination justify-content-center">';
    if ($total_page != 1) {
        if ($page_num > 1) {
            $previous = $page_num - 1;
            $pagination .= '<li class="page-item"><a class="page-link" href="index.php?p=admin&id=' . $previous . '">Précédent</a></li>';
            for ($i = $page_num - $beforeafter; $i < $page_num; $i++) {
                if ($i > 0) {
                    $pagination .= '<li class="page-item"><a class="page-link"  href="index.php?p=admin&id=' . $i . '">' . $i . '</a></li>';
                }
            }
        }
        $pagination .= '<li class="page-item active"><a class="page-link"  href="#">' . $page_num . '</a></li>';
        for ($i = $page_num + 1; $i <= $total_page; $i++) {
            $pagination .= '<li class="page-item"><a class="page-link" href="index.php?p=admin&id=' . $i . '">' . $i . '</a></li> ';

            if ($i >= $page_num + $beforeafter) {
                break;
            }
        }
        if ($page_num != $total_page) {
            $next = $page_num + 1;
            $pagination .= '<li class="page-item"><a class="page-link" href="index.php?p=admin&id=' . $next . '">Suivant</a></li> ';
        }
    }
    $pagination .='</ul></nav>';
} else {
    set_flash('Aucun articles pour le moment', 'info');
    redirect('home');
}
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

//update statut of the posts
if (isset($activate == 'N')) {
    # code...
}

include(ADMIN.'admin.view.php');
