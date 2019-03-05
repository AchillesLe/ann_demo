<?php 
    class homeController extends Controller{

        function __construct(){
            if( !isset( $_SESSION['user'] ) || empty( $_SESSION['user'] )  ){
                header("Location: /login");
            }
        }

        public function index($id= '' , $name = '' ){
            $this->view('Admin site','home',[
                'name'=>'joy',
                'age' => 10
            ]);
            $this->view->render();
        }
    }
?>