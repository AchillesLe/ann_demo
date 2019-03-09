<?php 
    class transactionController extends Controller{

        function index(){
            $id = $_SESSION['user']['id'];
            $transaction = new transaction;
            $trans = $transaction->listTransaction($id); 
            $user = new user;
            $list = $user->list_user_without($id);
            $data['trans'] = $trans;
            $data['users'] = $list;
            $this->view('Transaction','transaction',$data);
            $this->view->render();
        }   
        function confirm(){
            
            $rev = ( new user)->getinfo( $_GET['reciever'] );
            $this->view('Transaction','confirm' , $rev);
            $this->view->render();
        }   
        function add(){ 
            
            // $url_from = isset( $_SERVER['HTTP_REFERER'] )  ? explode( '?' , $_SERVER['HTTP_REFERER']  )[0] : ""  ;
            // $url_confirm = get_base_url('transaction/confirm');
            
            // if( $url_confirm !== $url_from ){
            //     header( 'Location:   Error' , 301); exit();
            // }

            $idreciever = isset($_GET['reciever'])? intval(trim($_GET['reciever'])): 0;
            $money = isset($_GET['money'])? trim($_GET['money']): 0;
            $note = isset($_GET['note'])? trim($_GET['note']) : "";
            $id = $_SESSION['user']['id'];

            if( $id != $idreciever && intval( $idreciever ) > 0 && ($this->check_amount($money) && intval($money) > 0 ) ){
                $transaction = new transaction ;
                $trans = $transaction->add($id , $idreciever , $money , $note);
                if(  $trans ){
                    $_SESSION['user'] = ( new user)->getinfo($_SESSION['user']['id']);
                    $_SESSION['message'] = "Chuyển khoản thành công !";
                }else{
                    $_SESSION['message'] = "Chuyển khoản thất bại !";
                }
            }
            header( 'Location: /transaction ', 301); exit();
        }  
         
        private function check_amount($number){
            if (preg_match('/^[0-9]+(\\.[0-9]+)?$/', $number)){
                // preg_match('/[0-9.]+/', $number)
                return true;
            } 
            return false;
        }
    }
?>