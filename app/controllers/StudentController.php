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

        if(!$student){
            $_SESSION['msg'] = "Assignment Not Found";
            header('location:index.php?controller=Student&action=list_assignment');
            exit;
        }
        require __DIR__ . '/../views/students/view.php';
    }

    public function uplode_assignment($assignment_id=null){
        if($assignment_id === null){
            $_SESSION['msg'] = "No Assignment Selected";
            header('location:index.php?controller=Student&action=list_assignment');
            exit;
        }
        $user_id = $_SESSION['user_id'];
        
        if($_SERVER['REQUEST_METHOD'] === "POST"){
            $objAlreadySubmited = new Submission();
            $cheack = $objAlreadySubmited->isAlreadySubmited($assignment_id,$user_id);  

            if($cheack){
                $_SESSION['msg'] = "You Have Already Submitted Assignment";
                header("location:index.php?controller=Student&action=get_assignment_id&assignment_id=" . $assignment_id);
                exit;
            }
            $file = $_FILES['file'];

            //Restrict By Size
            $max_size = 10*1024*1024;
            if($file['size'] > $max_size){
                $_SESSION['msg'] = "File To Large Maximum Allowed Size is 10MB.";
                header("location:index.php?controller=Student&action=get_assignment_id&assignment_id=" . $assignment_id);
                exit;
            }
            
            //Restrict By Type
            $allowed_type = ['application/pdf'];
            $file_ext =  strtolower(pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION));

            if(!in_array($_FILES['file']['type'],$allowed_type) || $file_ext !== 'pdf'){
                $_SESSION['msg'] = "Please Uplode pdf Formate File.";
                header("location:index.php?controller=Student&action=get_assignment_id&assignment_id=" . $assignment_id);
                exit;
            }

            $target_dir = __DIR__ . '/../../public/uploads/';

            //this path show in db and view
            $relative_path = basename($file['name']);

            //this path for moving file 
            $file_path = $target_dir . basename($file['name']);

            if(move_uploaded_file($file["tmp_name"],$file_path)){
                $objadd = new Submission();
                $res = $objadd->addSubmission($assignment_id,$user_id,$relative_path);
                
                if($res){
                    $_SESSION['msg'] = "Assignment Uploded Successfully";
                    header("location:index.php?controller=Student&action=get_assignment_id&assignment_id=" . $assignment_id);
                    exit;
                }
                else{
                    $_SESSION['msg'] = "Data Base Error";
                }
            }else{
                $_SESSION['msg'] = "File Uplode Fail";
            }
        }
    }
   
}
?>