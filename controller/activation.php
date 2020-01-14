<?php
require(MODEL.'activationManager.php');

//use this when the activation is made by the user
if (
    !empty($_GET['p'])
    && is_already_in_use('pseudo', $_GET['p'], 'users')
    && !empty($_GET['token'])
  ) {
    $pseudo = $_GET['p'];
    $token = $_GET['token'];
    
    verifActivation();

    $token_verif = sha1($pseudo . $data->email . $data->password);
    
    if ($token == $token_verif) {
        activation();
        set_flash('Votre Compte a été activé !');
        redirect('login');
    } else {
        set_flash('Jeton de sécurité invalide', 'danger');
        redirect('home');
    }
} else {
    redirect('home');
}
