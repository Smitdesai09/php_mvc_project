<?php
require_once __DIR__. '/../models/Assignments.php';
require_once __DIR__. '/../models/Submissions.php';

class FacultyController{

    public function __construct(){
        if (!isset($_SESSION['user']) || $_SESSION['user']['role'] !== 'Faculty') {
            header("Location:index.php?controller=auth&action=login");
            exit;
        }
    }
    
    public function listAssignments(){
        $model=new Assignments();
        $assignmentList=$model->getAllAssignmentsFaculty($_SESSION['user']['id']);
        require __DIR__. '/../views/Faculty/list.php';
    }
    
    public function viewAssignment($assignmentId){
        $model= new Assignments();
        $assignment= $model->getAssignmentById($assignmentId);
        if(!$assignment){
            $_SESSION['msg']="Assignment doesn't exists!";
            header('Location: index.php?controller=faculty&action=listAssignments');
            exit;
        }

        $model2=new Submissions();
        $submissions= $model2->getSubmissions($assignmentId);

        require __DIR__. '/../views/Faculty/view.php';
    }

    public function addAssignment(){
        if($_SERVER['REQUEST_METHOD'] === "POST"){
            $title= $_POST['title'] ? trim($_POST['title']) : '';
            $description= $_POST['description'] ? trim($_POST['description']) : '';
            $subject= $_POST['subject'] ? trim($_POST['subject']) : '';
            $year= $_POST['year'] ? trim($_POST['year']) : '';
            $due_date= $_POST['due_date'] ? trim($_POST['due_date']) : '';
            $faculty_id=$_SESSION['user']['id'];

            if(empty($title) || empty($description) || empty($subject) || empty($year) || empty($due_date)){
                $_SESSION['msg']="Please enter all the fields!";
                header("Location: index.php?controller=faculty&action=addAssignment");
                exit;
            }
            else{
                $data=[
                    'title' => $title,
                    'description' => $description,
                    'subject' => $subject,
                    'year' => $year,
                    'due_date' => $due_date,
                    'faculty_id' => $faculty_id
                ];
                $model=new Assignments();
                $status=$model->add($data);
                $_SESSION['msg'] = $status ? "Assignment Added Successfully!" : "Assignment Creation Failed!";
                header('Location: index.php?controller=faculty&action=listAssignments');
                exit;
             }
        }
        else{
            require __DIR__. '/../views/Faculty/add.php';
        }
    }

    public function editAssignment($assignmentId){
        $model=new Assignments();
        if($_SERVER['REQUEST_METHOD'] === "POST"){
            $title= $_POST['title'] ? trim($_POST['title']) : '';
            $description= $_POST['description'] ? trim($_POST['description']) : '';
            $subject= $_POST['subject'] ? trim($_POST['subject']) : '';
            $year= $_POST['year'] ? trim($_POST['year']) : '';
            $due_date= $_POST['due_date'] ? trim($_POST['due_date']) : '';
            $faculty_id=$_SESSION['user']['id'];

            if(empty($title) || empty($description) || empty($subject) || empty($year) || empty($due_date)){
                $_SESSION['msg']="Please enter all the fields!";
                header("Location: index.php?controller=faculty&action=editAssignment");
                exit;
            }
            else{
                $data=[
                    'title' => $title,
                    'description' => $description,
                    'subject' => $subject,
                    'year' => $year,
                    'due_date' => $due_date,
                    'faculty_id' => $faculty_id
                ];
                $status=$model->edit($assignmentId,$data);
                $_SESSION['msg'] = $status ? "Assignment Updated Successfully!" : "Assignment Updation Failed!";
                header("Location: index.php?controller=faculty&action=listAssignments&id={$assignmentId}");
                exit;
             }
        }
        else{
            $row= $model->getAssignmentById($assignmentId);
            require __DIR__. '/../views/Faculty/edit.php';
        }
    }

    public function deleteAssignment($assignmentId){
        $model= new Assignments();
        $status= $model->delete($assignmentId);
        $_SESSION['msg'] = $status ? "Assignment Deleted Successfully!" : "Assignment Deletion Failed!";
        header('Location: index.php?controller=faculty&action=listAssignments');
        exit;
    }



    public function approveSubmission($submissionId){
        $model=new Submissions();
        $status= $model->approve($submissionId);
        $_SESSION['msg'] = $status ? "Assignment Approved!" : "Assignment Approval Failed!";

        $data= $model->getAssignmentId($submissionId);
        header("Location: index.php?controller=faculty&action=viewAssignment&id={$data['assignment_id']}");
        exit;
    }
    
    public function rejectSubmission($submissionId){
        $model=new Submissions();
        $status= $model->reject($submissionId);
        $_SESSION['msg'] = $status ? "Assignment Rejected!" : "Assignment Rejection Failed!";
        
        $data= $model->getAssignmentId($submissionId);
        header("Location: index.php?controller=faculty&action=viewAssignment&id={$data['assignment_id']}");
        exit;
    }

    public function viewFile($submissionId){
        $model= new Submissions();
        $submission= $model->getSubmissionById($submissionId);

        if(!$submission){
            exit("Submission not found!");
        }
        

        $file_name=$submission['file_name'];
        $file_Path = __DIR__ . '/../../public/uploads/' . $file_name;    
        if(!file_exists($file_Path)){
            exit("File doesn't exists!");
        }

        header('Content-Type: application/pdf');
        header('Content-Disposition: inline; filename="' . $file_name . '"');
        readfile($file_Path);
        exit;
    }
}
?>