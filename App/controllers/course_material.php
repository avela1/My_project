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
      show($_FILES['fileloc']);
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

    public function display() {
      // $crsfile = $this -> load_model('course_file');
      // $resultlist = $crsfile -> get_all();
      // $column = json_decode(json_encode($resultlist), true);
      // $result = array();
      // foreach ($column as $key => $value) {
      //     $result['data'][] = array(
      //         $value['CourseCode'],
      //         $value['CourseName'],
      //         $value['CourseCrdHrs'],
      //         $value['CourseGivenYear'],
      //         '<img src="'.ROOT.$value['CourseImage'].'" class="rounded responsive" style = "width:50px; height:50px"/>',
      //         $value['CourseDescription'],
      //         $value['AssignedFor'],

      //         '<div class="form-button-action">
      //             <a type="button" data-toggle="modal" href="#courseModal" class="btn btn-link btn-primary btn-lg  update" data-id="'.$value['CourseCode'].'" info="'.str_replace('"',"'", json_encode($value)).'" data-original-title="Edit">
      //                 <i class="fa fa-edit"></i>
      //             </a>
      //             <a type="button" data-toggle="modal" href="#assignModal" class="btn btn-link btn-success btn-lg  assign" data-id="'.$value['CourseCode'].'" data-original-title="Assign">
      //                 <i class="fas fa-book-open"></i>
      //             </a>
      //             <button type="button" data-toggle="tooltip" id="deleteStud" class="btn btn-link btn-danger" data-id="'.$value['CourseCode'].'" data-original-title="Disable">
      //                 <i class="fa fa-times"></i>
      //             </button>
      //         </div>',
      //     );
      // }

      echo json_encode($_POST);
      
  }
}
