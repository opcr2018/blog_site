<?php

if (isset($_POST['contact'])) {
    if (not_empty(['username', 'email', 'mailcontent'])) {
        $errors = [];

        $username = e($_POST['username']);
        $email = e($_POST['email']);
        $mailcontent = e($_POST['mailcontent']);
        
        
        if (is_logged_in()) {
            $username = get_session('username');
            $email = get_session('email');
        }
               

        if (!preg_match(' /^[a-zA-Z][^0-9]$/', $username)) {
            $errors[] = "Pseudo invalide";
        }

         if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors[] = "Adresse email invalide";
        }      
       

        if (count($errors) == 0) {
            $to = MAIL_ADMIN;
            $subject = WEBSITE_NAME . " - Un message vient d'arriver !";
        }
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
        $errors[] = "Veuillez SVP remplir tout les champs";
        save_input_data();
    }
} else {
    clear_input_data();
}


include(VIEW.'contact.view.php');