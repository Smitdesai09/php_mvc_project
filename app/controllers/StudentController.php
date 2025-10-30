<?php
require_once __DIR__ . '/../models/Student.php';  
require_once __DIR__ . '/../../common/flash_msg.php';  

class StudentController{
    public function index(){
        echo "This is Index File";
    }
    public function get_student(){
        $user_id = $_SESSION['user_id'];
        $obj = new Student();
        $students = $obj->get_student($user_id);
        
        require __DIR__ . '/../views/list.php';
    }
    public function get_assignment(){
        try{
            $target_year = $_SESSION['target_year'];
            $obj = new Student();
            $students = $obj->get_assignment($target_year);

            require __DIR__ . '/../views/all_assignment.php';

        }catch(Exception $e){

            $_SESSION['msg'] = $e->getMessage();
            header('location:index.php');
            exit;
        }
       
    }
}
?>