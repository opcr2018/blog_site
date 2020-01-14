<?php
require(MODEL.'postManager.php');

//display listpost
if (isset($comments)) {
    echo '<h4>Laissez un commentaire un il s\'affichera ici !</h4>';
    redirect('home');
} else {
    $posts = getListPost(); 
    $comments = getListComment();
}

include(VIEW.'home.view.php');
