<?php 

class Course_material extends Controller {

    public function manage_folder() {
      if($_POST['action'] == 'create_folder'){
        $folder = $_POST['folder'].'/'.$_POST['name'];
        if(!file_exists($folder)) {
            mkdir($folder, 0777, true);
            echo json_encode("Folder created successfully!");
        } else {
          echo json_encode("Folder already there!");
        }


      }else if($_POST['action'] == 'update_folder'){

        $folder = $_POST['folder'].'/'.$_POST['name'];
        $oldfolder = $_POST['folder'].'/'.$_POST['oldVal'];

        if(!file_exists($folder)) {
            rename($oldfolder, $folder);
            echo json_encode("Folder Renamed successfully!");
        } else {
          echo json_encode("Folder already there!");
        }
      }else if($_POST['action'] == 'delete_folder'){
        if(file_exists($_POST['path'])) {
          $dir = $_POST['path'];
         
          if(count(glob("$dir/*")) != 0) {
            echo json_encode("Please Frist Delete Inside files please!");
          } else {
            if(rmdir($_POST['path'])) {
              echo json_encode("Folder Deleted successfully!!!");
            };
          }
        }else {
         
          echo json_encode("Folder is not exist!!!");
        
        }
      }
    }

    public function upload_file() {
      $_SESSION['error'] = "";
      $crs_file = $this -> load_model('course_file');
      if(!empty($_FILES['fileloc']["name"])) {
          $crs_file->upload($_POST, $_FILES);

          if($_SESSION['error'] != "")
          {
              $arr = $_SESSION['error'];
              $_SESSION['error'] = "";
              show($arr);
              
          }else
          {
              $arr = "Course material uploaded successully!";
              echo json_encode($arr);
          }
      } else {
          $arr = "Please enter file!!!";
          echo json_encode($arr);
      }
    }
    public function update_file() {
      $_SESSION['error'] = "";
      $crs_file = $this -> load_model('course_file');
     
      if(!empty($_POST['fname'])) {
       
          $crs_file->update($_POST, $_FILES);
         
          if($_SESSION['error'] != "")
          {
              $arr = $_SESSION['error'];
              $_SESSION['error'] = "";
              show($arr);
              
          }else
          {
              $arr = "Course material updated successully!";
              echo json_encode($arr);
          }
      } else {
          $arr = "Please enter file name!!!";
          echo json_encode($arr);
      }
    }
    public function delete_file() {
      // echo json_encode($_POST['path']);
      $_SESSION['error'] = "";
      $crs_file = $this -> load_model('course_file');

      if(file_exists($_POST['path'])) {
        $crs_file->delete_file($_POST);
        
        if($_SESSION['error'] != "")
          {
              $arr = $_SESSION['error'];
              $_SESSION['error'] = "";
              show($arr);
              
          }else
          {
              $arr = "Course material deleted successully!";
              echo json_encode($arr);
          }
        
      } else {
        echo json_encode("wrong path to file");
      }
     
    }
}
