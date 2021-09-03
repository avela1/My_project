<?php


Class Course_file {

    public function upload($POST = [], $FILES = []) {

        $DB = Database::newInstance();
        $data = array();
        $data['fname'] = trim($POST['fname']);			
        $data['fdesc'] = trim($POST['fdesc']);	
        $data['date'] = date("Y-m-d H:i:s");
        $data['location'] = $POST['folder'].'/'.$POST['foldername'];
        $data['lectid'] = $_SESSION['username'];
        $data['crscode'] = trim($POST['crs_code']);
        show($data);
    }
}