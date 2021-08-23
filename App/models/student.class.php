<?php

Class Student {

    public function create($POST = []) {

        $DB = Database::newInstance();
        $data = array();
        
        $data['name'] = trim($POST['name']);			
        $data['email'] = trim($POST['email']);	
        $data['contact'] = trim($POST['contact']);			
        $data['username'] = trim($POST['username']);			
        $data['batch'] = trim($POST['batch']);			
        $data['image'] = trim($POST['image']);			
        $data['addedBy'] = 2;	
		$data['date'] = date("Y-m-d H:i:s");
		

        if(!preg_match("/^[a-zA-Z 0-9._\-,]+$/", $data['name']))
		{
			$_SESSION['error'] .= "Please enter valid name"; 
		} 
        else if(!preg_match("/^[a-zA-Z 0-9_-]+@[a-zA-Z]+.[a-zA-Z]+$/", $data['email']))
		{
			$_SESSION['error'] .= "Please enter a valid email";
		} else if(empty($data['username']))
		{
			$_SESSION['error'] .= "Please enter a fill username";
		}

        $arr['username'] = $data['username'];
        $sql = "select * from useraccount where Username = :username limit 1";
        $check = $DB->read($sql, $arr);


        if(is_array($check)){
            $_SESSION['error'] .= "That username is already in use <br>";
        }


        if(!isset($_SESSION['error']) || $_SESSION['error'] == ""){
            $arr = false;
            $arr['username'] = $data['username'];
            $arr['encrypted_pwd'] = md5(trim($POST['password']));
            $arr['usertype'] = "Student";

            $query = "INSERT INTO `useraccount`(`Username`, `Pass`, `UserType`) VALUES  (:username, :encrypted_pwd, :usertype)";
            $result = $DB->write($query, $arr);
    
            $query2 = "insert into studentinfo (Username, Name, StudEmail, Image, StudContactNo, AddedByAdminID, Batch, CreatedDateTime) values (:username, :name, :email, :image, :contact, :addedBy, :batch, :date)";
            $result2 = $DB->write($query2, $data);
            if($result2) {
                return true;
            } else {
                return false;
            }
            
        }
        return false;
    }

    public function get_all(){

        $DB = Database::newInstance();

        $result = $DB->read("SELECT `Username`, `Name`, `StudEmail`, `Image`, `StudContactNo`, `Batch` FROM `studentinfo`");
    
        return $result;
    }

}