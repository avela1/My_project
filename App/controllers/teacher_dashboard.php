<?php 

class Teacher_dashboard extends Controller {

    public function index() {
        $data['page_title'] = "Teacher Dashboard page";
        $this->view('teachers/home', $data);
    }
}