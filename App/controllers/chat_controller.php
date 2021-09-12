<?php 

class Chat_controller extends Controller {

    public function sendchat() {
        $_SESSION['error'] = "";
        $forum = $this -> load_model('forum');

        if(!empty($_POST['chattext']) || $_FILES['uploadfile']['name'] !=="") {
            $forum->send_chat($_POST, $_FILES);
            if($_SESSION['error'] != "")
            {
                $arr = $_SESSION['error'];
                $_SESSION['error'] = "";
                show($arr);
                
            }else
            {
                $arr = "Chat sends successfully";
                echo json_encode($arr);
            }
        } else {
            $arr = "You can't send empty message";
            echo json_encode($arr);
        }
    }
}