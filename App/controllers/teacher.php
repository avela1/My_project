<?php 

class Teacher extends Controller {

    public function index() {
        $User = $this -> load_model('user_account');
        $user_data = $User -> check_login();
        
        if(is_array($user_data)) {
            $data['user_data'] = $user_data;
        }

        $data['page_title'] = "Teacher Home";
        // show($data['user_data'][0] -> Name);

        $this->view('teachers/index', $data);
    }

    public function dashboard() {
        $User = $this -> load_model('user_account');
        $user_data = $User -> check_login();
        
        if(is_array($user_data)) {
            $data['user_data'] = $user_data;
        }
        
        $data['page_title'] = "Teacher Home";
        // show($data['user_data'][0] -> Name);

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

}