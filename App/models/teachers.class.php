<?php

Class Teachers {

    public function create($POST = [], $FILES = []) {

        $_SESSION['error'] = "";
        $DB = Database::newInstance();
        
        $data = array();
        
        $data['name'] = trim($POST['name']);			
        $data['email'] = trim($POST['email']);	
        $data['contact'] = trim($POST['contact']);			
        $data['qualification'] = trim($POST['qualification']);			
        $data['username'] = trim($POST['username']);			
        $data['addedBy'] = 2;	
        $data['date'] = date("Y-m-d H:i:s");

        $files = array();
        $files = $FILES['photo'];


        if(!preg_match("/^[a-zA-Z._\-,]+$/", $data['name']))
        {
            $_SESSION['error'] = "Please enter valid name";
            return; 
        } 
        else if(!preg_match("/^[a-zA-Z 0-9_-]+@[a-zA-Z]+.[a-zA-Z]+$/", $data['email']))
        {
            $_SESSION['error'] = "Please enter a valid email";
            return; 

        } else if(empty($data['username']) || empty($data['email']))
        {
            $_SESSION['error'] = "Please enter a fill the form correctly";
            return; 

        } 

        
        $arr['username'] = $data['username'];
        $sql = "select * from useraccount where Username = :username limit 1";
        $check = $DB->read($sql, $arr);

        if(is_array($check)){
            $_SESSION['error'] = "That username is already in use <br>";
            return; 

        }


        $folder = "teachers/";
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
            return; 
            
        }
      
        if(!isset($_SESSION['error']) || $_SESSION['error'] == ""){

            $arr = false;
            $arr['username'] = $data['username'];
            $arr['encrypted_pwd'] = md5(trim($POST['password']));
            $arr['usertype'] = "Teacher";

            $query = "INSERT INTO `useraccount`(`Username`, `Pass`, `UserType`) VALUES  (:username, :encrypted_pwd, :usertype)";
            $result = $DB->write($query, $arr);



            $query2 = "INSERT INTO `instructorinfo`(`Username`, `Name`, `InstEmail`, `Image`, `InstContactNo`, `AddedByAdminID`, `Qualification`, `CreatedDateTime`) VALUES  (:username, :name, :email, :image, :contact, :addedBy, :qualification, :date)";
           
            $result2 = $DB->write($query2, $data);
            if($result2) {
                return true;
            } else {
                return false;
            }
        }
        return false;
    }

    public function update($POST = []) {

        $DB = Database::newInstance();
        $data = array();
        
        $data['name'] = trim($POST['name']);			
        $data['email'] = trim($POST['email']);	
        $data['username'] = trim($POST['username']);			
        $data['qualification'] = trim($POST['qualification']);			

        if(!preg_match("/^[a-zA-Z 0-9._\-,]+$/", $data['name']))
		{
			$_SESSION['error'] .= "Please enter valid name"; 
            return; 

		} 
        else if(!preg_match("/^[a-zA-Z 0-9_-]+@[a-zA-Z]+.[a-zA-Z]+$/", $data['email']))
		{
			$_SESSION['error'] = "Please enter a valid email";
            return; 

		} 

        if(!isset($_SESSION['error']) || $_SESSION['error'] == ""){
    
            $query = "UPDATE `instructorinfo` SET `Name`= :name,`InstEmail`=:email,`Qualification`=:qualification WHERE `Username`= :username";
            
            $result = $DB->write($query, $data);
            if($result) {
                return true;
            } else {
                return false;
            }
        }
        return false;
    }

    public function get_all(){

        $DB = Database::newInstance();
        $result = $DB->read("SELECT `Username`, `Name`, `InstEmail`, `Image`, `InstContactNo`, `Qualification` FROM `instructorinfo` where `status` = 1");
        return $result;
    }

    
	public function delete($id)
	{

		$DB = Database::newInstance();
		$id = (int)$id;
		$query = "delete from products where id = '$id' limit 1";
		$DB->write($query);
	}

}