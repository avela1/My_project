<?php 

class Student extends Controller {

    public function index() {
        $User = $this -> load_model('user_account');
        $user_data = $User -> check_login();
        
        if(is_array($user_data)) {
            $data['user_data'] = $user_data;
        }
        $data['page_title'] = "Student Home page";
        $this->view('students/index', $data);
    }
}