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

//Upload profile's img
$targetFolder = '/uploads/'.get_session('user_id');

if (!empty($_FILES) && $_FILES['img']['error'] == 0 && !empty($_GET['id'])) {
    $file_tmp_name = $_FILES['img']['tmp_name'];
    $targetPath = $_SERVER['DOCUMENT_ROOT'] . $targetFolder;

    if (!file_exists($targetPath)) {
        mkdir($targetPath, 0755, true);
    }
    $fileTypes = array('.jepg', '.jpg', '.png', '.gif');
    $file_name = $_FILES['img']['name'];    
    $file_extension = strrchr($file_name, ".");
    
    $file_rand_name = md5(uniqid(rand())).$file_extension;
    $file_path = rtrim($targetPath).'/'.$file_rand_name;
    

    if (in_array($file_extension, $fileTypes)) {
        if (move_uploaded_file($file_tmp_name, $file_path)) {   

            uploadPicture($targetFolder, $file_rand_name);          

            $img = $targetFolder.'/'.$file_rand_name;

            set_flash('Le fichier a été envoyé avec succès !', 'success');
            redirect_intent_or('profil&id='.get_session('user_id'));
            
        } else {
            set_flash("Une erreur est survenue lors de l'envoi du fichier.", 'warning');
        }
    } else {
        set_flash('Seuls les fichiers images (jpg, png, gif) sont autorisés', 'warning');
    }
}


require(VIEW.'edit_post.view.php');
