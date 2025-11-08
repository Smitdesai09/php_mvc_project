<?php 
require_once __DIR__ . '/../models/User.php';

class AdminController{

    private $userModel;

    public function __construct() {


        if(!isset($_SESSION['user']) || $_SESSION['user']['role'] !== 'Admin'){

            header("Location:index.php?controller=auth&action=login");
            exit;
        }

        $this->userModel = new User();
        
    }

    public function listUsers(){
        $users = $this->userModel->getAll();
        require 'app/views/admin/list_users.php';
    }

   

    public function addUser(){
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $username = isset($_POST['username']) ? trim($_POST['username']) : '';
        $email = isset($_POST['email']) ? trim($_POST['email']) : '';
        $password = isset($_POST['password']) ? trim($_POST['password']) : '';
        $full_name = isset($_POST['full_name']) ? trim($_POST['full_name']) : '';
        $target_year = isset($_POST['target_year']) ? trim($_POST['target_year']) : '';
        $role = isset($_POST['role']) ? trim($_POST['role']) : '';

        if (empty($username) || empty($email) || empty($password) || empty($full_name) || empty($target_year) || empty($role)) {
            $_SESSION['msg'] = "Please enter all the fields!";
            header("Location: index.php?controller=admin&action=addUser");
            exit;
        }
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $_SESSION['msg'] = "Invalid email format!";
            header("Location: index.php?controller=admin&action=addUser"); 
            exit;
        }


        $data = [
            'username' => $username,
            'email' => $email,
            'password' => $password,
            'full_name' => $full_name,
            'target_year' => $target_year,
            'role' => $role
        ];

        $status = $this->userModel->createUser($data);
        $_SESSION['msg'] = $status ? "User Added Successfully" : "User Creation Failed!";
        header("Location: index.php?controller=admin&action=listUsers");
        exit;
    }

    require 'app/views/admin/add_user.php';
}


public function editUser($id){
    $user = $this->userModel->getById($id);

    if (!$user) {
        header("Location: index.php?controller=admin&action=listUsers");
        exit; 
    }

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $username = isset($_POST['username']) ? trim($_POST['username']) : '';
        $email = isset($_POST['email']) ? trim($_POST['email']) : '';
        $full_name = isset($_POST['full_name']) ? trim($_POST['full_name']) : '';
        $target_year = isset($_POST['target_year']) ? trim($_POST['target_year']) : '';
        $role = isset($_POST['role']) ? trim($_POST['role']) : '';

        if (empty($username) || empty($email) || empty($full_name) || empty($target_year) || empty($role)) {
            $_SESSION['msg'] = "Please enter all the fields!";
            header("Location: index.php?controller=admin&action=editUser&id={$id}");
            exit;
        }
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $_SESSION['msg'] = "Invalid email format!";
            header("Location: index.php?controller=admin&action=editUser&id={$id}");
            exit;
        }


        $data = [
            'username' => $username,
            'email' => $email,
            'full_name' => $full_name,
            'target_year' => $target_year,
            'role' => $role
        ];

        $status = $this->userModel->updateUser($id, $data);
        $_SESSION['msg'] = $status ? "User Updated Successfully" : "User Updation Failed!";
        header("Location: index.php?controller=admin&action=listUsers");
        exit;
    }

    require 'app/views/admin/edit_user.php';
}


    public function deleteUser($id) {
        // $id = $_GET['id'] ?? null;

        $status = $this->userModel->deleteUser($id);
        $_SESSION['msg'] = $status ? "User Deleted Successfully" : "User Deletion Failed!";
        header("Location: index.php?controller=admin&action=listUsers");
        exit;
    }
}

?>