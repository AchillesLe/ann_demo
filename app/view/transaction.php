<?php 
    $data = null;
    if( !empty($this->view_data) ){
        $data = $this->view_data;
    }
?>
<?php include('layout/header.php')?>
  <!-- Begin Page Content -->
  <div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <h1 class="h3 mb-0 text-gray-800">Transaction</h1>
      <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" data-toggle="modal" data-target="#addtran">  Add transaction</a>
    </div>
    <?php 
        if( isset($_SESSION['message']) ){
             $message = $_SESSION['message'];
            if ( strpos($message, 'thành công') == true) {

                echo "<div class='alert alert-success'>
                        <strong>   $message !</strong>  
                    </div>";
            }else{
                echo "<div class='alert alert-warning'>
                        <strong>  $message !</strong>  
                    </div>";
            }
            unset($_SESSION['message']);
        }
    ?>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="headleft font-weight-bold text-primary">danh sách giao dịch</h6>
            <h6 class="totalMoney font-weight-bold text-primary">Tổng tiền : <?php echo number_format(  $_SESSION['user']['totalMoney'] , 0 , "." , ",")  ?> VNĐ</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
            <table class="table table-bordered table-tran" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Người chuyển</th>
                        <th>Người nhận</th>
                        <th>Số tiền</th>
                        <th>Ngày</th>
                        <th>Ghi chú</th>
                    </tr>
                </thead>
                 
                <tbody>
                    <?php 
                        if( $data && count( $data['trans'] ) > 0 ){
                            $index = 1;
                            foreach(  $data['trans'] as $tran){
                                echo "<tr>";
                                echo    "<td>$index</td>";
                                echo    "<td>".$tran['id_head']."</td>";
                                echo    "<td>".$tran['id_tail']."</td>";
                                echo    "<td>".$tran['amount']."</td>";
                                echo    "<td>".$tran['date']."</td>";
                                echo    "<td>".$tran['note']."</td>";
                                echo "</tr>";
                                $index++;
                            }
                        }else{
                            echo "<tr><td colspan='6' style='text-align:center'>No transaction !</td></tr>";
                        }
                    ?>

                </tbody>
            </table>
            </div>
        </div>
    </div>

  </div>
  <!-- /.container-fluid -->
   <!-- Add Modal-->
    <div class="modal fade" id="addtran" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Your Transaction</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <form action="transaction/add" method="GET">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="form-control">Receiver</label>
                            <select id="reciever" name="reciever" class='form-control' > 
                            <option value="0">---select receiver---</option>";
                                <?php 
                                if( $data && count( $data['users'] ) > 0 ){
                                    
                                    foreach(  $data['users'] as $user){
                                    echo  "<option value=".$user['id'].">".$user['name']."</option>";
                                    }
                                }
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="form-control">Amount of money </label>
                            <input class="form-control" name="money" id="money" placehoder/>
                        </div>
                        <div class="form-group">
                            <textarea class="form-control" name="note"  id="note" rows="3" placeholder="note" ></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                        <button class="btn btn-primary" type="submit"  id="addTransaction">Add</button>
                    </div>
                </form>
                
            </div>
        </div>
    </div>
<?php include('layout/footer.php')?>

