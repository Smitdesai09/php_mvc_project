<?php

require_once __DIR__ . '/../../common/db.php';

class Assignment{
    private $conn;
    public function __construct(){
        $this->conn = Database::connect();
    }
    public function get_assignment($target_year){
       try{
            $sql = "SELECT * FROM assignments WHERE target_year = ?";
            $stmt = $this->conn->prepare($sql);
            $stmt->bind_param("i",$target_year);
            $stmt->execute();
            $res = $stmt->get_result();
            $data=[];

            while($row = $res->fetch_assoc()){
                $data[] = $row;
            }
            return $data;
       }catch(Exception $e){
            $_SESSION['msg'] = $e->getMessage();
            header('location:index.php');
            exit;
       }
    }
    public function get_assignment_id($assignment_id){
        try{
            $sql = "SELECT a.*,u.full_name FROM assignments a JOIN users u ON a.faculty_id=u.user_id WHERE assignment_id=?";
            $stmt = $this->conn->prepare($sql);
            $stmt->bind_param('i',$assignment_id);
            $stmt->execute();
            $res = $stmt->get_result();
            return $res->fetch_assoc();
        }catch(Exception $e){
            $_SESSION['msg'] = $e->getMessage();
            header('location:index.php');
            exit;
        }
    }
}

?>