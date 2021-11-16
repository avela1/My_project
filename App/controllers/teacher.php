<?php 

class Teacher extends Controller {

    public function index() {
        $User = $this -> load_model('user_account');
        $user_data = $User -> check_login();
        
        if(is_array($user_data)) {
            $data['user_data'] = $user_data;
        }
        $id = $user_data[0]->ID;

        $DB = Database::newInstance();
        $rows = $DB -> read("SELECT `CourseCode`, `CourseName`, `CourseImage`, `CourseDescription` FROM `courceinfo` where AssignedFor = '$id'");
        $data['rows'] = $rows;
        
        $data['page_title'] = "Teacher Home";
        $this->view('teachers/index', $data);
    }

    public function dashboard() {
        $User = $this -> load_model('user_account');
        $user_data = $User -> check_login();
        
        if(is_array($user_data)) {
            $data['user_data'] = $user_data;
        }

        if(!empty($_GET['data-id']))
            $_SESSION['crs_id'] = $_GET['data-id'];
        
        $course_id = $_SESSION['crs_id'];

        $path = "course_materials/$course_id";
        if(!file_exists($path)) {
            mkdir($folder, 0777, true);
        }
        $folders = array_filter(glob("$path/*"), 'is_dir');
        $folders1 = array();
        $folder = array();

        $DB = Database::newInstance();
        $rows = $DB -> read("SELECT * FROM `crsmaterial` where `CrsCode` = '".$_SESSION['crs_id']."' ");
        $data['rows'] = $rows;

        foreach($folders as $fold) {
            array_push($folders1, str_replace("$path/","", $fold) ); 
            array_push($folder, str_replace("$path/","", $fold) ); 
        }

        $data['folders'] = $folders1;
        $data['folder_name'] = $path;
        $data['folder'] = $folder;
        $data['folder_path'] = $path;


        $this->view('teachers/home', $data);
    }
    public function add_note() {
        $User = $this -> load_model('user_account');
        $user_data = $User -> check_login();
        
        if(is_array($user_data)) {
            $data['user_data'] = $user_data;
        }
        
        $data['page_title'] = "Note Booker";
        $this->view('teachers/add_note', $data);
    }

    public function enr_student() {
        $User = $this -> load_model('user_account');
        $user_data = $User -> check_login();
        $db = Database::newInstance();

        if(is_array($user_data)) {
            $data['user_data'] = $user_data;
        }
        $course_id = $_SESSION['crs_id'];
        $query = "SELECT * FROM `studentinfo` INNER JOIN stud_crs ON stud_crs.`crs_id` = '".$course_id."'";
        $result = $db -> read($query);
       
        $data['rows'] = $result;
        
        $data['page_title'] = "Teacher Home";
        $this->view('teachers/enr_student', $data);
    }

    public function sched_online() {
        $User = $this -> load_model('user_account');
        $db = Database::newInstance();
        $user_data = $User -> check_login();
        $course_id = $_SESSION['crs_id'];
        $query = "SELECT * FROM `online_schedule` where `crs_id` = '".$course_id."'";
        $result = $db -> read($query);
        $data['rows'] = $result;
        if(is_array($user_data)) {
            $data['user_data'] = $user_data;
        }

        
        $data['page_title'] = "Scheduled class";
        $this->view('teachers/sched_online', $data);
    }

    public function message() {
        $User = $this -> load_model('user_account');
        $user_data = $User -> check_login();
        
        if(is_array($user_data)) {
            $data['user_data'] = $user_data;
        }
        
        $data['page_title'] = "Scheduled class";
        $this->view('teachers/message', $data);
    }

}