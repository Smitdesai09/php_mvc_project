<?php

require_once __DIR__ . '/../../common/db.php';

class Student{
    private $conn;
    public function __construct(){
        $this->conn = Database::connect();
    }
    public function get_student($user_id){
        try{
            $sql = "SELECT * FROM users WHERE user_id=?";
            $stmt = $this->conn->prepare($sql);
            $stmt->bind_param('i',$user_id);
            $stmt->execute();
            $res = $stmt->get_result();
            $row = $res->fetch_assoc();
            $target_year = $row['target_year'];

            $sql2 = "SELECT * FROM users WHERE target_year =?";
            $stmt = $this->conn->prepare($sql);
            $stmt->bind_param("i",$target_year);
            $stmt->execute();
            $res = $stmt->get_result();
            $data=[];
            while($row = $res->fetch_assoc()){
                $data[] = $row;
            }
            $_SESSION['target_year'] = $target_year;
            return $data;

        }catch(Exception $e){
            $_SESSION['msg'] = $e->getMessage();
            header('location:index.php');
            exit;
        }
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
}

?>