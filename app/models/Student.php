<?php

require('php_mvc_project/common/db.php');

class Student{
    private $conn;
    public function __construct(){
        $this->conn = Database::connect();
    }
    public function get_student($target_year){
        $sql = "SELECT * FROM assignments WHERE target_year = '$target_year'";
        $res = $this->conn->query($sql);
        $data=[];

        while($row = $res->fetch_assoc()){
            $data = $row;
        }
        return $data;
    }
}