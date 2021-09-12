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

        $course_id = $_GET['data-id'];

        $folder = "course_materials/$course_id";
        if(!file_exists($folder)) {
            mkdir($folder, 0777, true);
        }
        $folders = array_filter(glob("$folder/*"), 'is_dir');
        $folders1 = array();

        foreach($folders as $fold) {
            array_push($folders1, str_replace("$folder/","", $fold) ); 
        }
        $data['folders'] = $folders1;
        $data['folder_name'] = $folder;

        $this->view('teachers/home', $data);
    }

    public function enr_student() {
        $User = $this -> load_model('user_account');
        $user_data = $User -> check_login();
        
        if(is_array($user_data)) {
            $data['user_data'] = $user_data;
        }
        
        $data['page_title'] = "Teacher Home";
        // show($data['user_data'][0] -> Name);

        $this->view('teachers/enr_student', $data);
    }

    public function sched_online() {
        $User = $this -> load_model('user_account');
        $user_data = $User -> check_login();
        
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
    public function forum() {
        $User = $this -> load_model('user_account');
        $user_data = $User -> check_login();
        
        if(is_array($user_data)) {
            $data['user_data'] = $user_data;
        }
        $data['page_title'] = "Forum";

        $id = $user_data[0]->ID;
        $DB = Database::newInstance();
        $rows = $DB -> read("SELECT `CourseCode`, `CourseName`, `CourseImage` FROM `courceinfo` where AssignedFor = '$id'");
        $data['rows'] = $rows;

        $this->view('forum/forum', $data);

    }

}