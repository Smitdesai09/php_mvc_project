<?php
class Submissions
{
    private $conn;
    public function __construct()
    {
        $this->conn = Database::connect();
    }

    public function getSubmissions($assignmentId)
    {
        $stmt = $this->conn->prepare("
        SELECT s.*, u.full_name AS student_name 
        FROM submissions s 
        JOIN users u
        ON s.student_id=u.user_id
        WHERE assignment_id=:id");
        $stmt->bindParam(':id', $assignmentId);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function approve($submissionId)
    {
        $stmt = $this->conn->prepare("UPDATE submissions SET approval_status = :status WHERE submission_id= :id");
        $stmt->bindValue(':status', 'Approved');
        $stmt->bindParam(':id', $submissionId);
        return $stmt->execute();
    }

    public function reject($submissionId)
    {
        $stmt = $this->conn->prepare("UPDATE submissions SET approval_status = :status WHERE submission_id= :id");
        $stmt->bindValue(':status', 'Rejected');
        $stmt->bindParam(':id', $submissionId);
        return $stmt->execute();
    }

    public function getAssignmentId($submissionId)
    {
        $stmt = $this->conn->prepare("SELECT assignment_id FROM submissions WHERE submission_id= :id");
        $stmt->bindParam(':id', $submissionId);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function getSubmissionById($submissionId)
    {
        $stmt = $this->conn->prepare("SELECT * FROM submissions WHERE submission_id=:id");
        $stmt->bindParam(':id', $submissionId);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }


    #### kashyap ####
    public function getSubmissionStatus($assignment_id, $user_id)
    {
        try {
            $sql = "SELECT * FROM submissions WHERE assignment_id = ? AND student_id = ?";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([$assignment_id, $user_id]);
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            $_SESSION['msg'] = $e->getMessage();
            header('location:index.php');
            exit;
        }
    }

    public function addSubmission($assignment_id, $user_id, $file_path)
    {
        try {
            $sql = "INSERT INTO submissions (assignment_id, student_id, file_name) VALUES (?, ?, ?)";
            $stmt = $this->conn->prepare($sql);
            return $stmt->execute([$assignment_id, $user_id, $file_path]);
        } catch (Exception $e) {
            $_SESSION['msg'] = $e->getMessage();
            header('location:index.php');
            exit;
        }
    }
}
