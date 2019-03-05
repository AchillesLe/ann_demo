<?php 
    class View{
        protected $view_file;
        protected $view_data;
        protected $view_title;

        public function __construct($view_title = 'Admin site' ,$view_file,$view_data){
            $this->view_file = $view_file;
            $this->view_data = $view_data;
            $this->view_title = $view_title;
        }

        public function render(){
            if( file_exists(VIEW.$this->view_file.'.php') ){
                include  VIEW.$this->view_file.'.php';
            }
        }

        public function getAction(){
            return (explode('\\',$this->view_file))[1];
        }
    }
?>