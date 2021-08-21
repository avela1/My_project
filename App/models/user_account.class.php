<?php

class User_account {
    private $error = "";


    public function login($POST) {

        $data = array();
        $db = Database::getInstance();

        $data['username'] = trim($POST['username']);
        $data['password'] = md5(trim($POST['password']));
        // $data['acc_status'] = 1;


        if(empty($data['username']) || empty($data['password'])) {
            $this -> error .= "Please fill the form correctly. <br>";
        }

        if($this -> error == "") {

            $sql = "SELECT * FROM useraccount where Username=:username  && Pass=:password limit 1";
            $result = $db -> read($sql, $data);

            
            if(is_array($result)) {
               
                $_SESSION['username'] = $result[0]->Username;
                $_SESSION['userrole'] = $result[0]->UserType;

                if($_SESSION['userrole'] == "Administrator") {
                    header("Location: ". ROOT . "admin/");
                    die;
                } else if($_SESSION['userrole'] == "Student") {
                    header("Location: ". ROOT . "student/");
                    die;
                } else if($_SESSION['userrole'] == "Teacher") {
                    header("Location: ". ROOT . "teacher/");
                    die;
                }
              
            }
        }
        $_SESSION['error'] = $this -> error;
    }

    public function check_login() {
        

        if(isset($_SESSION['username']) && isset($_SESSION['userrole'])) {
            
            $db = Database::getInstance();
            $arr['username'] = $_SESSION['username'];

            if($_SESSION['userrole'] == "Administrator") {
                $sql = "select * from admininfo where Username = :username limit 1";
            } elseif($_SESSION['userrole'] == "Student") {
                $sql = "select * from studentinfo where Username = :username limit 1";
            } else {
                $sql = "select * from instructorinfo where Username = :username limit 1";
            }
            $check = $db->read($sql, $arr);

            if(is_array($check)) {
                return $check;
            }
            // $_SESSION['name'] = $check[0]->Name;
            // $_SESSION['image'] = $check[0]->Image;
            // $_SESSION['ID'] = $check[0]->ID;
        }
        return false;
    }
    public function logout() { 
        if(isset($_SESSION['username']) && isset($_SESSION['userrole'])) {
            unset($_SESSION['username']);
            unset($_SESSION['userrole']);

            header("Location: ". ROOT . "login");
            die;
        }
    }

}