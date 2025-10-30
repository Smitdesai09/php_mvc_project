<?php
session_start();
require_once __DIR__ . '/common/flash_msg.php';

$controller=$_GET['controller'] ?? 'student';
$action=$_GET['action'] ?? 'index';
$id=$_GET['id'] ?? null;

$fileName= __DIR__ . '/app/controllers/'. ucfirst($controller). 'Controller.php'; 
if(!file_exists($fileName)){
    die("ControllerFile not found!");
}
require_once $fileName;


$className= ucfirst($controller). 'Controller';
if(!class_exists($className)){
    die("ControlleClass not found!");
}
$obj= new $className();

$_SESSION['user_id'] = 2;

if(!method_exists($obj,$action)){
    die("ControllerMethod not found!");
}
elseif($id === null){
    $obj->$action();
}
else{
    $obj->$action($id);
}
?>