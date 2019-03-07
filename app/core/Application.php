<?php 
    class Application
    {
        protected $controller = 'homeController';
        protected $action = 'index';
        protected $params = [];

        public function __construct(){

            $this->prepareURL();
            if( file_exists(CONTROLLER.$this->controller.'.php') ){
                $this->controller = new $this->controller;
                if( method_exists($this->controller , $this->action ) ){
                    call_user_func_array( [ $this->controller , $this->action ] , $this->params );
                }else{
                    $errorController = new errorController;
                    call_user_func_array( [ $errorController , 'index' ] , $this->params );
                }
            }else{
                $errorController = new errorController;
                call_user_func_array( [  $errorController , 'index' ] , $this->params );
            }
        }
        protected function prepareURL(){
            $request = trim( $_SERVER['REQUEST_URI'] ,'/' );
            if( !empty($request) ){
                $url = explode('?',$request);
                $main_url = explode('/',$url[0]);
                $this->controller =  isset($main_url[0]) ? $main_url[0].'Controller' : 'homeController';
                $this->action = isset($main_url[1]) ? $main_url[1] : 'index';
            }
        }
    }
?>