<?php
require_once __DIR__ . '/../models/Users.php';  
require_once __DIR__ . '/../models/Assignment.php'; 
require_once __DIR__ . '/../models/Submission.php';  
require_once __DIR__ . '/../../common/flash_msg.php';  

class StudentController{
    public function index(){
        echo "This is Index File";
    }

    public function list_assignment(){
        $user_id = $_SESSION['user_id'];
        $obj = new Users();
        $target_year = $obj->get_student($user_id); 

        $obj = new Assignment();
        $students = $obj->get_assignment($target_year);

        $objsubmission = new Submission();

        foreach($students as &$stu){
            $submission = $objsubmission->submission_status($stu['assignment_id'],$user_id);

            if(!empty($submission['approval_status'])){
                if($submission['approval_status'] === "Pending"){
                    $stu['status'] = "Wating For Approval";
                }elseif($submission['approval_status'] === "Approved"){
                    $stu['status'] = "Assignment Approved";
                }else{
                    $stu['status'] = "Rejected";
                }
            }else{
                $stu['status'] = "Wating For Approval";
            }
        }
        unset($stu);  

        require __DIR__ . '/../views/students/list.php';
    }
    
    public function get_assignment_id($assignment_id=null){
        if($assignment_id === null){
            $_SESSION['msg'] = "No Assignment Selected";
            header('location:index.php?controller=Student&action=list_assignment');
            exit;
        }
        $obj = new Assignment();
        $student = $obj->get_assignment_id($assignment_id);

        if(!$assignment_id){
            $_SESSION['msg'] = "Assignment Not Found";
            header('location:index.php?controller=Student&action=list_assignment');
            exit;
        }
        require __DIR__ . '/../views/students/view.php';
    }

   
}
?>