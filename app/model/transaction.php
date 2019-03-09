<?php 
    class transaction extends Database{

        private $table = 'transaction';

        function listTransaction( $id ){
            $data = null;
            $sql = "SELECT * FROM $this->table WHERE id_head = '$id' OR id_tail = '$id' ORDER BY id DESC";
            $result = $this->conn->query( $sql );
            
            if( $result ) {
                $data = $result->fetchAll(PDO::FETCH_ASSOC);
                $sql = "SELECT id , `name` FROM `user` ";
                $result1 = $this->conn->query( $sql );
                if( $result1 ){
                    $data1 = $result1->fetchAll(PDO::FETCH_ASSOC);
                }

                foreach( $data as $key => $value ){
                    $name_head = $this->search( $value['id_head'] , $data1 );
                    $name_tail = $this->search( $value['id_tail'] , $data1 );
                    $data[$key]['id_head'] = $name_head;
                    $data[$key]['id_tail'] = $name_tail;
                }
            }
            return $data;
        }

        private function search( $id , $array ){
            foreach( $array as $key => $value ){
                if( $id == $value['id']){
                    return $value['name'];
                }
            }
            return '';
        }

        private function add_sub_amount( $id , $money ){
            $sql = " UPDATE user  SET totalMoney = totalMoney + $money WHERE id = $id  ";
            $result = $this->conn->query( $sql );
            return $result;
        }

        function add( $id , $idreciever , $money , $note = ''){
            $date = date('Y-m-d H:i:s');
            $sql = "INSERT INTO $this->table (id_head,id_tail,amount,date,note)
                    VALUES ( ? , ? , ? , ? , ? ) ";
            $stm = $this->conn->prepare($sql);
            $result =  $stm->execute( [ $id , $idreciever , $money , $date , $note] )  ;
            if( $result ){
                $new_amout = ((double)$money)*(-1);
                if( $this->add_sub_amount( $id , $new_amout ) && $this->add_sub_amount( $idreciever ,  (double)$money )  ){
                    return true;
                }
            }
            return false;
        }
    }
?>