<?php
require_once __DIR__. '/../../common/db.php';

class Assignments{
    private $conn;

    public function __construct(){$this->conn= Database::connect();}

    public function listFacultyAssignments($facultyId){
        $stmt= $this->conn->prepare("SELECT * FROM assignments WHERE faculty_id=:id");
        $stmt->bindParam(':id',$facultyId);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function add($data){
        $stmt = $this->conn->prepare("INSERT INTO assignments 
        (title,description,subject,target_year,due_date,faculty_id) 
        VALUES (:title,:description,:subject,:year,:due_date,:faculty_id)");

        $stmt->bindParam(':title',$data['title']);
        $stmt->bindParam(':description',$data['description']);
        $stmt->bindParam(':subject',$data['subject']);
        $stmt->bindParam(':year',$data['year']);
        $stmt->bindParam(':due_date',$data['due_date']);
        $stmt->bindParam(':faculty_id',$data['faculty_id']);

        return $stmt->execute();
    }
    
    public function getAssignmentById($assignmentId){
        $stmt = $this->conn->prepare("SELECT * FROM assignments WHERE assignment_id=:id");
        $stmt->bindParam(':id',$assignmentId);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function edit($assignmentId,$data){
        $stmt = $this->conn->prepare("
        UPDATE assignments 
        SET title = :title,
            description = :description,
            subject = :subject,
            target_year = :year,
            due_date = :due_date
        WHERE assignment_id = :assignment_id");
        
        $stmt->bindParam(':title',$data['title']);
        $stmt->bindParam(':description',$data['description']);
        $stmt->bindParam(':subject',$data['subject']);
        $stmt->bindParam(':year',$data['year']);
        $stmt->bindParam(':due_date',$data['due_date']);
        $stmt->bindParam(':assignment_id',$assignmentId);

        return $stmt->execute();
    }

    public function delete($assignmentId){
        $stmt = $this->conn->prepare("DELETE FROM assignments WHERE assignment_id=:id");
        $stmt->bindParam(':id',$assignmentId);
        return $stmt->execute();
    }
    
}
?>