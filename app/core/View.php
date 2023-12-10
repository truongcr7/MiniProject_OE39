<?php 

class View{
    protected $view_file;
    protected $view_data;

    public function __construct($view, $data = [])
    {
        $this->view_file = $view;
        $this->view_data = $data;
        $this->render();
    }

    private function render(){
        $file = "../app/views/".$this->view_file.".php";
        if(file_exists($file)){
            ob_start();
            extract($this->view_data);
            require_once($file);
            ob_end_flush();
        }else{
            echo "This file: ".$this->view_file." does not exist!";
        }
    }
}

?>