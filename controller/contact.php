<?php

if (isset($_POST['contact'])) {
    if (not_empty(['username', 'email', 'mailcontent'])) {
        $errors = [];
        
        if (is_logged_in()) {
            $username = get_session('username');
            $email = get_session('email');
        } else {
            $username = e($_POST['username']);
            $email = e($_POST['email']);
        }

        $mailcontent = e($_POST['mailcontent']);

        if (mb_strlen($username) < 3) {
            $errors[] = "Pseudo trop court (Minimum 3 caractères)";
        }

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors[] = "Adresse email invalide";
        }

        if (is_already_in_use('username', $username, 'users')) {
            $errors[] = "Pseudo déjà utilisé";
        }

        if (is_already_in_use('email', $email, 'users')) {
            $errors[] = "Adresse email déjà utilisé. Merci de vous connecter.";
        }
      
        if (count($errors) == 0) {
            $to = MAIL_ADMIN;
            $subject = WEBSITE_NAME . " - Un message vient d'arriver !";

            ob_start();
            require(VIEW.'emails/contact.tpml.php');
            $content = ob_get_clean();

            $headers = 'MIME-VERSION: 1.0' . "\r\n";
            $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

            mail($to, $subject, $content, $headers);

            //notification
            set_flash("Votre message a bien été envoyé.", 'success');
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


include(VIEW.'contact.view.php');
