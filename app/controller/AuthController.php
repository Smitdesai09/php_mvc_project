<?php 
require_once __DIR__ . '/../models/User.php';

class AuthController{

    private $userModel;

    public function __construct(){
        $this->userModel = new User();
    }

    public function login(){

        $error = ""; 

        if($_SERVER["REQUEST_METHOD"] === "POST"){

            $email = trim($_POST['email'] ?? '');
            $password = trim($_POST['password'] ?? '');

            if(empty($email) || empty($password)){
                $error = "All fields are required."; 
            } 
            elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $error = "Invalid email format.";
            }
            else{
                $user = $this->userModel->getByEmail($email);

                if ($user && password_verify($password, $user['password'])) {

                    $_SESSION['user'] = [
                        'id' => $user['user_id'],
                        'name' => $user['full_name'],
                        'email' => $user['email'],
                        'role' => $user['role']
                    ];

                    switch($user['role']){
                        
                        case 'Admin':
                            header("Location: index.php?controller=admin&action=listUsers");
                            break;
                        case 'Faculty':
                            header("Location: index.php?controller=auth&action=facultyView");
                            break;
                        case 'Student':
                            header("Location: index.php?controller=auth&action=studentView");
                            break;
                        default:
                            session_destroy();
                            die("Invalid role found.");
                    }
                    exit; 
                }
                else{
                    $error = "Invalid email or password"; 
                }

            }
        }
        
        require 'app/views/login.php'; 

    } 

    public function logout() {
        session_destroy();
        header("Location: index.php?controller=auth&action=login");
        exit;
    }

    public function facultyView() {
        if (!isset($_SESSION['user']) || $_SESSION['user']['role'] !== 'Faculty') {
            header("Location: index.php?controller=auth&action=login");
            exit;
        }
        require 'app/views/faculty_view.php';
    }

    public function studentView() {
        if (!isset($_SESSION['user']) || $_SESSION['user']['role'] !== 'Student') {
            header("Location: index.php?controller=auth&action=login");
            exit;
        }
        require 'app/views/student_view.php';
    }

}
?>