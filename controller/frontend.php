<?php

//Never trust a user
if (!function_exists('e')) {
    function e($string)
    {
        if ($string) {
            return htmlspecialchars($string);
            //return htmlsentities($string, ENT_QUOTES, 'UTF-8', false);
            //return strip_tags($string);
        }
    }
}

//Get a session value by key
if (!function_exists('get_session')) {
    function get_session($key)
    {
        if ($key) {
            return !empty($_SESSION[$key])
                ? e($_SESSION[$key])
                : null;
        }
    }
}

//Display Gravatar's picture
if (!function_exists('get_avatar_url')) {
    function get_avatar_url($email, $size = 25)
    {
        return "https://www.gravatar.com/avatar/" . md5(strtolower(trim(e($email)))) . "?s=" . $size;
    }
}

//Check if an user is connected
if (!function_exists('is_logged_in')) {
    function is_logged_in()
    {
        return isset($_SESSION['user_id']) || isset($_SESSION['username']) && isset($_SESSION['manager']);
    }
}

//Check if fields are empty or not
if (!function_exists('not_empty')) {
    function not_empty($fields = [])
    {
        if (count($fields) != 0) {
            foreach ($fields as $field) {
                if (empty($_POST[$field]) || trim($_POST[$field]) == "") {
                    return false;
                }
            }
            return true;
        }
    }
}


//Show notification with right color
if (!function_exists('set_flash')) {
    function set_flash($message, $type = 'info')
    {
        $_SESSION['notification']['message'] = $message;
        $_SESSION['notification']['type'] = $type;
    }
}

//Redirect to the right page
if (!function_exists('redirect')) {
    function redirect($page)
    {
        header('Location:index.php?p=' . $page);
        exit();
    }
}

//Save information in bdd
if (!function_exists('save_input_data')) {
    function save_input_data()
    {
        foreach ($_POST as $key => $value) {
            if (strpos($key, 'password') === false) {
                $_SESSION['input'][$key] = $value;
            }
        }
    }
}

//Take back information saved in bdd to fill the form
if (!function_exists('get_input')) {
    function get_input($key)
    {
        return !empty($_SESSION['input'][$key])
            ? e($_SESSION['input'][$key])
            : null;
    }
}

//erase information in the form
if (!function_exists('clear_input_data')) {
    function clear_input_data()
    {
        if (isset($_SESSION['input'])) {
            $_SESSION['input'] = [];
        }
    }
}

//link actif on the nav
if (!function_exists('set_active')) {
    function set_active($file)
    {
        $path = explode('p=', $_SERVER['QUERY_STRING']);
        $page = array_pop($path);
        if ($page == $file) {
            return "active";
        } else {
            return '';
        }
    }
}

//filter guest
if (!function_exists('filter_guest')) {
    function filter_guest()
    {
        if (!isset($_SESSION['user_id']) && !isset($_SESSION['username'])) {
            $_SESSION['forwarding_url'] = explode("p=", $_SERVER['QUERY_STRING']);
            $_SESSION['notification']['message'] = 'Vous devez vous connecter...';
            $_SESSION['notification']['type'] = 'danger';
            redirect('login');
        }
    }
}

//filter loath
if (!function_exists('filter_loath')) {
    function filter_loath()
    {
        if (isset($_SESSION['user_id']) && isset($_SESSION['username'])) {
            redirect('home');
        }
    }
}


//redirect friendly
if (!function_exists('redirect_intent_or')) {
    function redirect_intent_or($default_url)
    {
        if ($_SESSION['forwarding_url']) {            
            $url = array_pop($_SESSION['forwarding_url']);            
        } else {
            $url = $default_url;            
        }
        $_SESSION['forwarding_url'] = null;
        redirect($url);
    }
}
