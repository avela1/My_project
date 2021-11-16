<?php 

class Login extends Controller {

    public function index() {
        $data['page_title'] = "home";
        $_SESSION['error'] ="";

        if($_SERVER['REQUEST_METHOD'] == 'POST') {

            $UserAccount = $this -> load_model('user_account');
            $UserAccount -> login($_POST);
        }
        $this->view('login', $data);
    }

}