
<?php
date_default_timezone_set('Europe/Paris');
require_once($_SERVER['DOCUMENT_ROOT'].'/api/Controllers/Controller_Admin.php');




if (empty($_GET) && empty($_POST)){
require_once($_SERVER['DOCUMENT_ROOT'].'/api/views/home.php');
}
else{
$controller = new Controller_Admin();
$controller->manageRequest();
}




















