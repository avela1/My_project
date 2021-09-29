<?php 

class Student extends Controller {

    public function index() {
        $User = $this -> load_model('user_account');
        $user_data = $User -> check_login();
        $_SESSION['crs_id'] ="";
        if(is_array($user_data)) {
            $data['user_data'] = $user_data;
        }
        $data['page_title'] = "Student Home page";
        $this->view('students/index', $data);

    }
    public function reg_crs() {
        $User = $this -> load_model('user_account');
        $user_data = $User -> check_login();
        
        $data = array();
        $db = Database::getInstance();
        $_SESSION['crs_id']  ="";
        if(is_array($user_data)) {
            $data['user_data'] = $user_data;
        }
        $query = "SELECT `registered` FROM `studentinfo` WHERE `ID`='".$user_data[0]->ID."'";
        $result = $db -> read($query);

        $data['stud_id'] = $result[0]->registered;
        $data['page_title'] = "Student Home page";
        $this->view('students/reg_crs', $data);
    }
    public function enrolled_crs() {

        $User = $this -> load_model('user_account');
        $user_data = $User -> check_login();
        $_SESSION['crs_id']  = "";
        $data = array();
        $db = Database::getInstance();

        if(is_array($user_data)) {
            $data['user_data'] = $user_data;
        }
        $query = "SELECT `ID` FROM `stud_crs` WHERE `stud_id`='".$user_data[0]->ID."'";
        $result = $db -> read($query);
        
        $query = "SELECT * FROM `courceinfo` INNER JOIN stud_crs ON stud_crs.`stud_id` = '".$user_data[0]->ID."' where `ID` = '".$result[0]->ID."'";
        $result = $db -> read($query);
       
        $data['rows'] = $result;
        $data['page_title'] = "Student Home page";
        $this->view('students/enroled_crs', $data);

    }

    public function course_mat() {
        $User = $this -> load_model('user_account');
        $user_data = $User -> check_login();
        
        if(is_array($user_data)) {
            $data['user_data'] = $user_data;
        }
        $course_id = $_GET['data-id'];
        $_SESSION['crs_id'] = $course_id;

        $path = "course_materials/$course_id";
        if(!file_exists($path)) {
            mkdir($folder, 0777, true);
        }
        $folders = array_filter(glob("$path/*"), 'is_dir');
        $folders1 = array();
        $folder = array();

        $DB = Database::newInstance();
        $rows = $DB -> read("SELECT * FROM `crsmaterial` where `CrsCode` = '".$_GET['data-id']."' ");
        $data['rows'] = $rows;

        foreach($folders as $fold) {
            array_push($folders1, str_replace("$path/","", $fold) ); 
            array_push($folder, str_replace("$path/","", $fold) ); 
        }

        $data['folders'] = $folders1;
        $data['folder_name'] = $path;


        $data['folder'] = $folder;
        $data['folder_path'] = $path;

        $this->view('students/cource_mat', $data);

    }
    public function available_crs() {
        $crs = $this -> load_model('course');
        $resultlist = $crs -> get_all_by_batch();
        $column = json_decode(json_encode($resultlist), true);
        $result = array();
        foreach ($column as $key => $value) {
            $result['data'][] = array(
                '<div class="form-check">
                    <label class="form-check-label">
                        <input class="form-check-input" type="checkbox"  name="check_list[]" value="'.$value['CourseCode'].'">
                        <span class="form-check-sign"></span>
                    </label>
                </div>',
                $value['CourseName'],
                $value['CourseCode'],
                $value['CourseCrdHrs'],
            );
        }
        echo json_encode($result);
    }
    public function all_crs() {
        $crs = $this -> load_model('course');
        $resultlist = $crs -> get_all_add();
        $column = json_decode(json_encode($resultlist), true);
        $result = array();
        foreach ($column as $key => $value) {
            $result['data'][] = array(
                '<div class="form-check">
                    <label class="form-check-label">
                        <input class="form-check-input" type="checkbox"  name="check_list[]" value="'.$value['CourseCode'].'">
                        <span class="form-check-sign"></span>
                    </label>
                </div>',
                $value['CourseName'],
                $value['CourseCode'],
                $value['CourseCrdHrs'],
                $value['CourseGivenYear']
            );
        }
        echo json_encode($result);
    }
    public function register() {
        $_SESSION['error'] = "";
        $crs = $this -> load_model('course');

        $DB = Database::getInstance();
        $total_crd_hr = 0;
        foreach($_POST['check_list'] as $check) {
            $result = $DB->read("SELECT `CourseCrdHrs` FROM `courceinfo` where `CourseCode` = '$check'");
            $total_crd_hr = $total_crd_hr + $result[0]->CourseCrdHrs;
        }
        if($total_crd_hr <= 19) {
            $crs->register($_POST);
            if($_SESSION['error'] != "")
            {
                $arr = $_SESSION['error'];
                $_SESSION['error'] = "";
                show($arr);
                
            }else
            {
                $arr = "You registered successfully!";
                echo json_encode($arr);
            }
        } else {
            
            $arr = "You have reached your course credit hour limit!! you must drop some courses";
            echo json_encode($arr);
        }
    }
    public function get_info_by_id() {

        $id = trim($_POST['id']);			
        $DB = Database::getInstance();
        $result = $DB->read("SELECT `Username`,`Name`, `StudEmail`, `Image`, `StudContactNo`, `Batch` FROM `studentinfo` where `Username` = '$id'");
        echo json_encode($result);
    }
}