<?php

require_once __DIR__ . '/../../common/db.php';

class Users{
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
            $_SESSION['target_year'] = $target_year;
            return $target_year;
        }catch(Exception $e){
            $_SESSION['msg'] = $e->getMessage();
            header('location:index.php');
            exit;
        }
    }
}

?>