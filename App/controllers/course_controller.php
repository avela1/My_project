<?php 

class  Course_controller extends Controller {

    public function add() {
        $_SESSION['error'] = "";
        $crs = $this -> load_model('course');

        if(!empty($_POST)) {

            $crs->create($_POST, $_FILES);

            if($_SESSION['error'] != "")
            {
                $arr = $_SESSION['error'];
                $_SESSION['error'] = "";
                show($arr);
                
            }else
            {
                $arr = "Course added successfully!";
                echo json_encode($arr);
            }
        } else {
        
        }
    }

    public function update() {
        $_SESSION['error'] = "";
        $crs = $this -> load_model('course');

        if(!empty($_POST)) {

            $crs->update($_POST, $_FILES);

            if($_SESSION['error'] != "")
            {
                $arr = $_SESSION['error'];
                $_SESSION['error'] = "";
                show($arr);
                
            }else
            {
                $arr = "Course updated successfully!";
                echo json_encode($arr);
            }
        } else {
        
        }

    }

    public function assign(){

        $_SESSION['error'] = "";
        $crs = $this -> load_model('course');

        if(!empty($_POST)) {

            $crs->assign($_POST);

            if($_SESSION['error'] != "")
            {
                $arr = $_SESSION['error'];
                $_SESSION['error'] = "";
                show($arr);
                
            }else
            {
                $arr = "Course Assigned successfully!";
                echo json_encode($arr);
            }
        } else {
        
        }
    }
    public function display() {
        $crs = $this -> load_model('course');
        $resultlist = $crs -> get_all();
        $column = json_decode(json_encode($resultlist), true);
        $result = array();
        foreach ($column as $key => $value) {
            $result['data'][] = array(
                $value['CourseCode'],
                $value['CourseName'],
                $value['CourseCrdHrs'],
                $value['CourseGivenYear'],
                '<img src="'.ROOT.$value['CourseImage'].'" class="rounded responsive" style = "width:50px; height:50px"/>',
                $value['CourseDescription'],
                $value['AssignedFor'],

                '<div class="form-button-action">
                    <a type="button" data-toggle="modal" href="#courseModal" class="btn btn-link btn-primary btn-lg  update" data-id="'.$value['CourseCode'].'" info="'.str_replace('"',"'", json_encode($value)).'" data-original-title="Edit">
                        <i class="fa fa-edit"></i>
                    </a>
                    <a type="button" data-toggle="modal" href="#assignModal" class="btn btn-link btn-success btn-lg  assign" data-id="'.$value['CourseCode'].'" data-original-title="Assign">
                        <i class="fas fa-book-open"></i>
                    </a>
                    <button type="button" data-toggle="tooltip" id="deleteStud" class="btn btn-link btn-danger" data-id="'.$value['CourseCode'].'" data-original-title="Disable">
                        <i class="fa fa-times"></i>
                    </button>
                </div>',
            );
        }

        echo json_encode($result);
        
    }


   
}