<?php
session_start();

$_SESSION['user_id']=2;

$controller=$_GET['controller'] ?? 'faculty';
$action=$_GET['action'] ?? 'listAssignments';
$id=$_GET['id'] ?? null;

$fileName='app/controllers/'. ucfirst($controller). 'Controller.php';
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
elseif($id === null){
    $obj->$action();
}
else{
    $obj->$action($id);
}
?>