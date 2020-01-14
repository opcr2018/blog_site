<?php
$root = $_SERVER['DOCUMENT_ROOT'];
$host = $_SERVER['HTTP_HOST'];

define('HOST', 'http://'.$host);
define('ROOT', $root);

define('CONTROLLER', ROOT.'/controller/');
define('VIEW', ROOT.'/view/');
define('MODEL', ROOT.'/model/');
define('ASSETS', HOST.'/assets/');
define('WEBSITE_NAME', 'Blog');
define('WEBSITE_URL', 'http://'.$host);
define('MAIL_ADMIN', 'haksaeng.2018@gmail.com');

