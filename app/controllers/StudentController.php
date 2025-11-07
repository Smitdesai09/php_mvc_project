<?php

require_once __DIR__ . '/../models/Assignments.php';
require_once __DIR__ . '/../models/Submissions.php';

class StudentController{
    public function __construct(){
        if (!isset($_SESSION['user']) || $_SESSION['user']['role'] !== 'Student') {

            header("Location:index.php?controller=auth&action=login");
            exit;
        }
    }

    public function list_assignment(){ 
        $obj = new Assignments();
        $assignmentList = $obj->getAllAssignmentsStudent($_SESSION['user']['year']);

        #for status
        $objsubmission = new Submissions();
        foreach ($assignmentList as &$assignment) {
            $submission = $objsubmission->getSubmissionStatus($assignment['assignment_id'], $_SESSION['user']['id']);
            if (!empty($submission['approval_status'])) {
                if ($submission['approval_status'] === "Pending") {
                    $assignment['status'] = "Wating For Approval";
                } elseif ($submission['approval_status'] === "Approved") {
                    $assignment['status'] = "Approved";
                } else {
                    $assignment['status'] = "Rejected";
                }
            } else {
                $assignment['status'] = "Due";
            }
        }
        unset($assignment);

        #for alerts
        $today = date('Y-m-d');
        $alerts=[];
        foreach ($assignmentList as $assignment) {
            $due_date = date('Y-m-d',strtotime($assignment['due_date']));

            if($due_date == $today){
                $alerts[] = "Assignment '{$assignment['title']}' is due today!! 
                 <a class='badge text-bg-primary text-decoration-none'  href='index.php?controller=student&action=view_assignment&id={$assignment['assignment_id']}'>Submit Now</a>";
            }
        }

        require __DIR__ . '/../views/students/list.php';
    }

    public function view_assignment($assignment_id){

        $obj = new Assignments();
        $assignment = $obj->getAssignmentById($assignment_id);

        if (!$assignment) {
            $_SESSION['msg'] = "Assignment Not Found";
            header('location:index.php?controller=Student&action=list_assignment');
            exit;
        }
        require __DIR__ . '/../views/students/view.php';
    }

    public function upload_assignment($assignment_id){

        if ($_SERVER['REQUEST_METHOD'] === "POST") {
            $objAlreadySubmited = new Submissions();
            $check = $objAlreadySubmited->getSubmissionStatus($assignment_id, $_SESSION['user']['id']);

            if ($check) {
                $_SESSION['msg'] = "You Have Already Submitted Assignment!";
                header("location:index.php?controller=Student&action=view_assignment&id=" . $assignment_id);
                exit;
            }
            $file = $_FILES['file'];

            //Restrict By Size
            $max_size = 10 * 1024 * 1024;
            if ($file['size'] > $max_size) {
                $_SESSION['msg'] = "Maximum File Size is 10 MB!";
                header("location:index.php?controller=Student&action=view_assignment&id=" . $assignment_id);
                exit;
            }

            //Restrict By Type
            $allowed_type = ['application/pdf'];
            $file_ext =  strtolower(pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION));

            if (!in_array($_FILES['file']['type'], $allowed_type) || $file_ext !== 'pdf') {
                $_SESSION['msg'] = "Please Upload PDF Format Only!";
                header("location:index.php?controller=Student&action=view_assignment&id=" . $assignment_id);
                exit;
            }

            $target_dir = __DIR__ . '/../../public/uploads/';

            //this path show in db and view
            // $relative_path = $file['name'];

            //this path for moving file 
            $file_path = $target_dir . $file['name'];

            if (move_uploaded_file($file["tmp_name"], $file_path)) {
                $objadd = new Submissions();
                $res = $objadd->addSubmission($assignment_id, $_SESSION['user']['id'], $file['name']);

                if ($res) {
                    $_SESSION['msg'] = "Assignment Uploaded Successfully!";
                    header("location:index.php?controller=Student&action=view_assignment&id=" . $assignment_id);
                    exit;
                } else {
                    $_SESSION['msg'] = "Data Base Error";
                    header("location:index.php?controller=Student&action=view_assignment&id=" . $assignment_id);
                    exit;
                }
            } else {
                $_SESSION['msg'] = "File Upload Failed!";
                header("location:index.php?controller=Student&action=view_assignment&id=" . $assignment_id);
                exit;
            }
        }
    }
}
