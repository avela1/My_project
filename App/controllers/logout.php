<?php 

class Logout extends Controller {

    public function index() {

        $UserAccount = $this -> load_model('user_account');
        $UserAccount -> logout();
    }
}