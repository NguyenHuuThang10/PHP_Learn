<?php
session_start();
require_once 'config.php';
require_once 'includes/functions.php';
require_once 'includes/permalink.php';
require_once 'includes/connect.php';
require_once 'includes/database.php';
require_once 'includes/session.php';
require_once 'includes/phpmailer/Exception.php';
require_once 'includes/phpmailer/PHPMailer.php';
require_once 'includes/phpmailer/SMTP.php';

$module = _MODULE_DEFAULT;
$action = _ACTION_DEFAULT;
$leu = 1;
if(isset($_GET['module'])){
    if(!empty($_GET['module'])){
        $module = $_GET['module'];
    }
}

if(isset($_GET['action'])){
    if(!empty($_GET['action'])){
        $action = $_GET['action'];
    }
}

$path = 'modules/'.$module.'/'.$action.'.php';
if(file_exists($path)){
    require_once $path;
}else{
    require_once 'modules/errors/404.php';
}
