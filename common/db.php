<?php

class Database{
    public static $conn;
    public static function connect(){
        self::$conn = new mysqli('localhost','root','','assignment_traker');

        if(self::$conn->connect_errno){
            die('Connection Error:'.self::$conn->connect_errno);
        }
        return self::$conn;
    }
}
?>