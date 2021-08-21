<?php 

class  Student_controller extends Controller {

    public function index() {
       
        $_SESSION['error'] = "";
        $stu = $this -> load_model('student');

        if($_POST['data_type'] == 'add_student') {

            $stu->create($_POST);

            if($_SESSION['error'] != "")
            {
                $arr = $_SESSION['error'];
                $_SESSION['error'] = "";

                show($arr);
              
                // echo json_encode($arr);
            }else
            {
                $arr = "Student added successfully!";
               
                echo json_encode($arr);
            }

        } else if($_POST['data_type'] == 'disable_student') {

        } else {

            $result = $stu -> get_all();
            show($result[0] -> Name);
  
        }
    }
}