<?php 

class Home extends Controller {

    public function index() {

        $User = $this -> load_model('user_account');
        $data['user_data'] = $User -> check_login();
        $data['page_title'] = "home";
        $this->view('index', $data);
    }
}