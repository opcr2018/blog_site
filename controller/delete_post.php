<?php
filter_guest();
require(MODEL.'postManager.php');


if(!empty($_GET['id'])) {
    require(MODEL.'deleteManager.php');
    $user_id=$data->user_id;
    
    if($user_id == get_session('user_id'))
    {
        deletePost();
        
        set_flash("Votre publication a été supprimée avec succès.", "info");
    }
}

redirect('profil&id=' . get_session('user_id'));
