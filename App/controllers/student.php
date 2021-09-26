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
    public function reg_crs() {
        $User = $this -> load_model('user_account');
        $user_data = $User -> check_login();
        
        if(is_array($user_data)) {
            $data['user_data'] = $user_data;
        }


        $data['page_title'] = "Student Home page";
        $this->view('students/reg_crs', $data);
        
    }
    public function available_crs() {
        $crs = $this -> load_model('course');
        $resultlist = $crs -> get_all_by_batch();
        $column = json_decode(json_encode($resultlist), true);
        $result = array();
        foreach ($column as $key => $value) {
            $result['data'][] = array(
                '<div class="form-check">
                    <label class="form-check-label">
                        <input class="form-check-input" type="checkbox" value="">
                        <span class="form-check-sign"></span>
                    </label>
                </div>',
                $value['CourseName'],
                $value['CourseCode'],
                $value['CourseCrdHrs'],
            );
        }
        echo json_encode($result);
    }
    public function all_crs() {
        $crs = $this -> load_model('course');
        $resultlist = $crs -> get_all_add();
        $column = json_decode(json_encode($resultlist), true);
        $result = array();
        foreach ($column as $key => $value) {
            $result['data'][] = array(
                '<div class="form-check">
                    <label class="form-check-label">
                        <input class="form-check-input" type="checkbox" value="">
                        <span class="form-check-sign"></span>
                    </label>
                </div>',
                $value['CourseName'],
                $value['CourseCode'],
                $value['CourseCrdHrs'],
            );
        }
        echo json_encode($result);
    }
}