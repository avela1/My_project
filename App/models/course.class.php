<?php


Class Course {

    public function create($POST = [], $FILES = []) {

        $DB = Database::newInstance();
        
        $data = array();
        
        $data['CrsCode'] = trim($POST['CrsCode']);			
        $data['CrsName'] = trim($POST['CrsName']);	
        $data['CrsCreditHrs'] = trim($POST['CrsCreditHrs']);			
        $data['CrsYr'] = trim($POST['CrsYr']);			
        $data['CrsDesc'] = trim($POST['CrsDesc']);					
        $data['addedBy'] = 2;	
        $data['date'] = date("Y-m-d H:i:s");

        $files = array();
        $files = $FILES['photo'];


        if(!preg_match("/^[a-zA-Z 0-9._\-,]+$/", $data['CrsName']))
        {
            $_SESSION['error'] .= "Please enter valid course name"; 
        } 
        
        $arr['CrsCode'] = $data['CrsCode'];
        $sql = "SELECT * FROM `courceinfo` where CourseCode = :CrsCode limit 1";
        $check = $DB->read($sql, $arr);

        if(is_array($check)){
            $_SESSION['error'] .= "That Course code is already in use <br>";
        }


        $folder = "course/";
        if(!file_exists($folder)) {
            mkdir($folder, 0777, true);
        }

        $extension = pathinfo($files['name'], PATHINFO_EXTENSION);
        $valid_extension = array("jpg", "jpeg", "gif", "png");

        if(in_array($extension, $valid_extension)) {
            $new_name = rand(). "." . $extension;
            $destination = $folder . $new_name;
            move_uploaded_file($files['tmp_name'], $destination);
            $data["image"] = $destination;
        } else {
            $_SESSION['error'] = "image format is not supported";
        }
    
        if(!isset($_SESSION['error']) || $_SESSION['error'] == ""){


            $query = "INSERT INTO `courceinfo`(`CourseCode`, `CourseName`, `CourseCrdHrs`, `CourseGivenYear`, `CourseImage`, `CourseDescription`, `AddedByAdminID`, `CreatedDateTime`) values (:CrsCode, :CrsName, :CrsCreditHrs, :CrsYr, :image, :CrsDesc, :addedBy, :date)";
            $result = $DB->write($query, $data);
            if($result) {
                return true;
            } else {
                return false;
            }
        }
        return false;
    }

    public function update($POST = [], $FILES = []) {

        $DB = Database::newInstance();
        
        $data = array();
        $data['CrsCode'] = trim($POST['CrsCode']);			
        $data['CrsName'] = trim($POST['CrsName']);	
        $data['CrsCreditHrs'] = trim($POST['CrsCreditHrs']);			
        $data['CrsYr'] = trim($POST['CrsYr']);			
        $data['CrsDesc'] = trim($POST['CrsDesc']);					
        $data['date'] = date("Y-m-d H:i:s");

        $files = array();
        $files = $FILES['photo'];


        if(!preg_match("/^[a-zA-Z 0-9._\-,]+$/", $data['CrsName']))
        {
            $_SESSION['error'] .= "Please enter valid course name"; 
        } 
        
        if($files['name'] != '') {
            $folder = "course/";
            if(!file_exists($folder)) {
                mkdir($folder, 0777, true);
            }

            $extension = pathinfo($files['name'], PATHINFO_EXTENSION);
            $valid_extension = array("jpg", "jpeg", "gif", "png");

            if(in_array($extension, $valid_extension)) {
                $new_name = rand(). "." . $extension;
                $destination = $folder . $new_name;
                move_uploaded_file($files['tmp_name'], $destination);
                $data["image"] = $destination;
                unlink($POST['oldimage']);
            } else {
                $_SESSION['error'] = "image format is not supported";
            }
        } else {
            $data["image"] = $POST['oldimage'];
        }
    
        if(!isset($_SESSION['error']) || $_SESSION['error'] == ""){

            $query = "UPDATE `courceinfo` SET `CourseName` = :CrsName, `CourseCrdHrs` = :CrsCreditHrs, `CourseGivenYear` = :CrsYr, `CourseImage` = :image, `CourseDescription` = :CrsDesc, `CreatedDateTime` = :date WHERE `CourseCode` = :CrsCode";
            $result = $DB->write($query, $data);
            if($result) {
                return true;
            } else {
                return false;
            }
        }
        return false;
    }

    public function assign($POST = []) {

        $DB = Database::newInstance();
        
        $data = array();
        
        $data['CrsCode'] = trim($POST['CrsCode_a']);			
        $data['InstID'] = trim($POST['assignedTech']);
       

        $query = "UPDATE `courceinfo` SET `AssignedFor`=:InstID WHERE `CourseCode` = :CrsCode";
        $result = $DB->write($query, $data);
        if($result) {
            return true;
        } 
        
        return "false";
    }

    public function get_all(){

        $DB = Database::newInstance();
        $result = $DB->read("SELECT * FROM `courceinfo` where `CourseStatus` = 1");
        return $result;
    }
    public function get_all_by_batch() {
        
        $DB = Database::newInstance();
        $id =$_SESSION['Batch'];
        $result = $DB->read("SELECT * FROM `courceinfo` where `CourseGivenYear` = $id");

        return $result;
    }
    public function get_all_add() {
        
        $DB = Database::newInstance();
        $id =$_SESSION['Batch'];
        $result = $DB->read("SELECT * FROM `courceinfo` where `CourseGivenYear` != $id");
        return $result;
    }
}