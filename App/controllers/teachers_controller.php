<?php

class  teachers_controller extends Controller {

    public function index() {
        $_SESSION['error'] = "";
        $_SESSION['crs_id'] ="";
        $teacher = $this -> load_model('teachers');
        if($_REQUEST['action'] == 'add_teacher' && !empty($_POST)) {
            $teacher->create($_POST, $_FILES);
            if($_SESSION['error'] != "")
            {

                $arr = $_SESSION['error'];
                $_SESSION['error'] = "";
                show($arr);
                
            }else
            {
                $arr = "Teacher added successfully!";
                echo json_encode($arr);
            }
        } else if($_REQUEST['action'] == 'update_teacher' && !empty($_POST)) {

            $teacher->update($_POST);
            if($_SESSION['error'] != "")
            {

                $arr = $_SESSION['error'];
                $_SESSION['error'] = "";
                show($arr);
                
            }else
            {
                $arr = "Teacher updated successfully!";
                echo json_encode($arr);
            }
        } else {
            $arr = "ERRROOOOORRRRRRRR";
            echo json_encode($arr);
        }

    }

    public function display() {
        $teacher = $this -> load_model('teachers');
        $resultlist = $teacher -> get_all();
        $column = json_decode(json_encode($resultlist), true);
        $result = array();
        foreach ($column as $key => $value) {
            $result['data'][] = array(
                $value['Username'],
                $value['Name'],
                $value['InstEmail'],
                '<img src="'.ROOT.$value['Image'].'" class="rounded responsive" style = "width:50px; height:50px"/>',
                $value['InstContactNo'],
                $value['Qualification'],

                '<div class="form-button-action">
                    
                    <a type="button" data-toggle="modal" href="#updateTech" class="btn btn-link btn-primary btn-lg  update" data-id="'.$value['Username'].'" info="'.str_replace('"',"'", json_encode($value)).'" data-original-title="Edit">
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
