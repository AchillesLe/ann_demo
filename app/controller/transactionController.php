<?php 
    class transactionController extends Controller{

        function index(){
            $id = $_SESSION['user']['id'];
            $transaction = new transaction;
            $data = $transaction->listTransaction($id);
            $this->view('Transaction','transaction',$data);
            $this->view->render();
        }      
    }
?>