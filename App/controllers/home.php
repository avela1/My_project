<?php 

class Home extends Controller {

    public function index() {

        $User -> $this -> load_model('user_account');
        $data['user_data'] = $User -> check_login();

        if(is_array($data['user_data'])) {
            $data['user_data'] = $user_data;
        }

        $data['page_title'] = "home";
        $this->view('index', $data);
    }
}