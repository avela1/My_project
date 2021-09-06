<?php 

class Admin extends Controller {

    public function index() {

        $User = $this -> load_model('user_account');
        $user_data = $User -> check_login();
        // show(is_array($data['user_data']));
        
        if(is_array($user_data)) {
            $data['user_data'] = $user_data;
        }
        $data['page_title'] = "Admin Home";
        $this->view('admin/index', $data);
      
    }

    public function student_list() {
        $User = $this -> load_model('user_account');
        $user_data = $User -> check_login();
        // show(is_array($data['user_data']));
        
        if(is_array($user_data)) {
            $data['user_data'] = $user_data;
        }

        $data['page_title'] = "Admin Home";
        $this->view('admin/student_list', $data);

    }

    public function course_list() {
        $User = $this -> load_model('user_account');
        $user_data = $User -> check_login();
        
        if(is_array($user_data)) {
            $data['user_data'] = $user_data;
        }

        $DB = Database::newInstance();
        $rows = $DB -> read("SELECT `ID`, `Name` FROM `instructorinfo` WHERE  `status` = 1");
        $data['rows'] = $rows;
       
        $data['page_title'] = "Admin Home";

        $this->view('admin/course_list', $data);

    }
    public function instructor_list() {
        $User = $this -> load_model('user_account');
        $user_data = $User -> check_login();

        if(is_array($user_data)) {
            $data['user_data'] = $user_data;
        }

        $data['page_title'] = "Admin Home";
        $this->view('admin/instructor_list', $data);
    }
}