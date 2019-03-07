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
        function add(){

            $idreciever = isset($_GET['id'])? intval(trim($_GET['id'])): 0;
            $money = isset($_GET['money'])? trim($_GET['money']): 0;
            $note = isset($_GET['note'])? trim($_GET['note']) : "";
            $id = $_SESSION['user']['id'];

            if(  intval( $idreciever ) > 0 && ($this->check_amount($money) && intval($money) > 0 ) ){
                $transaction = new transaction ;
                $trans = $transaction->add($id , $idreciever , $money , $note);
                return true;
            }
            return false;
            
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