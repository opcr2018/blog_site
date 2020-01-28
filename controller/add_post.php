<?php
filter_guest();
require(MODEL.'postManager.php');

if (!empty($_GET['id']) && $_GET['id'] === get_session('user_id')) {
    //recuperer les infos d'user en bdd
    $user = find_user_by_id($_GET['id']);

    if (!$user) {
        redirect('index.php');
    }
} else {
    if (isset($_POST['addPost'])) {
    
    //if fields have been fullfilled
        if (not_empty(['title','detail','postContent'])) {
            $errors = [];
           
            $title          = e($_POST['title']);
            $detail         = e($_POST['detail']);
            $postContent    = e($_POST['postContent']);

            if (mb_strlen($title) < 8) {
                $errors[] = "Titre trop court (Minimum 3 caractères)";
            }

            if (mb_strlen($detail) < 6) {
                $errors[] = "Votre résumé n'est pas assez long (Minimum 6 caractères)";
            }
                        
            addPost($title, $detail, $postContent);

            set_flash("Votre article a été envoyé à la modération, merci de bien vouloir patienter...");
            redirect('profil&id='.get_session('user_id'));
        } else {
            save_input_data();
            $errors[] = "Veuillez remplir tous les champs marqués d'un (*)";
        }
    } else {
        clear_input_data();
    }
}


require(VIEW.'add_post.view.php');
