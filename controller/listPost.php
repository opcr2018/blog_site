<?php

require(MODEL.'postManager.php');

$posts = getListPost();

//display listpost
if (!$posts) {
    set_flash("Il n'y a pas d'articles disponibles", "info");
    redirect('home');
}

require(VIEW.'listPost.view.php');
