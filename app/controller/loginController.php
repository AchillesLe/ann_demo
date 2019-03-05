<?php 
    class loginController extends Controller{

        public function index(){
            $this->view('login');
            $this->view->render();
        }

        public function  doLogin(){

            if( isset($_POST['email']) ){
                $email = htmlspecialchars( $_POST['email'] );
                $pass = htmlspecialchars( $_POST['passwd'] );
                
                $user = new user();
                if( !empty($email)   &&  !empty($pass)  ){

                    $info = $user->login($email,$pass);
                    if( empty( $info ) ){
                        header("Location: /login");
                    }else{
                        $_SESSION['user'] = $info;
                        header("Location: /");
                    }

                }else{
                    header("Location: /login");
                }
            }
        }

        function logout(){
            $_SESSION['user'] = null;
            header("Location: /login");
        }
    }
?>