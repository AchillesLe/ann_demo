<?php 
    class user extends Database{

        private $table = 'user';

        function login( $email , $pass ){
            $user = null;

            $sql = "SELECT * FROM $this->table WHERE email = '$email' AND password= '$pass' ";
            $result = $this->conn->query( $sql );

            // $sql = "SELECT * FROM $this->table WHERE email = ? AND password= ? ";
            // $result = $this->conn->prepare( $sql );
            // $result->execute( [ $email , $pass ] );

            if( $result ) {
                $data = $result->fetchAll(PDO::FETCH_ASSOC);
                if( count($data) > 0){
                    $user = $data[0];
                }
            }
            return $user;

        }

    }
?>