<?php

Class Forum {

    public function send_chat($POST = [], $FILES = []) {

        $DB = Database::getInstance();
        
        $data = array();
        
        $data['crs_Code'] = trim($POST['crs_code']);			
        $data['user_id'] = trim($POST['user_id']);	
        $data['chattext'] = trim($POST['chattext']);			
        $data['user_role'] = trim($_SESSION['userrole']);			
        $data['date'] = date("Y-m-d H:i:s");
        $files = array();
        $files = $FILES['uploadfile'];

        $folder = "forumfiles/";
        if($files['name'] != "") {
            if(!file_exists($folder)) {
                mkdir($folder, 0777, true);
            } 
            $extension = pathinfo($files['name'], PATHINFO_EXTENSION);
            $new_name = rand(). "." . $extension;
            $destination = $folder . $new_name;
            move_uploaded_file($files['tmp_name'], $destination);
            $data["file"] = $destination;
        } else {
            $data["file"] = "";
        }
        $query = "INSERT INTO `groupchat`(`sender`, `crscode`, `message`, `files`, `date`, `roles`) VALUES (:user_id, :crs_Code, :chattext, :file, :date, :user_role)";
        $result = $DB->write($query, $data);
        if($result) {
            return true;
        } else {
            return false;
        }
        return false;
    }
}