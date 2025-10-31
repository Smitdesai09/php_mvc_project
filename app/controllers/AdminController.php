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
        require 'app/views/list_users.php';
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
            $this->userModel->createUser($data);
            header("Location: index.php?controller=admin&action=listUsers");
            exit;
        }
        require 'app/views/add_user.php';
    
    }

    public function editUser(){
        $id = $_GET['id'] ?? null;
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
            $this->userModel->updateUser($id, $data);
            header("Location: index.php?controller=admin&action=listUsers");
            exit;
        }

        require 'app/views/edit_user.php';

    }

    public function deleteUser() {

        $id = $_GET['id'] ?? null;

        if ($id) {
            $this->userModel->deleteUser($id);
        }

        header("Location: index.php?controller=admin&action=listUsers");
        exit;
    }
}

?>