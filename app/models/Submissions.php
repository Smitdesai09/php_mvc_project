<?php   
class Submissions{
    private $conn;
    public function __construct(){$this->conn= Database::connect();}

    public function getSubmissions($assignmentId){
        $stmt = $this->conn->prepare("SELECT * FROM submissions WHERE assignment_id=:id");
        $stmt->bindParam(':id',$assignmentId);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function approve($submissionId){
        $stmt = $this->conn->prepare("UPDATE submissions SET approval_status = :status WHERE submission_id= :id");
        $stmt->bindValue(':status','Approved');
        $stmt->bindParam(':id',$submissionId);
        return $stmt->execute();
    }

    public function reject($submissionId){
        $stmt = $this->conn->prepare("UPDATE submissions SET approval_status = :status WHERE submission_id= :id");
        $stmt->bindValue(':status','Rejected');
        $stmt->bindParam(':id',$submissionId);
        return $stmt->execute();
    }

    public function getAssignmentId($submissionId){
        $stmt = $this->conn->prepare("SELECT assignment_id FROM submissions WHERE submission_id= :id");
        $stmt->bindParam(':id',$submissionId);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
?>