<?php 
    class errorController extends Controller{

        function __construct(){
            if( !isset( $_SESSION['user'] ) || empty( $_SESSION['user'] )  ){
                header("Location: /login");
            }
        }
        
        public function index(){
            $this->view('404 not found','404page');
            $this->view->render();
        }
    }
?>