<?php
session_start();

$controller=$_GET['controller'] ?? 'auth';
$action=$_GET['action'] ?? 'login';

$fileName='app/controller/'. ucfirst($controller). 'Controller.php';
if(!file_exists($fileName)){
    die("ControllerFile not found!");
}
require_once $fileName;


$className= ucfirst($controller). 'Controller';
if(!class_exists($className)){
    die("ControlleClass not found!");
}
$obj= new $className();


if(!method_exists($obj,$action)){
    die("ControllerMethod not found!");
}
$obj->$action();
?>