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
        $data['image'] = $POST['image'];			
        $data['addedBy'] = 2;	
		$data['date'] = date("Y-m-d H:i:s");
		

        if(!preg_match("/^[a-zA-Z 0-9._\-,]+$/", $data['name']))
		{
			$_SESSION['error'] .= "Please enter valid name"; 
		} 
        else if(!preg_match("/^[a-zA-Z 0-9_-]+@[a-zA-Z]+.[a-zA-Z]+$/", $data['email']))
		{
			$_SESSION['error'] .= "Please enter a valid email";
		} else if(empty($data['username']) || empty($data['email']))
		{
			$_SESSION['error'] .= "Please enter a fill the form correctly";
		} 

        show($data['image']);
        
        if(!isset($_SESSION['error']) || $_SESSION['error'] == ""){
            $folder = "students/";
            if(!file_exists($folder)) {
                mkdir($folder, 0777, true);
            }

            // $extension = explode(".", $data['image']['name']);
            // $new_name = rand(). "." . $extension[1];
            // $destination = $folder . $new_name;
            // move_uploaded_file($data['image']['tmp_name'], $destination);
        }
        // $arr['username'] = $data['username'];
        // $sql = "select * from useraccount where Username = :username limit 1";
        // $check = $DB->read($sql, $arr);


        // if(is_array($check)){
        //     $_SESSION['error'] .= "That username is already in use <br>";
        // }


        // if(!isset($_SESSION['error']) || $_SESSION['error'] == ""){
        //     $arr = false;
        //     $arr['username'] = $data['username'];
        //     $arr['encrypted_pwd'] = md5(trim($POST['password']));
        //     $arr['usertype'] = "Student";

        //     $query = "INSERT INTO `useraccount`(`Username`, `Pass`, `UserType`) VALUES  (:username, :encrypted_pwd, :usertype)";
        //     $result = $DB->write($query, $arr);
    
        //     $query2 = "insert into studentinfo (Username, Name, StudEmail, Image, StudContactNo, AddedByAdminID, Batch, CreatedDateTime) values (:username, :name, :email, :image, :contact, :addedBy, :batch, :date)";
        //     $result2 = $DB->write($query2, $data);
        //     if($result2) {
        //         return true;
        //     } else {
        //         return false;
        //     }
            
        // }
        // return false;
    }

    public function update($POST = []) {

        $DB = Database::newInstance();
        $data = array();
        
        $data['name'] = trim($POST['name']);			
        $data['email'] = trim($POST['email']);	
        $data['username'] = trim($POST['username']);			
        $data['batch'] = trim($POST['batch']);			

        if(!preg_match("/^[a-zA-Z 0-9._\-,]+$/", $data['name']))
		{
			$_SESSION['error'] .= "Please enter valid name"; 
		} 
        else if(!preg_match("/^[a-zA-Z 0-9_-]+@[a-zA-Z]+.[a-zA-Z]+$/", $data['email']))
		{
			$_SESSION['error'] .= "Please enter a valid email";
		} else if(empty($data['username']))
		{
			$_SESSION['error'] .= "Please enter a full username";
		}

        if(!isset($_SESSION['error']) || $_SESSION['error'] == ""){
    
            $query = "UPDATE `studentinfo` SET `Name`= :name,`StudEmail`=:email,`Batch`=:batch WHERE `Username`= :username";
            
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
        $result = $DB->read("SELECT `Username`, `Name`, `StudEmail`, `Image`, `StudContactNo`, `Batch` FROM `studentinfo` where `status` = 1");
        return $result;
    }

    
	public function delete($id)
	{

		$DB = Database::newInstance();
		$id = (int)$id;
		$query = "delete from products where id = '$id' limit 1";
		$DB->write($query);
	}

    public function get_one($uname)
	{

		$uname = addslashes($uname);
		$DB = Database::newInstance();
		$data = $DB->read("SELECT `Username`, `Name`, `StudEmail`, `StudContactNo`, `Batch` FROM `studentinfo` where `Username` = '$uname' limit 1");
		return $data[0];
	}

	public function get_one_by_name($name)
	{

		$name = addslashes($name);

		$DB = Database::newInstance();
		$data = $DB->read("select * from categories where category like :name limit 1",["name"=>$name]);
		
		if(is_array($data)){
			$DB->write("update categories set views = views + 1 where id = :id limit 1",["id"=>$data[0]->id]);
		}
		
		return $data[0];
	}

}