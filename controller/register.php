<?php
filter_loath();
require(MODEL . 'registerManager.php');

//Si le formulaire a été soumis
if (isset($_POST['register'])) {

    //Si tous les champs ont été complétés
    if (not_empty(['name', 'username', 'email', 'password', 'password_confirm'])) {
        $errors             = [];
        $name               = e($_POST['name']);
        $username           = e($_POST['username']);
        $email              = e($_POST['email']);
        $password           = e($_POST['password']);
        $password_confirm   = e($_POST['password_confirm']);

        if (mb_strlen($username) < 3) {
            $errors[] = "Pseudo trop court (Minimum 3 caractères)";
        }

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors[] = "Adresse email invalide";
        }

        if (mb_strlen($password) < 6) {
            $errors[] = "Mot de passe trop court (Minimum 6 caractères)";
        } else {
            if ($password != $password_confirm) {
                $errors[] = "Les deux mot de passe ne concordent pas !";
            }
        }

        if (is_already_in_use('name', $name, 'users')) {
            $errors[] = "Nom déjà utilisé";
        }

        if (is_already_in_use('username', $username, 'users')) {
            $errors[] = "Pseudo déjà utilisé";
        }

        if (is_already_in_use('email', $email, 'users')) {
            $errors[] = "Adresse email déjà utilisé";
        }

        if (count($errors) == 0) {

            //Mail send to validate the account by admin
            $to         = MAIL_ADMIN;
            $subject    = WEBSITE_NAME . " - ACTIVATION DE COMPTE";
            $password   = password_hash($_POST['password'], PASSWORD_BCRYPT, array($options = 12));
            $token      = sha1($_POST['pseudo'] . $_POST['email'] . $password);

            ob_start();
            require(VIEW . 'emails/admin_activation.tpml.php');
            $content = ob_get_clean();

            $headers = 'MIME-VERSION: 1.0' . "\r\n";
            $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

            mail($to, $subject, $content, $headers);

            //notification
            set_flash("Votre compte est en cours de validation, merci de patienter.", 'success');

            //add user in bdd
            adduser();

            redirect('home');
        } else {
            save_input_data();
        }
    } else {
        $errors[] = "Veuillez SVP remplir tout les champs";
        save_input_data();
    }
} else {
    clear_input_data();
}

include VIEW . 'register.view.php';
