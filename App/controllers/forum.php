<?php 

class Forum extends Controller {

 public function index() {
        $User = $this -> load_model('user_account');
        $user_data = $User -> check_login();
        
        if(is_array($user_data)) {
            $data['user_data'] = $user_data;
        }
        $data['page_title'] = "Forum";

        $data['crs_code'] = $_SESSION['crs_id'];
        $data['user_id'] = $user_data[0]->ID;

        $id = $user_data[0]->ID;

        $DB = Database::newInstance();
        $rows = $DB -> read("SELECT `CourseCode`, `CourseName`, `CourseImage` FROM `courceinfo` where AssignedFor = '$id'");
        $data['rows'] = $rows;
        $rows = $DB -> read("SELECT `ID`, `sender`, `message`, `files`, `date`, `roles` FROM `groupchat` WHERE  `crscode`= '".$data['crs_code']."' ");
        if($rows != 0){
            foreach ($rows as $row) {
                if($row -> roles === "Student") {
                    $user = $DB -> read("SELECT `Name`, `Image` FROM `studentinfo` WHERE `ID` = '".$row->sender."'");
                    $row->Name = $user[0]->Name;
                    $row->Image = $user[0]->Image;

                }else if($row -> roles === "Teacher") {
                    $user = $DB -> read("SELECT `Name`, `Image` FROM `instructorinfo` WHERE `ID` = '".$row->sender."'");
                    $row->Name = $user[0]->Name;
                    $row->Image = $user[0]->Image;
                }
            }
        }
        $data['chats'] = $rows;
        $this->view('forum/forum', $data);
    }
}