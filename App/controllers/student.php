<?php 

class Student extends Controller {

    public function index() {
        $data['page_title'] = "Student Home page";
        $this->view('students/index', $data);
      
    }
}