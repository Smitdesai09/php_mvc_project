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
            $data = [
                'username' => $_POST['username'],
                'email' => $_POST['email'],
                'password' => $_POST['password'],
                'full_name' => $_POST['full_name'],
                'target_year' => $_POST['target_year'],
                'role' => $_POST['role']
            ];
            $status = $this->userModel->createUser($data);
            $_SESSION['msg'] = $status ? "User Added Successfully" : "User Creation Failed!";
            header("Location: index.php?controller=admin&action=listUsers");
            exit;
        }
        require 'app/views/admin/add_user.php';
    
    }

    public function editUser($id){
        // $id = $_GET['id'] ?? null;
        $user = $this->userModel->getById($id);

        if (!$user) {
            header("Location: index.php?controller=admin&action=listUsers");
            exit; 
        }
        

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = [
                'username' => $_POST['username'],
                'email' => $_POST['email'],
                'full_name' => $_POST['full_name'],
                'target_year' => $_POST['target_year'],
                'role' => $_POST['role']
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