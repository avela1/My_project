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

        } else if($_POST['data_type'] == 'update_student') {
            $stu->update($_POST);
            
            if($_SESSION['error'] != "")
            {
                $arr = $_SESSION['error'];
                $_SESSION['error'] = "";
                show($arr);
              
            }else
            {
                $arr = "Student updated successfully!";
                echo json_encode($arr);
            }
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

                '<div class="form-button-action">
                    <a type="button" data-toggle="modal" href="#updateStud" class="btn btn-link btn-primary btn-lg  update" data-id="'.$value['Username'].'" info="'.str_replace('"',"'", json_encode($value)).'" data-original-title="Edit">
                        <i class="fa fa-edit"></i>
                    </a>
                    <button type="button" data-toggle="tooltip" id="deleteStud" class="btn btn-link btn-danger" data-id="'.$value['Username'].'" data-original-title="Disable">
                        <i class="fa fa-times"></i>
                    </button>
                </div>',
              
            );
        }

        echo json_encode($result);

        
    }
}