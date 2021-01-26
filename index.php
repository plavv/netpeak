<?php

ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);

require_once 'config.php';
require_once 'db.php';
require_once 'model.php';
require_once 'controller.php';
require_once 'view.php';


$model = new Model();
$model->db = new db($config['dbhost'], $config['dbuser'], $config['dbpass'], $config['dbname']);

$controller = new Controller($model);

$view = new View($controller, $model);

if (isset($_GET['action']) && !empty($_GET['action'])) {
    $controller->{$_GET['action']}();
} else {
    $controller->index();
}
echo $view->output();
