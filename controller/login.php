<?php
filter_loath();
require(MODEL.'loginManager.php');

//if the form is submit
if (isset($_POST['login'])) {

    //if all fields are fullfilled
    if (not_empty(['identifiant', 'password'])) {
        $errors = [];
        $identifiant = e($_POST['identifiant']);
        $password = sha1(e($_POST['password']));
        $user = verifyLogin();
        // var_dump($password);
        // die();
        if ($user) {                       

            $_SESSION['user_id']  = $user->id;
            $_SESSION['username'] = $user->username;
            $_SESSION['email']    = $user->email;
            $_SESSION['avatar']   = $user->avatar;
            

            redirect_intent_or('profil&id='.get_session('user_id'));
        } else {
            set_flash('Combinaison identifiant / password incorrecte', 'danger');
            save_input_data();
        }
    }
} else {
    clear_input_data();
}

include(VIEW.'login.view.php');
