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
      }
      else
      echo json_encode("eroor");
    }
}