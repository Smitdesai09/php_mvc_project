<?php

class Database{
    public static $conn=null;

    public static function connect(){
        if(self::$conn === null){
            $config = require __DIR__. 'config.php';
            try{
                self::$conn= new PDO(
                "mysql:host={$config['host_name']};dbname={$config['db_name']}",
                $config['user_name'],
                $config['passowrd']
                );

                self::$conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
            }
            catch(PDOException $e){
                die("Database Connection failed: ". $e->getMessage());
            }
        }
        return self::$conn;
    }

    public static function disconnect(){
        self::$conn=null;
    }
}
?>