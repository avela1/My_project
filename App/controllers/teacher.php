<?php 

class Teacher extends Controller {

    public function index() {
        $data['page_title'] = "Teacher Home page";
        $this->view('teachers/index', $data);
    }
}