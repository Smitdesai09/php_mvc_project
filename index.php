<?php
session_start();

$controller=$_GET['controller'] ?? 'auth';
$action=$_GET['action'] ?? 'login';

$fileName='app/controllers/'. ucfirst($controller). 'Controller.php';
if(!file_exists($fileName)){
    die("Controller File not found!");
}
require_once $fileName;


$className= ucfirst($controller). 'Controller';
if(!class_exists($className)){
    die("Controlle Class not found!");
}
$obj= new $className();


if(!method_exists($obj,$action)){
    die("Controller Method not found!");
}
$obj->$action();
?>