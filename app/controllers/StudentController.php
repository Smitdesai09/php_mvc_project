require('php_mvc_project/app/models/Student.php');

class StudentController{
    public function get_student(){
        $target_year = 2;
        $obj = new Student();
        $students = $obj->get_student($target_year);

        require('php_mvc_project/app/views/list.php');
    }
}