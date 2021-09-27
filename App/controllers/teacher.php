<?php 

class Teacher extends Controller {

    public function index() {
        $User = $this -> load_model('user_account');
        $user_data = $User -> check_login();
        $_SESSION['crs_id'] ="";
        
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
        if($_SESSION['crs_id'] == ""){
            $_SESSION['crs_id'] = $_GET['data-id'];
        }
        
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
        
        if(is_array($user_data)) {
            $data['user_data'] = $user_data;
        }
        
        $data['page_title'] = "Teacher Home";
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

        $data['crs_code'] = $_SESSION['crs_id'];
        $data['user_id'] = $user_data[0]->ID;

        $id = $user_data[0]->ID;

        $DB = Database::newInstance();
        $rows = $DB -> read("SELECT `CourseCode`, `CourseName`, `CourseImage` FROM `courceinfo` where AssignedFor = '$id'");
        $data['rows'] = $rows;
        $rows = $DB -> read("SELECT `ID`, `sender`, `message`, `files`, `date`, `roles` FROM `groupchat` WHERE  `crscode`='".$data['crs_code']."' ");
        show($rows);
        foreach ($rows as $row) {
            if($row -> roles === "Student") {
                $user = $DB -> read("SELECT `Name`, `Image` FROM `studentinfo` WHERE `ID` = '".$row->sender."'");
                $row->Name = $user[0]->Name;
                $row->Image = $user[0]->Image;

            }else if($row -> roles === "Teacher") {
                $user = $DB -> read("SELECT `Name`, `Image` FROM `instructorinfo` WHERE `ID` = '".$row->sender."'");
                $row->Name = $user[0]->Name;
                $row->Image = $user[0]->Image;
            }
        }
        $data['chats'] = $rows;
        $this->view('forum/forum', $data);

    }

}