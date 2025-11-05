<?php
require_once __DIR__ . '/../../common/db.php';

class Assignments
{
    private $conn;

    public function __construct()
    {
        $this->conn = Database::connect();
    }

    public function getAllAssignmentsFaculty($facultyId)
    {
        $stmt = $this->conn->prepare("SELECT * FROM assignments WHERE faculty_id=:id");
        $stmt->bindParam(':id', $facultyId);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function add($data)
    {
        $stmt = $this->conn->prepare("INSERT INTO assignments 
        (title,description,subject,target_year,due_date,faculty_id) 
        VALUES (:title,:description,:subject,:year,:due_date,:faculty_id)");

        $stmt->bindParam(':title', $data['title']);
        $stmt->bindParam(':description', $data['description']);
        $stmt->bindParam(':subject', $data['subject']);
        $stmt->bindParam(':year', $data['year']);
        $stmt->bindParam(':due_date', $data['due_date']);
        $stmt->bindParam(':faculty_id', $data['faculty_id']);

        return $stmt->execute();
    }

    public function edit($assignmentId, $data)
    {
        $stmt = $this->conn->prepare("
        UPDATE assignments 
        SET title = :title,
            description = :description,
            subject = :subject,
            target_year = :year,
            due_date = :due_date
        WHERE assignment_id = :assignment_id");

        $stmt->bindParam(':title', $data['title']);
        $stmt->bindParam(':description', $data['description']);
        $stmt->bindParam(':subject', $data['subject']);
        $stmt->bindParam(':year', $data['year']);
        $stmt->bindParam(':due_date', $data['due_date']);
        $stmt->bindParam(':assignment_id', $assignmentId);

        return $stmt->execute();
    }

    public function delete($assignmentId)
    {
        $stmt = $this->conn->prepare("DELETE FROM assignments WHERE assignment_id=:id");
        $stmt->bindParam(':id', $assignmentId);
        return $stmt->execute();
    }

    public function getAssignmentById($assignmentId)
    {
        $stmt = $this->conn->prepare("
            SELECT a.*, u.full_name 
            FROM assignments a
            JOIN users u ON a.faculty_id = u.user_id
            WHERE a.assignment_id = :id");
        $stmt->bindParam(':id', $assignmentId);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }


    #### kashyap ####
    public function get_assignment($target_year)
    {
        try {
            $sql = "SELECT * FROM assignments WHERE target_year = ?";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([$target_year]);
            $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $data;
        } catch (Exception $e) {
            $_SESSION['msg'] = $e->getMessage();
            header('location:index.php');
            exit;
        }
    }

    public function get_assignment_id($assignment_id)
    {
        try {
            $sql = "SELECT a.*, u.full_name FROM assignments a 
                JOIN users u ON a.faculty_id = u.user_id 
                WHERE assignment_id = ?";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([$assignment_id]);
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            $_SESSION['msg'] = $e->getMessage();
            header('location:index.php');
            exit;
        }
    }
}
