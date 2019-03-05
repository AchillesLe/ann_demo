<?php 
class Controller{
    protected $view;

    public function view( $viewTitle ,$viewName , $data = []){
        $this->view = new View( $viewTitle , $viewName , $data );
        return $this->view;
    }
}
?>