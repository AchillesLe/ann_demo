<?php 
    class feedbackController extends Controller{

        function index(){
            $feedback = new feedback;
            $data = $feedback->listFeedback();
            $this->view('Feedback','feedback',$data);
            $this->view->render();
        }
        function safe_input($data) {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
          }
        function add(){
            $user = $_SESSION['user'];
            $date = date('Y-m-d H:i:s');
            $content = $_POST['content'];
            //$content = $this->safe_input ( $_POST['content'] );
            $feedback = new feedback;
            $result =  $feedback->add( $user['id'] , $content  );
            echo json_encode($result);
            exit();
        }   
    }
?>