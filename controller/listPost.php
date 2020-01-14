<?php

require(MODEL.'postManager.php' );

//display listpost
if (isset ($posts)) {
    set_flash("Il n'y a pas d'articles disponibles", "info");
    redirect('home');
} else {
    $posts = getListPost();
}

require(VIEW.'listPost.view.php');
