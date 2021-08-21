<?php

class Controller {
    public  function view($path, $data = []) {
        if(file_exists("../App/views/" . $path . ".php"))
		{
            include("../App/views/" . $path . ".php");
        }
    }

    public  function load_model($model) {
        if(file_exists("../App/models/" . strtolower($model) . ".class.php"))
		{
            include("../App/models/" . strtolower($model) . ".class.php");
            return $mod = new $model();
        }
        return false;
    }
}
