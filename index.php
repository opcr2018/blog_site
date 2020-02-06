<?php
// var_dump($_SERVER);
// die();
session_start();
require('Config/constants.php');
require(CONTROLLER.'frontend.php');
require(MODEL.'frontendManager.php');

//Routing
$p = 'home';
if (!empty($_GET['p']) && $_GET['p']) {
    $p = $_GET['p'];
}

switch ($p) {
    case 'home':
    {
        include(CONTROLLER.'home.php');
        break;
    }
    case 'listpost':
    {
        include(CONTROLLER.'listPost.php');
        break;
    }
    case 'post':
    {
        include(CONTROLLER.'post.php');
        break;
    }
    case 'addpost':
        {
            include(CONTROLLER.'add_post.php');
            break;
        }
    case 'editpost':
    {
        include(CONTROLLER.'edit_post.php');
        break;
    }
    case 'deletepost':
        {
            include(CONTROLLER.'delete_post.php');
            break;
        }
    case 'portfolio':
    {
        include(CONTROLLER.'portfolio.php');
        break;
    }
    case 'about':
    {
        include(CONTROLLER.'about.php');
        break;
    }
    case 'login':
    {
        include(CONTROLLER.'login.php');
        break;
    }
    case 'changepass':
        include(CONTROLLER.'change_password.php');
        break;
        
    case 'logout':
    {
        include(CONTROLLER.'logout.php');
        break;
    }
    case 'register':
    {
        include(CONTROLLER.'register.php');
        break;
    }
    case 'profil':
    {
        include(CONTROLLER.'profile.php');
        break;
    }
    case 'admin':
        {
            include(ADMIN.'controller_admin.php');
            break;
        }
          
    case 'editprofil':
    {
         include(CONTROLLER.'edit_user.php');
        break;
    }

    case 'contact':
        {
             include(CONTROLLER.'contact.php');
            break;
        }

    default:
    {
        include(VIEW.'404.php');
        break;
    }
}
