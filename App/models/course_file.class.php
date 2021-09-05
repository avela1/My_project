<?php


Class Course_file {

    public function upload($POST = [], $FILES = []) {

        $DB = Database::newInstance();
        $data = array();
        $fname = trim($POST['fname']);			
        $data['date'] = date("Y-m-d H:i:s");
        $data['lectid'] = $_SESSION['ID'];
        $data['crscode'] = trim($POST['crs_code']);
        $location = $POST['folder'].'/'.$POST['foldername'];

        $files = array();
        $files = $FILES['fileloc'];

        if(!file_exists($location)) {
            mkdir($folder, 0777, true);
        } 

        $extension = pathinfo($files['name'], PATHINFO_EXTENSION);

        $destination = $location.'/'.$fname.".".$extension;
        $data['loc'] = $destination;
        if(move_uploaded_file($files['tmp_name'], $destination)){
            $query = "INSERT INTO `crsmaterial`(`FileLoc`, `UploDate`, `CrsCode`, `LectId`) VALUES (:loc, :date, :crscode, :lectid)";
            $result = $DB->write($query, $data);
            if($result) {
                return true;
            } else {
                $_SESSION['error'] = "file is not uploaded";
                return false;
            }
       
        }else {
            $_SESSION['error'] = "file is not uploaded to the folder";
        }
    }
}