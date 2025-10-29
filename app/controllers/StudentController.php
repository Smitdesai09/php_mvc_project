<?php
require_once __DIR__ . '/../models/Student.php';  
require_once __DIR__ . '/../../common/flash_msg.php';  

class StudentController{
    public function index(){
        echo "This is Index File";
    }
    public function get_student(){
       try{
            $target_year = $_GET['year']?? 1;

            if(!filter_var($target_year,FILTER_VALIDATE_INT)){
                $_SESSION['msg'] = "Invalid Year Provided";
                header('location:index.php');
                exit;
            }
            $_SESSION['target_year'] = $target_year;
            $obj = new Student();
            $students = $obj->get_student($target_year);

            require __DIR__ . '/../views/list.php';

       }catch(Exception $e){

            $_SESSION['msg'] = $e->getMessage();
            header('location:index.php');
            exit;
       }
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