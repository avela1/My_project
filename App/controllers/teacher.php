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
        $_SESSION['crs_id'] = $course_id;

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
        $rows = $DB -> read("SELECT `ID`, `sender`, `message`, `files`, `date`, `roles` FROM `groupchat` WHERE  `deleted-msg` = 1 && `crscode`='".$data['crs_code']."' ");
        
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