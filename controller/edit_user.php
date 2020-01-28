<?php
filter_guest();
require(MODEL.'profilManager.php');

if (!empty($_GET['id']) && $_GET['id'] === get_session('user_id')) {
    //recuperer les infos d'user en bdd
    $user = find_user_by_id($_GET['id']);

    if (!$user) {
        redirect('index.php');
    }
} else {
    redirect('profile.php?id=' . get_session('user_id'));
}

if (isset($_POST['update'])) {
    //if fields have been fullfilled
    if (not_empty([ 'name','city','country','bio'])) {
        $errors = [];

        $name        = e($_POST['name']);
        $city        = e($_POST['city']);
        $country     = e($_POST['country']);
        $bio         = e($_POST['bio']);

        //update profil
        updateUser();

        set_flash("Félicitations, votre profil a été mis à jour !");
        redirect('profil&id='.get_session('user_id'));
    } else {
        save_input_data();
        $errors[] = "Veuillez remplir tous les champs marqués d'un (*)";
    }
} else {
    clear_input_data();
}

//Upload profile's picture
$targetFolder = '/uploads/'.get_session('user_id');

if (!empty($_FILES) && $_FILES['avatar']['error'] == 0 && !empty($_GET['id'])) {
    $file_tmp_name = $_FILES['avatar']['tmp_name'];
    $targetPath = $_SERVER['DOCUMENT_ROOT'] . $targetFolder;

    if (!file_exists($targetPath)) {
        mkdir($targetPath, 0755, true);
    }
    $fileTypes = array('.jepg', '.jpg', '.png', '.gif');
    $file_name = $_FILES['avatar']['name'];    
    $file_extension = strrchr($file_name, ".");
    
    $file_rand_name = md5(uniqid(rand())).$file_extension;
    $file_path = rtrim($targetPath).'/'.$file_rand_name;
    

    if (in_array($file_extension, $fileTypes)) {
        if (move_uploaded_file($file_tmp_name, $file_path)) {            
            uploadAvatar($targetFolder, $file_rand_name);          

            $_SESSION['avatar'] = $targetFolder.'/'.$file_rand_name;

            set_flash('Le fichier a été envoyé avec succès !', 'success');
            redirect('profil&id='.$_GET['id']);
            
        } else {
            set_flash("Une erreur est survenue lors de l'envoi du fichier.", 'warning');
        }
    } else {
        set_flash('Seuls les fichiers images (jpg, png, gif) sont autorisés', 'warning');
    }
}

require(VIEW.'edit_user.view.php');
