<?php
require_once __DIR__. '/../../common/db.php';

class Assignments{
    private $conn;

    public function __construct(){$this->conn= Database::connect();}

    public function listFacultyAssignments($facultyId){}

    public function addAssignment(){}

    public function editAssignment($assignmentId){}

    public function deleteAssignment($assignmentId){}
}
?>