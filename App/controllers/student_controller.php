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
              
            }else
            {
                $arr = "Student added successfully!";
                echo json_encode($arr);
            }

        } else if($_POST['data_type'] == 'disable_student') {

        } else {
  
        }

    }

    public function display() {
        $stu = $this -> load_model('student');
        $resultlist = $stu -> get_all();
        $column = json_decode(json_encode($resultlist), true);

        $result = array();
        foreach ($column as $key => $value) {
            $result['data'][] = array(
                $value['Username'],
                $value['Name'],
                $value['StudEmail'],
                $value['Image'],
                $value['StudContactNo'],
                $value['Batch'],
            );
        }

        echo json_encode($result);

        
    }
}