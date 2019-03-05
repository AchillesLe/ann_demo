<?php 
    class feedback extends Database{

        private $table = 'feedback';

        function listFeedback(  ){
            $data = null;

            $sql = "SELECT $this->table.id , user.name as name, date , content FROM $this->table , user WHERE user.id = id_feedName ORDER BY $this->table.id DESC";
            $result = $this->conn->query( $sql );

            if( $result ) {
                $data = $result->fetchAll(PDO::FETCH_ASSOC);
            }
            return $data;
        }

        function add( $id_feed , $content = '' ){
            $date = date('Y-m-d H:i:s');
            $sql = "INSERT INTO $this->table (id_feedName , date , content ) VALUES( '$id_feed' , '$date'  , '$content' ) ";
            $result = $this->conn->query( $sql );
            if( $result ){
                return true;
            }
            return false;
        }
    }
?>