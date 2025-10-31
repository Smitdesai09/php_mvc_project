<?php

require_once __DIR__ . '/../../common/db.php';

class Submission{
    private $conn;
    public function __construct(){
        $this->conn = Database::connect();
    }
    public function submission_status($assignment_id,$user_id){
        try{
            $sql = "SELECT * FROM submissions WHERE assignment_id=? AND student_id=?";
            $stmt = $this->conn->prepare($sql);
            $stmt->bind_param("ii",$assignment_id,$user_id);
            $stmt->execute();
            $res = $stmt->get_result();
            $row =  $res->fetch_assoc();
            return $row;
        }catch(Exception $e){
            $_SESSION['msg'] = $e->getMessage();
            header('location:index.php');
            exit;
        }
    }
}

?>