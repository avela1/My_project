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

    public function update($POST = [], $FILES = []) {

        $DB = Database::getInstance();
        $data = array();
        $fname = trim($POST['fname']);			
        $data['date'] = date("Y-m-d H:i:s");
        $data['lectid'] = $_SESSION['ID'];
        $data['crscode'] = trim($POST['crs_code']);
        $newpath = $POST['folder'].'/'.$POST['foldername'];
        $oldfolder = $POST['fpath'];

        $_SESSION['error'] = $POST;

        $files = array();
        $files = $FILES['fileloc'];

        $fetchid = array();
        $fetchid['filepath'] = $oldfolder;

        // $query = "SELECT `ID`  FROM `crsmaterial` WHERE `FileLoc` = :filepath limit 1";
        $query = false;
        $query = "SELECT `ID` FROM `crsmaterial` WHERE `FileLoc` = :filepath LIMIT 1;";
        $fileid = $DB->read($query, $fetchid);
       
        $id =  $fileid[0]->ID;
        
        if($files['name'] != '') {
            $extension = pathinfo($files['name'], PATHINFO_EXTENSION);
            $destination = $newpath.'/'.$fname.".".$extension;
            $data['loc'] = $destination;

            if(move_uploaded_file($files['tmp_name'], $destination)){
                unlink($oldfolder);

                if($id) {
                    $data['id'] = $id;
                    $query = "UPDATE `crsmaterial` SET `FileLoc`= :loc,`UploDate`= :date,`CrsCode`= :crscode,`LectId`= :lectid WHERE `ID` = :id";
                    $result = $DB->write($query, $data);
                    if($result) {
                        return true;
                    } else {
                        $_SESSION['error'] = "file is not uploaded";
                        return false;
                    }
                } else {
                    $_SESSION['error'] = "file is not exist";
                }
            } else {
                $_SESSION['error'] = "can't able to move file to the folder";
            }
        } else {
            $extension = pathinfo($oldfolder, PATHINFO_EXTENSION);
            $newdestination = $newpath.'/'.$fname.".".$extension;

            $data['loc'] = $newdestination;
            if(rename($oldfolder, $newdestination)){
              

                if($id) {
                    $data['id'] = $id;
                    $query = "UPDATE `crsmaterial` SET `FileLoc`= :loc,`UploDate`= :date,`CrsCode`= :crscode,`LectId`= :lectid WHERE `ID` = :id";
                    $result = $DB->write($query, $data);
                    if($result) {
                        return true;
                    } else {
                        $_SESSION['error'] = "file is not renamed in database";
                        return false;
                    }
                } else {
                    $_SESSION['error'] = "file is not exist in database";
                }
            }else{
                $_SESSION['error'] = "file is not renamed in folder";
            };
        }
    }
    public function delete_file($POST = []) {
        $data = array();
        $data['path'] = $POST['path'];
        $DB = Database::newInstance();
        $query = "DELETE FROM `crsmaterial` WHERE `FileLoc` = :path limit 1";
        $result = $DB->write($query, $data);
        if($result) {
            unlink($POST['path']);
            return true;
        } else {
            $_SESSION['error'] = "file is not deleted";
            return false;
        }
    }
    public function get_all(){

        $DB = Database::newInstance();
        $result = $DB->read("SELECT * FROM `crsmaterial` where `CrsCode` = 1");
        return $result;
    }
}