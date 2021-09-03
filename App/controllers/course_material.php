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
      }

      else
      echo json_encode("eroor");
    }

    public function upload_file() {
      $_SESSION['error'] = "";
      $crs_file = $this -> load_model('course_file');
      echo json_encode($_POST['crs_code']);
      if(!empty($_FILES['fileloc']["name"])) {
          $crs_file->upload($_POST, $_FILES);

          if($_SESSION['error'] != "")
          {
              $arr = $_SESSION['error'];
              $_SESSION['error'] = "";
              show($arr);
              
          }else
          {
              $arr = "Course added successfully!";
              echo json_encode($arr);
          }
      } else {
          $arr = "Please enter file!!!";
          echo json_encode($arr);
      }
    }
}